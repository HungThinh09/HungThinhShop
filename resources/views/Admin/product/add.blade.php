@extends('admin.layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('adtp123\css\checkbox\checkbox-toggle.css')}}">
<link rel="stylesheet" href="{{asset('adtp123\plugins\summernote\summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{asset('adtp123\js\admin\select2\select2.min.css')}}" />
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a></li>
    <li class="breadcrumb-item active">Add  Product</li>
@endsection
@section('content')
    @include('admin.layout.alert')
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="formAdd row justify-content-center ">
            <div class="col-md-9 col-lg-9 col-12">
                <div class="form-group">
                    <label for="name">Tên Sản phẩm</label>
                    <input type="text" name="name" id="id" value="{{old('name')}}"class="form-control" placeholder="Nhập tên danh mục">
                    @error('name')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Danh mục</label>
                    <select name="category[]" id="category" class="form-control select2-cate" multiple>
                        {!!$html!!}
                    </select>
                    @error('categorys')
                    <div class="help-block">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea name="description"  class="form-control" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                    @error('description')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag">Thẻ Tag</label>
                    <select class="form-control select2-tag"  name="tag[]" multiple>
                    </select>
                    @error('tag')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Ảnh</label>
                    <input type="file" name="image" id="image" class="form-control-flie" placeholder="">
                    @error('image')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imageList">List Ảnh</label>
                    <input type="file" name="imageList[]" multiple id="imageList" class="form-control-flie" placeholder="">
                    @error('tag')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="col-md-3 col-lg-3 col-12">    
                <div class="form-group">
                    <label for="price">Giá sản phẩm</label>
                    <input type="number" require name="price" value={{old('price')}} id="id" class="form-control" placeholder="Nhập tên giá sản phẩm (VNĐ)">
                    @error('price')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sale">Giá sale</label>
                    <input type="number" require name="sale" value="0" min="0" max="100" id="sale" class="form-control" placeholder="%">
                    @error('sale')
                        <div class="help-block">{{ $message }}</div>
                    @enderror
                </div>         
                <div id="wapper" class="form-group">
                    Hiển thị : &emsp; <input type="checkbox" value="1" name="status" checked class='switch-toggle'>
                    </td>
                </div>     
                
                <div id="wapper" class="form-group">
                    Còn hàng :  &emsp; <input type="checkbox" value="1" name="active" checked class='switch-toggle'>
                    </td>
                </div>    
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg" style="margin: 20px">Thêm danh mục</button>
    </form>
@endsection
@section('jquery')
<script src="{{asset('adtp123\plugins\summernote\summernote-bs4.min.js')}}"></script>
<script src="{{asset('adtp123\js\admin\summernot.js')}}">  </script>
<script src="{{asset('adtp123\js\admin\select2\select2.min.js')}}"></script>
<script src="{{asset('adtp123\js\admin\select2\product_js.js')}}"></script>
@endsection
