@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{asset('adtp123\css\checkbox\checkbox-toggle.css')}}">
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('banner.index')}}">Banner</a></li>
<li class="breadcrumb-item active">Thêm Banner</li>
@endsection
@section('js')
@endsection

@section('content')
    <div class="formAdd row justify-content-center " >
       <div class="col-8 ">
        @include('admin.layout.alert')
        <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bannerName">Banner Name</label>
                <input type="text" name="bannerName" id="bannerName" class="form-control"  placeholder="Nhập tên banner">
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" name="image" id="image" class="form-control-file"  >
            </div>
            <div class="form-group">
                <label for="prioty">Vị trí</label>
               <div class="col-4"> <input type="number" placeholder="0" value="" min="0" class="form-control" id="prioty" name="prioty" ></td></div>
            </div>
            <div id="wapper" class="form-group">
                Hiển thị : &emsp; <input type="checkbox" value="1" name="status" checked class='switch-toggle'></td>
            </div>
            <button type="submit">Thêm Banner</button>
        </form>
       </div>
    </div>
@endsection