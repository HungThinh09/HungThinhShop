<?php

namespace App\Http\Controllers;

use App\Helper\Image;
use App\Models\Banner;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Requests\banner\AddBanner;
use App\Http\Requests\banner\EditBanner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $banner;
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }
    public function index()
    {
        $paginate = 5;
        $banners = $this->banner->search()->paginate($paginate);
        return view('Admin.banner.index', [
            'title' => 'Danh sách banner',
            'tieude' => 'Bannners',
            'banners' => $banners,
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
        return view('Admin.banner.add', [
            'title' => 'Thêm banner',
            'tieude' => 'Thêm Banner',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBanner $request)
    {
        if ($request->has('image')) {
            $slug = str::slug($request->bannerName);
            $image = new Image;
            $image = $image->UploadImage($request->image, 'banner', auth::id(), $slug);
            $banner = $this->banner->create([
                'bannerName' => $request->bannerName,
                'bannerSlug' => $slug,
                'prioty' => $request->input('prioty', 0),
                'status' => $request->input('status', 0),
                'image' => $image,
            ]);
            return redirect()->back()->with('success', 'Thêm thành công banner : ' . $banner->bannerName);
        }
        return redirect()->back()->with('errors', 'Có lỗi vui lòng thử lại sau');
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
        $banner = $this->banner->find($id);
        if ($banner) {
            return view('admin.banner.edit', [
                'title' => 'Edit banner',
                'tieudeu' => 'sửa banner',
                'banner' => $banner
            ]);
        }
        return redirect(route('banner.index'))->with('error', 'This banner not fount!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBanner $request, $id)
    {
        $banner = $this->banner->find($id);
        if ($banner) {
            $image = $banner->image;
            $slug =str::slug($request->bannerName);
            if ($request->has('image')) {
                $image= new Image;
                $image=$image->UpdateImage($request->image,'banner',auth::id(),$slug,$banner->image);
            }
            $banner->update([
                'bannerName' => $request->bannerName,
                'bannerSlug' => $slug,
                'prioty' => $request->input('prioty', 0),
                'status' => $request->input('status', 0),
                'image' => $image
            ]);
            return redirect()->back()->with('success','Thay đổi banner '.$banner->bannerName.' thành công');
        }
        return redirect()->back()->with('errors','Có lỗi trong quá trình thay đổi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner=$this->banner->find($id);
        if($banner){
            $Image = new Image;
            $Image->DelImage('banner', $banner->image);
            $banner->delete();
            return redirect(route('banner.index'))->with('success','Đã xóa banner : '.$banner->bannerName);
        }
        return redirect(route('banner.index'))->with('error','Banner not founds' );
    }
 
}
