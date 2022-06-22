<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\AddUser;
use App\Http\Requests\User\EditUser;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user=$user;
        $this->role=$role;
    }
    public function index()
    {
        $paginate=10;
        $users = $this->user->search()->paginate($paginate);
        return view('admin.user.index',[
            'title'=> 'User',
            'tieude' => 'Danh sách user',
            'users' => $users,
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
        $roles=$this->role->all(); 
        return view('admin.user.add',[
            'title' => 'User',
            'tieude' => 'Thêm User',
            'roles' => $roles

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUser $request)
    {
    if($request->password === $request->re_password){
        if(
            $user=$this->user->create([
                'name' =>$request->name,
                'user' => $request->user,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ])
        ){
            $user->roles()->sync($request['role']);
            return  redirect()->back()->with('success','Thêm thành công user : '.$user->user);
        }
        return  redirect()->back()->with('error','Có lỗi trong quá trình thêm User !!!');
    }
    return redirect()->back()->with('error','Nhập lại password không đúng');
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
        $roles=$this->role->all(); 
        $user = $this->user->find($id);
        if($user){
         return view('admin.user.edit',[
            'title' => 'User',
            'tieude' => "Sửa user : ".$user->user,
            'user' => $user, 
            'roles' => $roles
         ]);
        }return redirect()->back()->with('error','Không tìm thấy user cần sửa');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUser $request, $id)
    {
        // $user = $this->user->find($id);
        //  if($user){
        //     $password=$user->password;
        //     if($request->password){
        //         $password=Hash::make($request->password);
        //     }
        //     $user->update([
        //         'name' => $request->name,
        //         'user' => $request->user,
        //         'email' => $request->email,
        //         'user' => $request->user,
        //         'password' => $password
        //     ]);
        //     $user->roles()->sync($request['role']);
        //     return  redirect()->back()->with('success','Sửa thành công user '.$user->user);
            
        // }
        // return redirect()->back()->with('error','Không tìm thấy user cần sửa');
        return redirect()->back()->with('error','Admin đang tạm khóa chức năng thay đổi User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        if($user){
            $user->delete();
            return  redirect()->back()->with('success','Xóa thành công user');
        }
        return  redirect()->back()->with('error','User not found');
    }
}
