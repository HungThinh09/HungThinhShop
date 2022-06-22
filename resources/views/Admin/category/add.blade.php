@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{asset('adtp123\css\checkbox\checkbox-toggle.css')}}">
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
<li class="breadcrumb-item active">Add Category</li>
@endsection
@section('js')
@endsection

@section('content')
    @include('admin.layout.alert')
    <div class="formAdd row justify-content-center " >
       <div class="col-8 ">
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" name="name" id="id" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="parent_id">Danh mục Cha</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="0">---Chọn danh mục cha---</option>
                    {!!$html!!}
                </select>
            </div>
            <div class="form-group">
                <label for="prioty">Vị trí</label>
                <input type="number" value="" class="form-control"  name="prioty" ></td>
            </div>
            <div id="wapper" class="form-group">
                Hiển thị : &emsp; <input type="checkbox" value="1" name="status" checked class='switch-toggle'></td>
            </div>
            <button type="submit">Thêm danh mục</button>
        </form>
       </div>
    </div>
@endsection