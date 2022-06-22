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
        #content{
            min-height: 100vh;
        }
    </style>
@endsection
@section('content')
    <div id="content">
        <div class="find-cart">
            <form action="{{route('findOrder')}}" method="get">
                <input style="padding: 5px" name="code"  required type="text" placeholder="Nhập mã đơn hàng...">
                <button type="submit" class="btn btn-success">Tìm</button>
            </form>
        </div>
        <div >
            @include('admin.layout.alert')
            @if(count($cart->items) > 0 )
            <table class="table table-light table-hover">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">STT</th>
                        <th >Tên Sản Phẩm</th>
                        <th width="20%">Hình ảnh</th>
                        <th >Đơn giá(VND - Sale)</th>
                        <th width="15%">Số lượng </th>
                        <th width="15%">Thành tiền(VND)</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @php
                      $stt=1;
                  @endphp
                   @foreach($cart->items  as $item)
                    <tr>
                        <td>{{$stt}}</td>
                        <td>{{$item['name']}}</td>
                        <td><img width="100%" height="" src="{{asset('uploads/product/'.$item['image'])}}" alt=""></td>
                        <td>{{ number_format($item['priceSale']) }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item['id']) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="number" style="width:50%;" value="{{ $item['quantity'] }}" name="quantity" min="1" max="1000">
                                <button type="submit">Sửa</button>
                            </form>
                
                        </td>
                        <td>{{ number_format($item['priceSale'] * $item['quantity']) }}</td>
                        <td>                      
                                <a href="{{route('remove',$item['id'])  }}" onclick="confirm('Are you sure ?')"><ion-icon name="trash-outline"></ion-icon></a>
                        </td>
                    </tr>
                    @php
                      $stt++ ;
                  @endphp
                    @endforeach
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Tổng sản phẩm</th>
                        <th>{{ $cart->total_quantity }}</th>
                    </tr>
                    <tr>
                        <th colspan="5">Thành tiền</th>
                        <th>{{ number_format($cart->total_price) }}</th>
                        <th>
                            <a href="{{route('pay')}}" class="btn btn-success"   >Thanh toán <ion-icon name="logo-paypal"></ion-icon></a> <br>
                            <a href="{{route('clear')}}" onclick="confirm('Bạn có chắc chắn muốn xóa giỏ hàng không ?')"  class="btn btn-danger"   >Xóa giỏ hàng <ion-icon name="close-circle-outline"></ion-icon></a>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        @else
        <div>Bạn chưa mua sản phẩm nào. Quay lại mua hàng ngay. <a href="{{route('home')}}">Tại đây</a></div>
    @endif
    </div>
@endsection
