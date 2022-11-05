<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        // return view('page.trangchu');
        // return view('page.trangchu', compact('slide'));
        $new_product = Product::where('new', 1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(4);
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getLoaiSp($type) {
        $type_product = ProductType::all();

        $sp_theoloai = Product::where('id_type', $type)->get();

        $sp_khac = Product::where('id_type', '<>', $type)-> paginate(3);

        $loai_sp = ProductType::where('id', $type)->first();

        return view('page.loai_sanpham', compact('type_product','sp_theoloai', 'sp_khac', 'loai_sp')); 
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