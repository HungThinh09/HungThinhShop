<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Product\AddRequest;
use App\Http\Requests\Product\EditRequest;
use Illuminate\Support\Str;
use App\Helper\Image;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $product;
    public function __construct(Product $product, category $category)
    {
        $this->product = $product;
        $this->category = $category;
        $this->data = $this->category->all();
    }
    public function index()
    {
        $paginate = 10;
        $products = $this->product->bycategory()->status()->searchProduct();
        $count = $products->count();
        $products = $products->paginate($paginate);
        return view('admin.product.index', [
            'title' => 'Danh sách sản phẩm',
            'tieude' => 'Danh sách Sản phẩm ( ' . $count. ' )',
            'products' => $products,
            'paginate' => $paginate
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = $this->category->getCategory("", $this->data);
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm',
            'tieude' => 'Thêm Sản phẩm',
            'html' => $html
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $ima = new Image;
        $imageList = "";
        if ($request->imageList) {
            $imageList = $ima->ImageList($request->imageList, 'product', auth::id(), str::slug($request->name));
        }
        $image = $ima->UploadImage($request->image, 'product', auth::id(), str::slug($request->name));
        if ($product = $this->product->create([
            'productName' => $request->name,
            'productSlug' => str::slug($request->name),
            'description' => $request->input('description', ''),
            'price' => $request->price,
            'sale' => $request->input('sale', 0),
            'active' => $request->input('active', 0),
            'status' => $request->input('status', 0),
            'image' => $image,
            'imageList' => $imageList,
        ])) {
            $product->category()->sync($request->category);
            return redirect(route('product.create'))->with('success', 'Tạo sản phẩm thành công');
        }
        return redirect(route('product.create'))->with('error', 'Tạo sản phẩm thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product::find($id);
        if (empty($product)) {
            return redirect(route('product.index'))->with('error', 'Có lỗi trong quá trình sửa, vui lòng quay lại sau');
        }
        $cateIds = "";
        foreach ($product->category as $cates) {
            if ($cateIds == '') {
                $cateIds =  $cates->id;
            } else {
                $cateIds = $cateIds . "!" . $cates->id;
            }
        }
        $html = $this->category->eidtCategory($this->data,  $cateIds);
        return view('admin.product.edit', [
            'title' => 'Sửa sản phẩm',
            'tieude' => 'Sửa Sản phẩm',
            'html' => $html,
            'product' => $this->product->find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $product = $this->product->find($id);
        $ima = new Image;
        $imageList = $product->imageList;
        $image = $product->image;
        if ($request->imageList) {
            $imageList = $ima->ImageList($request->imageList, 'product', auth::id(), str::slug($request->name));
        }
        if ($request->image) {
            $image = $ima->UpdateImage($request->image, 'product', auth::id(), str::slug($request->name), $product->image);
        }
        if ($product->update([
            'productName' => $request->name,
            'productSlug' => str::slug($request->name),
            'description' => $request->input('description', ''),
            'price' => $request->price,
            'sale' => $request->input('sale', 0),
            'active' => $request->input('active', 0),
            'status' => $request->input('status', 0),
            'image' => $image,
            'imageList' => $imageList,
        ])) {
            $product->category()->sync($request->category);
            return redirect(route('product.index'))->with('success', 'Sửa sản phẩm thành công');
        }
        return redirect(route('product.index'))->with('error', 'Sửa sản phẩm thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product::find($id);
        if ($product == null) {
            return redirect()->back()->with('error', 'Không tìm thấy product');
        }
        $product->delete();
        return redirect()->back()->with('success', 'Xóa thành công Sản phẩm: ' . $product->productName);
    }

    public function deleteList()
    {
        $paginate=10;
        $products = $this->product->onlyTrashed()->searchProduct()->bycategory()->paginate($paginate);
        return view('admin.product.deleteList', [
            'title' => 'Danh sách product bị xóa',
            'tieude' => 'Danh sách product bị xóa ('.count($products).')',
            'products' => $products,
            'paginate' => $paginate
        ]);
    }

    public function restore($id)
    {
        $product = $this->product->onlyTrashed()->where('id', $id)->first();
        if ($product == null) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $product->restore();
        return redirect()->back()->with('success', 'Đã khôi phục sản phẩm : ' . $product->productName);
    }

    public function deleteOver($id)
    {
        $product = $this->product->onlyTrashed()->where('id', $id)->first();
        if ($product == null) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $Image = new Image;
        $Image->DelImage('product', $product->image);
        foreach (explode('!', $product->imageList) as $imageDetail) {
            $Image->DelImage('product', $imageDetail);
        }
        $product->ForceDelete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi database ');
    }
}
