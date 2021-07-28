<?php

namespace App\Controllers;

use App\Models\ProjectsModel;

class Home extends BaseController
{


	public function index()
	{
		//checking if logged in or not
		if (!logged_in() && !session()->has('google_user')) {
			return redirect()->to('/');
		}
		//creating object of our model so that we can select all the database from database and display  it
		$model = new ProjectsModel();
		$data = $model->get_records();
		// print_r($data);
		return view('permanent/projects', array(
			'data' => $data
		));
	}
}
