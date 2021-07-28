<?php

namespace App\Controllers\Handleprojects;

use App\Controllers\BaseController;
use App\Models\ProjectsModel;

class ProjectsController extends BaseController
{
	//-------------------------function to add project and submit the form entries to database---------------------------	
	public function save_project()
	{
		if ($this->request->getMethod() == "post") {
			if (!$this->validate('rules')) {
				$validator = $this->validator;
				$error_data = array(
					'validator' => isset($validator) ? $validator : [],
				);
				return view('permanent/project_add', $error_data);
			} else {
				if ($files = $this->request->getFiles()) {
					$filenames = ""; //variable to store the file names
					$filesizes = ""; // variable to store the file sizes
					//loop is used for moving each file to the uploads directory
					foreach ($files['uploaded_files'] as $value) {
						if ($value->isValid() && !$value->hasMoved()) {
							$value->move("assets\uploads");  //moving the file to the uploads directory in writables

							$name = $value->getClientName();  //variable to get the name of the file
							$size = $value->getSize();  // variable to get the size of the file
							$filenames .= $name . ",";   // creating a string of names to store in the database
							$filesizes .= $size . ",";  // creating a string of sizes to store in the database
						}
					}
					//print_r($filenames);
					//print_r($filesizes);  debugging 
					$form_data = array(
						"Project_Name" =>  $this->request->getPost("inputName"),
						"Description" => $this->request->getPost("inputDescription"),
						"Status" => $this->request->getPost("inputStatus"),
						"Client_Company" => $this->request->getPost("inputClientCompany"),
						"Project_Leader" => $this->request->getPost("inputProjectLeader"),
						"Estimated_Budget" => $this->request->getPost("inputEstimatedBudget"),
						"Amount_Spent" => $this->request->getPost("inputSpentBudget"),
						"Project_Duration" => $this->request->getPost("inputEstimatedDuration"),
						"File_Names" => $filenames,
						"File_Sizes" => $filesizes
					);
					$model = new ProjectsModel();
					$model->save_data($form_data);
					return view('permanent/project_add');
				}
			}
		} else {
			if (!logged_in() && !session()->has('google_user')) {
				return redirect()->to('/');
			}
			return view('permanent/project_add');
		}
	}

	//---------------------------------------------------------------------------------------//
	//	Controller function for viewing the project details 
	public function projectview($id)
	{
		if (!logged_in() && !session()->has('google_user')) {
			return redirect()->to('/');
		}
		$identify = $id;

		$model = new ProjectsModel();
		$result = $model->project_info($identify);

		return view('permanent/project_details', array('details' => $result[0]));
	}

	// -----------------controller function for deleting the project-----------------//
	public function delete_project($id)
	{
		if (!logged_in() && !session()->has('google_user')) {
			return redirect()->to('/');
		}
		$model = new ProjectsModel();
		$flag = $model->projectdelete($id);
		if ($flag == 1) {
			return redirect()->to("/projects");
		}
	}

	// ---------------------Controller function to show previous details of the project in the edit page and update -------
	//1.) If request is post that is if we want to update data it will validate the rules and save the data
	//2.)If request is get it the edit page will show the details of the previous project 
	public function project_edit_controller($id)
	{
		if (!logged_in() && !session()->has('google_user')) {
			return redirect()->to('/');
		}
		$model = new ProjectsModel();

		if ($this->request->getMethod() == "post") {
			if ($this->validate('rules')) {
				$updated_data = array(
					"Project_Name" =>  $this->request->getPost("inputName"),
					"Description" => $this->request->getPost("inputDescription"),
					"Status" => $this->request->getPost("inputStatus"),
					"Client_Company" => $this->request->getPost("inputClientCompany"),
					"Project_Leader" => $this->request->getPost("inputProjectLeader"),
					"Estimated_Budget" => $this->request->getPost("inputEstimatedBudget"),
					"Amount_Spent" => $this->request->getPost("inputSpentBudget"),
					"Project_Duration" => $this->request->getPost("inputEstimatedDuration")
				);

				$uri = current_url(true);
				$count = $uri->getTotalSegments();
				$id = $uri->getSegment($count);

				$flag = $model->update_project($id, $updated_data);
				if ($flag == 1) {
					return redirect()->to('/projects');
				}
			}
		}
		$data = $model->project_info($id);
		return view('permanent/project_edit', array('previous_data' => $data[0]));
	}

	//------------------- Controller method to delete a particular file----------------
	public function deletefilecontroller($id, $filename, $filesize)
	{
		// we need to know the project Id , filename and file size to delete a particular file so we access this info from the url
		$uri = current_url(true);
		$count = $uri->getTotalSegments();
		$file_size_delete = $uri->getSegment($count);
		$file_name_delete = $uri->getSegment($count - 1);
		$ref_id = $uri->getSegment($count - 2);

		$model = new ProjectsModel();
		$flag = $model->delete_file($ref_id, $file_name_delete, $file_size_delete);
		if ($flag) {
			return redirect()->to('/edit/' . $id);
		}
	}
}
