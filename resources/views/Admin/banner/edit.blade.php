@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{asset('adtp123\css\checkbox\checkbox-toggle.css')}}">
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('banner.index')}}">Banner</a></li>
<li class="breadcrumb-item active">Edit Banner</li>
@endsection
@section('js')
@endsection

@section('content')
    <div class="formAdd row justify-content-center " >
       <div class="col-8 ">
        @include('admin.layout.alert')
        <form action="{{route('banner.update', $banner->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="bannerName">Banner Name</label>
                <input type="text" name="bannerName" id="bannerName" value="{{$banner->bannerName}}" class="form-control"  placeholder="Nhập tên banner">
                <input type="hidden" name="id" id="id" value="{{$banner->id}}" class="form-control"  >
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" name="image" id="image" value="{{$banner->image}}" class="form-control-file"  >
                <img src="{{asset('uploads/banner/'.$banner->image)}}" width="80%" height="300px"  alt="{{$banner->bannerNmae}}">
            </div>
            <div class="form-group">
                <label for="prioty">Vị trí</label>
                <div class="col-4">  <input type="number" placeholder="0" min="0" value="{{$banner->prioty}}" class="form-control" id="prioty" name="prioty" ></td></div>
            </div>
            <div id="wapper" class="form-group">
                Hiển thị : &emsp; <input type="checkbox" value="1" name="status"{{$banner->status==1 ? "checked" :  ""}} class='switch-toggle'></td>
            </div>
            <button type="submit">Sửa Banner</button>
        </form>
       </div>
    </div>
@endsection