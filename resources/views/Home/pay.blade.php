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
    <style>
        .red {
            color: red
        }

        .pay {
            box-shadow: 5px 5px 5px 5px rgba(153, 243, 70, 0.5)
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-6 col-12">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">STT</th>
                        <th>Tên Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền (VND)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($cart->items as $item)
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['priceSale'] * $item['quantity']) }}</td>
                        </tr>
                        @php
                            $stt++;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Tổng Sản phẩm</th>
                        <th>{{ $cart->total_quantity }}</th>
                    </tr>
                    <tr>
                        <th colspan="3">Tổng Tiền (VNĐ)</th>
                        <th>{{ number_format($cart->total_price) }} <b>VNĐ</b></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-6 col-lg-6 col-12 pay">
            @include('admin.layout.alert')
            <form action="{{route('order')}}" method="post">
                @csrf @method('get')
                <div class="form-group">
                    <label for="name">Tên khách hàng <span class="red">(*)</span></label>
                    <input class="form-control" name="name" id="name" type="text" required
                        placeholder="Nhập tên ...">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại <span class="red">(*)</span></label>
                    <input class="form-control" id="phone" maxlength="10" name="phone" type="number" required
                        placeholder="Nhập số điện thoại ...">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ <span class="red">(*)</span></label>
                    <input class="form-control" id="address" name="address" type="text" required
                        placeholder="Nhập địa chỉ khác hàng ...">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email"
                        placeholder="Nhập Email (nếu có)...">
                </div>
                <div class="form-group">
                    <label for="note">Ghi chú</label>
                    <textarea class="form-control" name="note" id="note" cols="30" rows="10"
                        placeholder="Nhập ghi chú sản phẩm..."></textarea>
                </div>
                <button type="submit" onclick="confirm('Nhấn OK để hoàn tất đơn hàng!')" class="btn btn-outline-light">Thanh toán <ion-icon name="logo-paypal"></ion-icon>
                </button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
