<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\AddRole;
use App\Http\Requests\Role\EditRole;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Permisstion;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $role;
    public function __construct(Role $role,Permisstion $permisstion)
    {
        $this->role = $role;
        $this->permisstion=$permisstion;
    }
    public function index()
    {
        $paginate = 10;
        $roles = $this->role->search()->paginate($paginate);
        return view('admin.role.index', [
            'title' => 'Role',
            'tieude' => 'Danh sách Role',
            'roles' => $roles,
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
        $permisstions=$this->permisstion->where('parent_id',0)->get();
        return view('admin.role.add',[
            'title' => 'Add Role',
            'tieude' => 'Thêm Role',
            'permisstions' => $permisstions
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRole $request)
    {

        $role=$this->role->create([
            'roleName' => $request['roleName'],
            'description' => $request['description']
        ]);
        $role->permisstion()->sync($request['childPer']);
        return redirect()->back()->with('success','Thêm thành công role '.$role->name);
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
        $role=$this->role::find($id); 
        if($role==null){
            return redirect()->back()->with('error','Không tìm thấy role, vui lòng quay lại sau');
        }
        $permisstions=$this->permisstion->where('parent_id',0)->get();
        return view('admin.role.edit',[
            'title' => 'Edit Role',
            'tieude' => 'Sửa Role',
            'role' => $role,
            'permisstions' => $permisstions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRole $request, $id)
    {
        $role = $this->role->find($id);
        if ($role) {
            if (
                $role->update([
                    'roleName' => $request['roleName'],
                    'description' => $request['description']
                ])
                ) {
                    $role->permisstion()->sync($request['childPer']);
                return redirect()->back()->with('success', 'Sửa thành công role : '.$role->roleName);
            }
            return redirect()->back()->with('error', 'Sửa role thất bại, vui lòng thử lại');
        }
        return redirect(route('role.index'))->with('error', 'Không tìm thấy role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $role = $this->role->find($id);
        if($role){
            $role->delete();
            return redirect(route('role.index'))->with('success', 'Xóa role thành công');
        }
        return redirect(route('role.index'))->with('error', 'Không tìm thấy role' .$role->name);
    }
}
