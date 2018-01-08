<?php

namespace App\Http\Controllers;
use App\Post;

use Carbon\Carbon;

class PagesController extends Controller {

	public function getIndex() 
	{
		return view('pages.welcome');
	}

	public function getNow()
	{
		return view('pages.now');
	}

	public function getPortfolio()
	{
		return view('pages.portfolio');
	}
}