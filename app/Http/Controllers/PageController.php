<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Comment;
use App\Models\Cart;
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

    public function getDetail(Request $request)
    {
        $sanpham =  Product::where('id', $request->id)->first();

        $splienquan = Product::where('id', '<>', $sanpham->id, 'and', 'id_type', '=', $sanpham->id_type,)->paginate(3);

        $comments = Comment::where('id_product', $request->id)->get();
        
        return view('page.chitiet_sanpham', compact('sanpham', 'splienquan', 'comments'));
    }

    public function getAddToCart(Request $req, $id) 
    {
        // if (Session()->has('user')) {
            if(Product::find($id)) {
                $product = Product::find($id);
                $oldCart = Session('cart')?Session()->get('cart'):null;
                $cart = new Cart($oldCart);
                $cart -> add($product, $id);
                $req -> session()->put('cart', $cart);
                return redirect()->back();
        //     } else {
        //         return '<script>alert("Không tìm thấy sản phẩm này.");window.location.assign("/");</script>';
        //     }     
        // }  else {
        //     return '<script>alert("Vui lòng đăng nhập để sử dụng chức năng này.");window.location.assign("/login");</script>';
            }
    }

    public function getDelItemCart($id){
        $oldCart = Session('cart')?Session()->get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session()->put('cart', $cart);
        return redirect()->back();
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