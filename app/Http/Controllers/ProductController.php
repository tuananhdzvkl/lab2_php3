<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function home(){
        return view('welcome')->with('home');
    }

    public function listProducts(Request $request){
        $query = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name as product_name', 'product.price', 'category.name as category_name', 'product.view', 'product.create_at', 'product.update_at');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('product.name', 'LIKE', '%' . $search . '%');
        }

        $products = $query->get();

        return view('index')->with(['listProducts' => $products]);
    }

    public function addProducts() {
        $categories = DB::table('category')->select('id', 'name')->get();
        return view('add-product')->with(['categories' => $categories]);
    }

    public function addProductsPost(Request $req) {
        $data = [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'price' => $req->price,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);

        session()->flash('success', 'Bạn đã thêm sản phẩm thành công.');
        return redirect()->route('product.list');
    }

    public function editProducts($id) {
        $product = DB::table('product')->where('id', $id)->first();
        $categories = DB::table('category')->select('id', 'name')->get();
    
        if (!$product) {
            session()->flash('error', 'Lỗi khi lấy thông tin sản phẩm.');
            return redirect()->route('product.list');
        }
    
        // Chuyển đổi giá trị price về dạng số nguyên
        $product->price = (int) str_replace(',', '', $product->price);
    
        return view('edit-product')->with(['product' => $product, 'categories' => $categories]);
    }
    

    public function editProductsPost(Request $req, $id) {
        $data = [
            'name' => $req->name,
            'category_id' => $req->category_id,
            'price' => (int) $req->price, // Chuyển đổi giá trị price thành số nguyên
            'view' => (int) $req->view,   // Chuyển đổi giá trị view thành số nguyên
            'update_at' => Carbon::now(), // Định dạng ngày giờ với đầy đủ 4 chữ số của năm
        ];
        
        DB::table('product')->where('id', $id)->update($data);
    
        session()->flash('success', 'Bạn đã cập nhật sản phẩm thành công.');
        return redirect()->route('product.list');
    }

    
    

    public function deleteProducts($id) {
        DB::table('product')->where('id', $id)->delete();
        session()->flash('success', 'Bạn đã xóa sản phẩm thành công.');
        return redirect()->route('product.list');
    }
}
