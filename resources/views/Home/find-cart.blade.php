@extends('Home.layout.main')
@section('menu')
    @include('home/layout/menu')
@endsection
@section('formSearch')
    @include('home/layout/formSearch')
@endsection
@section('css')
    <style>
        #findCart{
           min-height: 120vh;
        }
    </style>
@endsection
@section('content')
    <div id="findCart">
        <div class="find-cart">
            <form action="{{route('findOrder')}}" method="get">
                <input style="padding: 5px" value="{{request()->code ? request()->code:""}}" name="code" required type="text" placeholder="Nhập mã đơn hàng...">
                <button type="submit" class="btn btn-success">Tìm</button>
            </form>
        </div> <hr>
        <h3>Thông tin đơn hàng: <b>{{request()->code}}</b></h3>
        @if(!empty($order))
        <x-cart-status :status="$order->status" :style="'0'" />
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th width="30%">Hình ảnh</th>
                    <th>Đơn giá</th>
                    <th width="10%">Số lượng </th>
                    <th width="15%">Thành tiền(VND)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $quantity = $price = 0;
                @endphp
                @foreach($order ->carts as $key => $cart)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cart->product->productName}}</td>
                    <td><img width="80%" src="{{asset('uploads/product/'.$cart->product->image)}}" alt=""></td>
                    <td>{{$cart->price}}</td>
                    <td>
                        {{$cart->quantity}}
                    </td>
                    <td>{{number_format($cart->price * $cart->quantity)}} </td>
                </tr>
                @php
                $quantity += $cart->quantity;
                $price += $cart->price * $cart->quantity;
            @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Tổng sản phẩm</th>
                    <th>{{$quantity}}</th>
                </tr>
                <tr>
                    <th colspan="5">Thành tiền</th>
                    <th><b>{{number_format($price)}} VNĐ</b></th>
                    <th>
                    </th>
                </tr>
            </tfoot>
        </table>
        @else
        <div>Đơn hàng này : {{request()->code}} không tồn tại</div>
        @endif
    </div>
@endsection
