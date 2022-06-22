@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{asset('adtp123\css\checkbox\checkbox-toggle.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('adtp123\plugins\summernote\summernote-bs4.min.css')}}"> --}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('setting.index')}}">setting</a></li>
<li class="breadcrumb-item active">Edit setting</li>
@endsection
@section('jquery')
{{-- <script src="{{asset('adtp123\plugins\summernote\summernote-bs4.min.js')}}"></script>
<script src="{{asset('adtp123\js\admin\summernot.js')}}">  </script> --}}
@endsection

@section('content')
    <div class="formAdd row justify-content-center " >
       <div class="col-8 ">
        @include('admin.layout.alert')
        <form action="{{route('setting.update',$setting->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="settingName">Setting Name</label>
                <input type="hidden" name="id" value="{{$setting->id}}">
                <input type="text" name="settingName" value="{{$setting->settingName}}" id="settingName" class="form-control"  placeholder="Nhập tên setting">
            </div>
            <div class="form-group">
                <label for="value">Value</label>
            <textarea id="description" cols="30" name="value" rows="10" class="form-control" placeholder="nhập value setting">{!!$setting->value!!}</textarea>
            </div>
            <div id="wapper" class="form-group">
                <input type="hidden" value="0" name="status">
                Hiển thị : &emsp; <input type="checkbox" value="1" name="status" {{$setting->status ? "checked" : ""}} class='switch-toggle'></td>
            </div>
            <button type="submit">Sửa setting</button>
        </form>
       </div>
    </div>
@endsection