<?php namespace App\Http\Controllers;

use LeftRight\Center\Models\Page;

class AboutController extends Controller {
	
	/**
	 * about inside page
	 */
	public function show($slug='') {

		//404
		if (!$page = Page::where('slug', $slug)->first()) {
			$page = Page::orderBy('precedence')->first();
			return redirect()->action('AboutController@show', $page->slug);
		}
		
		return view('about.page', [
			'title' => strip_tags($page->title),
			'page' => $page,
			'pages' => Page::orderBy('precedence')->get(),
		]);
	}

}