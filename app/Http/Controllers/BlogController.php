<?php

namespace App\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use App\Post;

use Carbon\Carbon;

class BlogController extends Controller
{

	public function getIndex()
	{
		$postsdates = Post::all()->sortByDesc('created_at')->groupBy(function($date){
		    return Carbon::parse($date->created_at)->format('Y');
		})
		->map(function($item) {
			return $item->groupBy( function ($item) {
				return $item->created_at->format('m');
			});
		});
		return view('blog.index')->withPostsdates($postsdates);
	}

	public function getSingle($slug)
	{
		$post = Post::where('slug', '=', $slug)->first();

		return view('blog.single')->withPost($post);
	}

}
