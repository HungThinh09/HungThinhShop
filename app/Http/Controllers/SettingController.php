<?php

namespace App\Http\Controllers;

use App\Http\Requests\setting\AddSetting;
use App\Http\Requests\setting\EditSetting;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $paginate  = 10;
        $settings = $this->setting->search()->paginate($paginate);
        return view('admin.setting.index', [
            'title' => 'Setting',
            'tieude' => 'Danh sách Setting',
            'settings' => $settings,
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
        return view('admin.setting.add', [
            'tieude' => 'Thêm setting',
            'title' => 'Setting',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSetting $request)
    {
        if ($this->setting->create($request->all())) {
            return redirect()->back()->with('success', 'Đã thêm thành công');
        }
        return redirect()->back()->with('error', 'Có lỗi trong quá trình thêm setting');
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
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', [
            'title' => 'Setting',
            'tieude' => 'Sửa setting',
            'setting' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSetting $request, $id)
    {
        $setting = $this->setting->find($id);
        if ($setting) {
            $setting->update($request->all());
            return redirect()->back()->with('success','Đã sửa thành công');
        }
        return redirect()->back()->with('error','Có lỗi trong quá trình sửa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = $this->setting->find($id);
        if($setting){
            $setting->delete();
            return redirect()->back()->with('success','Đã xóa thành công setting '.$setting->settingName);
        }
        return redirect()->back()->with('error','Có lỗi trong quá trình xóa setting này !!');
    }
}
