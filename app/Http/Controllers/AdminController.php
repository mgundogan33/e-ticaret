<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category();
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Kategori Oluşturuldu');
    }
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Kategori Silindi');
    }
    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request)
    {
        $product = new product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);

        $product->image = $imagename;

        $product->save();
        return redirect()->back()->with('message', 'Ürün Eklendi');
    }
    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id)
    {

        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Ürün Silindi');
    }
    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        // $product->update();
        return view('admin.update_product', compact('product', 'category'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);

            $product->image = $imagename;
        }

        $product->save();
        return redirect()->back()->with('message', 'Ürün Güncellendi');
    }
    public function order()
    {
        $order = Order::all();

        return view('admin.order', compact('order'));
    }
    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = "Teslim Edildi";
        $order->payment_status = 'Ücret Ödendi';

        $order->save();

        return redirect()->back();
    }
    public function print_pdf($id)
    {
        $order=Order::find($id);
        $pdf = PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
    }
}
