<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permisstion;
use App\Helper\htmlPermisstion;
use App\Http\Requests\permisstion\AddPermisstion;
use App\Http\Requests\permisstion\EditPermisstion;

class PermisstionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $permisstion;
    private $perHtml;
    public function __construct(Permisstion $permisstion,htmlPermisstion $html)
    {
        $this->permisstion=$permisstion;
        $this->htmlPermisstion = $html;
    }
    public function index()
    {
        $paginate=10;
        $permisstions =  $this->permisstion->where('parent_id', 0)->paginate($paginate);
        return view('admin.permisstion.index', [
            'title' => 'Permisstions',
            'tieude' => 'Danh sách Permisstion',
            'permisstions' => $permisstions,
            'paginate' => $paginate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = config('permisstion.module');
        $module_childs = config('permisstion.module_child');
        $permisstions = $this->permisstion->where('parent_id', 0)->get();
        $html =  $this->htmlPermisstion -> permisstionAdd($modules);
        return view('admin.permisstion.add', [
            'title' => 'Permisstions',
            'tieude' => 'Tạo Permisstion',
            'module_childs' =>  $module_childs,
            'modules' =>  $modules,
            'permisstions' => $permisstions,
            'html' => $html

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPermisstion $request)
    {
        $name = strtolower($request['name']);
        $permisstion = $this->permisstion->create([
            'name' => $name,
            'display' => $name,
            'parent_id' => 0,
          
        ]);
        if ($request->module_child) {
            foreach ($request->module_child as $child) {
                $this->permisstion->create([
                    'name' => $permisstion->name . $child,
                    'display' => $child . ' ' . $permisstion->name,
                    'parent_id' =>  $permisstion->id,
                    'key' =>  $permisstion->name . $child,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Đã tạo permisstion : ' . $permisstion->name);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPermisstion $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permisstions = $this->permisstion
            ->where('id',$id)->orWhere('parent_id',$id)
            ->get();
        foreach($permisstions as $permisstion){
            $permisstion->delete();
        }
        return redirect()->back()->with('success','Xóa thành công ');
    }
}
