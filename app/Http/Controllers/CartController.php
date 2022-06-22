<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $product;
    private $cart;
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back()->with('success', 'Đã xóa giỏ hàng');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartHelper $cart)
    {
        $data = $request->validate([
            'id' => 'required',
            'quantity' => ""
        ]);
        $product = $this->product::find($data['id']);
        if ($product == null) {
            return redirect()->back()->with('error', 'có lỗi trong quá trình mua hàng');
        }
        $quantity = $data['quantity'] ? $data['quantity'] : "1";

        $cart->add($product, $quantity);
        return redirect()->back()->with('success', $product->productName . ' đã được thêm vào giỏ hàng.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CartHelper $cart)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back()->with('success', 'Đã xóa thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, CartHelper $cart)
    {
        $quantity = $request->quantity ? $request->quantity : 1;

        $cart->update($id, $quantity);
        return redirect()->back()->with('success', 'Thay đổi thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartHelper $cart)
    {
     
    }
}
