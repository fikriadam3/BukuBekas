<?php 

class App{
	// controller dll default
	protected $controller = "HomeController";
	protected $method = "index";
	protected $params = [];


	public function __construct()
	{
		$url = $this->parseURL();
		
		// controller
		if ($url == NULL) // jika tidak menuliskan url 
		{
			$url = [$this->controller];
		}
		if ( file_exists('../app/controllers/'.$url[0].'Controller'.'.php') ) {
			$this->controller = $url[0]. 'Controller';
			unset($url[0]);
		}
		// echo $this->controller;
		require_once '../app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller; // inisialisasi HomeController misal jika url[0] = home

		// method
		if(isset($url[1])){
			if (method_exists($this->controller, $url[1]) ) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}   
		// echo "<br>"	;
		// echo $this->method;

		// params
		if ( !empty($url) ) {
			$this->params = array_values($url);
		}

		// echo $this->controller;
		// echo $this->method;
		// die();
		// jalankan controller dan method serta kirim params jika ada
		call_user_func_array([$this->controller,$this->method], $this->params);




	}

	public function parseURL()
	{
		if( isset($_GET['url']) ){
			$url = rtrim($_GET['url'], '/'); //hapus slash di akhir karna kalau ada nanti keambil string setelah slashnya
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}