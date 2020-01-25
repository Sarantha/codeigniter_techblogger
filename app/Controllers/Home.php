<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index($page='home')
	{
		//return view('welcome_message');
		if(!is_file(APPPATH.'/views/pages/'.$page.'.php')){
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}
		return view("pages/{$page}");
	}

	public function contact(){
		return view("pages/contact");
	}

	public function about(){
		return view("pages/about");
	}
	public function login(){
		return view("pages/login");
	}
	//--------------------------------------------------------------------

}
