<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
class WelcomeController extends Controller
{
	public function index()
	{
		if ($_POST) {
			
			$photo=$request->file('pphoto');
			var_dump($photo);exit;
	        $storagepath=storage_path();
	        $storagename=date('YmdHis') . rand(1000, 9999) . '.jpg';

	        $targetName=$storagepath.'/'.$storagename;
	        $photo->move($storagepath,$storagename);
		}

		return view('welcome');
	}

	public function contact()
	{
		echo "contact to me";
		
		return view("index/contact");
	}
}