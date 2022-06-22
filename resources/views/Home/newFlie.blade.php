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
@section('content')
        <x-title-product :title="'Laptop'" />
        <x-product :nameProduct="'Laptop'" :quantity="10" />
        <hr>
        <x-title-product :title="'Điện thoại'" />
        <x-product :nameProduct="'Điện thoại'" :quantity="10" />
@endsection
