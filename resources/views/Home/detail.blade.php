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
    <link rel="stylesheet" href="{{ asset('adtp123\css\home\page-search.css') }}">
    <link rel="stylesheet" href="{{ asset('adtp123\css\home\detail.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12 searchLeft">
            <form action="{{route('search')}}" method="get">
                @csrf 
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="form-group">
                    <select name="id" id="id" class="form-control">
                        <option value="" selected>Chọn Danh mục </option>
                       {!!$html!!}
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Giá từ (mặc định là 0 VND)">
                    <input type="text" class="form-control" placeholder="Đến">
                </div>
                <button type="submit" class="btn btn-primary">Tìm</button>
            </form>
        </div>
        <div class="col-md-9 col-lg-9 col-12 searchRight">
            <div class="productInfo">
                Sản phẩm : <b>{{ $product->productName }}</b>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-5 col-lg-5 col-12">
                    <div id="carouselExampleIndicators" class="carousel slide img-product" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @php
                                $list = explode('!', $product->imageList);
                                $sl = count($list);
                            @endphp
                            @if ($sl > 1)
                                @for ($i = 1; $i <= $sl; ++$i)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                                @endfor
                            @endif
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('uploads/product/' . $product->image) }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            @if ($product->imageList)
                                @foreach ($list as $image)
                                    <div class="carousel-item">
                                        <img src="{{ asset('uploads/product/' . $image) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @if ($product->imageList)
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        @endif
                    </div>

                </div>
                <div class="col-md-7 col-lg-7 col-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true"><b>Sản phẩm</b></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false"><b>Thông tin chi
                                    tiết</b></a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div>
                                @include('admin.layout.alert')
                                <p>Tên sản phẩm:</p>
                                <p>Giá sản phẩm: {{ number_format($product->price) }}VNĐ</p>
                                <p>Khuyến mãi: {{ number_format($product->sale) }} %</p>
                                <p>Giá sau khuyến mãi :
                                    {{ number_format($product->price - ($product->price / 100) * $product->sale) }} VNĐ
                                </p>
                                <form action="{{ route('cart.store') }}" method="post">
                                    @csrf
                                    @if (isset($cart->items[$product->id]))
                                        <p>Số lượng: <input type="number" name="quantity" max="100" min="0"
                                                value="{{ $cart->items[$product->id]['quantity'] }}"> <a
                                                href="{{ route('cart.store') }}">
                                                <ion-icon style="color: green" name="checkbox-outline"></ion-icon>
                                            </a></p>
                                    @else
                                        <p> Số lượng: <input type="number" name="quantity" max="100"
                                                min="0" value="1"></p>
                                    @endif
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <p>Thêm vào giỏ hàng <button style="border: none" type="submit">
                                            <ion-icon class="btn btn-outline-success" name="cart-outline"></ion-icon>
                                        </button></p>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
