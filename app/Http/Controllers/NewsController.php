<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OurNews;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        return view('Pages.frontend.news.news', [
            'categories' => NewsCategory::latest()->get(),
            'news'       => OurNews::latest()->get(),
        ]);
    }

    public function details($slug)
    {
        $news       = OurNews::where('slug', $slug)->first();
        $categories = NewsCategory::latest()->get();
        return view('Pages.frontend.news.details', compact('news', 'categories'));
    }
}
