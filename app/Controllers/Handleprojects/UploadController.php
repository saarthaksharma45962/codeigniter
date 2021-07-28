<?php

namespace App\Controllers\Handleprojects;

use App\Controllers\BaseController;
use App\Models\ProjectsModel;

class UploadController extends BaseController
{
	public function index($id)
	{
		if ($this->request->getMethod() == "get") {
			$uri = current_url(true);
			$count = $uri->getTotalSegments();
			$id = $uri->getSegment($count);


			return view("permanent/upload_view", array('ID' => $id));
		} else {
			$uri = current_url(true);
			$count = $uri->getTotalSegments();
			$id = $uri->getSegment($count);

			if ($this->request->getMethod() == "post") {

				$model = new ProjectsModel();
				$data = $model->project_info($id);
				if ($files = $this->request->getFiles()) {
					$filenames = $data[0]["File_Names"]; //variable to store the file names
					$filesizes = $data[0]["File_Sizes"]; // variable to store the file sizes
					//----------------------------------------------loop is used for moving each file to the uploads directory
					foreach ($files['inputFile'] as $value) {
						if ($value->isValid() && !$value->hasMoved()) {
							$value->move("assets\uploads");  //moving the file to the uploads directory in writables

							$name = $value->getClientName();  //variable to get the name of the file
							$size = $value->getSize();  // variable to get the size of the file
							$filenames .= $name . ",";   // concatenating new file names to previous names
							$filesizes .= $size . ",";  // concatenating  sizes to previous sizes 
						}
					}
					$update_data = array(
						'File_Names' => $filenames,
						'File_Sizes' => $filesizes
					);
					$flag = $model->update_project($id, $update_data);
					if ($flag) {
						return redirect()->to('edit/' . $id);
					}
				}
			}
		}
	}
}
