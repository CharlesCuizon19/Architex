<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        return view('frontend.homepage');
    }
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    public function properties()
    {
        return view('frontend.properties');
    }
    public function services()
    {
        return view('frontend.services');
    }
    public function blogs()
    {
        return view('frontend.blogs');
    }
    public function contactUs()
    {
        return view('frontend.contact-us');
    }
    public function blogSinglePage()
    {
        return view('frontend.blog-single-page');
    }
    public function propertiesSinglePage()
    {
        return view('frontend.properties-single-page');
    }
}
