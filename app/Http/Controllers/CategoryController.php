<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\Category\AddRequest;
use App\Http\Requests\Category\EditRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->data =  $this->category->all();
    }
    public function index()
    {
        $paginate=8;
        $categories=$this->category->search()->orderby('prioty','ASC')->paginate($paginate);
        return view('admin.category.index',[
            'title' => 'Danh mục sản phẩm',
            'tieude' => "Danh mục",
            'categories' => $categories,
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
        $html=$this->category->getCategory('',$this->data);
        return view('admin.category.add',[
            'title' => 'Thêm danh mục',
            'tieude' => "Thêm danh mục",
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
    
        $this->category->create([
            'categoryName' => $request->name,
            'categorySlug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
            'status' => $request->input('status',0)
        ]);
        return redirect(route('category.create'))->with('success','Thêm thành công '. $request->name);
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
    public function edit( $id)
    {
        $category=$this->category->where('id',$id)->first();
        if($category){
            $html=$this->category->getCategory($category->parent_id,$this->data);
            return view('admin.category.edit',[
                'title' => "Sửa danh mục",
                'tieude' => "Sửa danh mục : ".$category->categoryName,
                'html' => $html,
                'category' => $category,
            ]);
        }
       return view('errors.404',[
        'title'=> 'Page not found'
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
        $category=$this->category->where('id',$id)->first();
        $category->update([
            'categoryName' => $request->name,
            'categorySlug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
            'prioty' => $request->prioty,
            'status' => $request->input('status',0)
        ]);
        return redirect(route('category.index'))->with('success','Sửa thành công '. $request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $category=$this->category->where('id',$id)->first();
        $category->delete();
        return redirect(route('category.index'))->with('success','Xóa thành công sản phẩm : '.$category->categoryName);
    }

}
