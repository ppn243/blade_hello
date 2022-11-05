<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        // return view('page.trangchu');
        // return view('page.trangchu', compact('slide'));
        $new_product = Product::where('new', 1)->get();
        return view('page.trangchu', compact('slide', 'new_product'));
    }

    public function getModel()
    {
        return view('page.product_model');
    }

    public function getDetail()
    {
        return view('page.product_detail');
    }

    public function getContact()
    {
        return view('page.contact');
    }

    public function getAbout()
    {
        return view('page.about');
    }
}