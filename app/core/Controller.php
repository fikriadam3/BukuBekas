<?php 


// ini kelas utama yang nanti isinya untuk ngambil data di URL
class Controller {
	public function view($view, $data=[])
	{
		require_once '../app/views/'.$view.'.php'; // misal home berarti $view = home/index + .php
	}

	public function model($model)
	{
		require_once '../app/models/'. $model . ".php";
		return new $model;
	}
}