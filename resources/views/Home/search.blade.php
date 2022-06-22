@extends('Home.layout.main')
@section('menu')
    @include('home/layout/menu')
@endsection
@section('banner')
@endsection
@section('formSearch')
    @include('home/layout/formSearch')
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('adtp123\css\home\page-search.css')}}">
<link rel="stylesheet" href="{{ asset('adtp123\css\home\detail.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12 searchLeft">
            <form action="{{route('search')}}" method="post">
                @csrf @method('get')
                <div class="form-group">
                    <input type="text" name="search" value="{{request()->search ?request()->search :  ""}}" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="form-group">
                    <select name="id" id="id" class="form-control">
                        <option value="" selected>Chọn Danh mục </option>
                        {!!$html!!}
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="min" value="{{request()->min ? request()->min : ""}}" placeholder="Giá từ (mặc định là 0 VND)">
                    <input type="text" class="form-control" name="max" value="{{request()->max ? request()->max : ""}}" placeholder="Đến">
                </div>
                <button type="submit" class="btn btn-primary">Tìm</button>
            </form>
        </div>
        <div class="col-md-9 col-lg-9 col-12 searchRight">
            <x-title-product :title="'Tìm Kiếm'" />
            <hr>
            <x-product :products="$products"  />
            <div>
                {{ $products->appends(request()->all())->links() }}
            </div>
            <hr>
            <div>
                <b>Có thể bạn quan tâm</b>
                <hr>
                <x-product :products="$productQt"/>
            </div>
        </div>
    </div>
@endsection
