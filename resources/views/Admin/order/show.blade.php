@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{route('managerOrder.index')}}">List Order</a></li>
    <li class="breadcrumb-item active">Order</li>
@endsection
@section('js')
@endsection
@section('content')
<hr>
<div class="col-12"> @include('admin.layout.alert')</div>
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <a href="#" class="btn btn-outline-light">Thông tin khách hàng</a>
        </div>
        <div class="col-md-9 col-lg-9 col-12"> 
            <form action="{{route('managerOrder.update', $order->id)}}" method="POST">
                @csrf @method('put')
                <select class="btn btn-lg btn-outline-dark" name="status" id="">
                    <option value="0" selected class="btn btn-default"><span >Đang xử lý</span></option>
                    <option value="1" {{$order->status == 1?"selected":"" }} class="btn btn-secondary"><span >Đang lấy hàng</span></option>
                    <option value="2" {{$order->status == 2?"selected":"" }} class="btn btn-info">Đang giao hàng</option>
                    <option value="3" {{$order->status == 3?"selected":"" }} class="btn btn-success">Giao thành công</option>
                    <option value="-1" {{$order->status == -1?"selected":"" }} class="btn btn-danger">Hủy đơn</option>
                </select>
                <button type="submit">Thay đổi</button>
            </form>
        </div>
      
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">SST</th>
                    <th width="35%">Mã Đơn hàng </th>
                    <th>Tình trạng</th>
                    <th>Ngày mua</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td></td>
                        <td>{{ $order->codeId }}</td>
                        <td><a href="{{ route('managerOrder.index', 'status=' . $order->status) }}">
                                <x-cart-status :style="1" :status="$order->status" />
                            </a></td>
                        <td>{{ $order->created_at }}</td>
                      
                    </tr>
            </tbody>
        </table>
       
    </div>
    <div class="row justify-content-center">    
        <div class="col-8">
         <div class="form-group">
             <label for="">Tên khách hàng</label>
             <input type="text" class="form-control" readonly value="{{$order->name}}">
         </div>
         <div class="form-group">
             <label for="">Số điện thoại</label>
             <input type="text" class="form-control" readonly value="{{$order->phone}}">
         </div>
         <div class="form-group">
             <label for="">Email</label>
             <input type="text" class="form-control" readonly value="{{$order->email}}">
         </div>
         <div class="form-group">
             <label for="">Địa chỉ</label>
             <input type="text" class="form-control" readonly value="{{$order->address}}">
         </div>
         <div class="form-group">
             <label for="">Ghi chú</label>
             <textarea name="" id="" cols="30" class="form-control" readonly rows="10">{{$order->note}}</textarea>
         </div>
        </div>
     </div>
@endsection

