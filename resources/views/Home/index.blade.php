@extends('Home.layout.main')
@section('menu')
    @include('home/layout/menu')
@endsection
@section('banner')
    @include('home/layout/banner')
@endsection
@section('formSearch')
    @include('home/layout/formSearch')
@endsection
@section('css')
    <style>
        #content{
            box-shadow: 5px 5px 10px rgba(45, 199, 6, 0.5)
        }
    </style>
@endsection
@section('content')
    <div id="content">
        <x-title-product :title="'Sản phẩm Hot'" />
       <x-product :products="$productHot"/>
       <hr>
       <x-title-product :title="'Sản phẩm Mới'" />
       <x-product :products="$productNew"/>
    </div>
@endsection
