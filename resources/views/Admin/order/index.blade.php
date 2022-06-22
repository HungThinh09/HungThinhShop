@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">order</li>
@endsection
@section('js')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-12">
            <form action="{{ route('managerOrder.index') }}" method="get">
                <div class="form-group">
                    <input name="search" id="search" value="{{  request()->search ? request()->search : '' }}" type="text"
                        placeholder=" Nhập tên order cần tìm">
                    <button type="submit">Tìm</button>
                </div>
            </form>
        </div>
        <div class="col-12">  @include('admin.layout.alert')</div>
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">SST</th>
                    <th width="35%">Mã Đơn hàng </th>
                    <th >Tình trạng</th>
                    <th >Ngày mua</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        <td>{{ $key + 1 + ((request()->page ? request()->page : 1) - 1) * $paginate }}</td>
                        <td>{{$order->codeId }}</td>
                        <td><a href="{{route('managerOrder.index','status='.$order->status)}}"><x-cart-status :style="1" :status="$order->status" /></a></td>
                        <td>{{$order->created_at}}</td>
                        <td>
                                    <a class="btn btn-warning" href="{{ route('managerOrder.show', $order->id) }}">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                    <a class="btn btn-danger btnDelete"  href="{{ route('managerOrder.destroy', $order->id) }}" >
                                        <ion-icon name="trash-outline"></ion-icon>
                                        </ion-icon>
                                    </a>
                        </td>
                    </tr>
            </tbody>
            @endforeach
            <tfoot>
                <tr>
                </tr>
            </tfoot>
        </table>
    </div>
    <div>
        {{ $orders->appends(request()->all())->links() }}
    </div>
    
    <form action="" method="POST" id="FormDelete">
        @csrf
        @method('Delete')
    </form>
@endsection
@section('jquery')
<script>
     $('.btnDelete').click(function(ev){
        ev.preventDefault();
        var _href = $(this).attr('href');
        $('form#FormDelete').attr('action',_href);
        if(confirm('Bạn có muốn xóa order này không? ')){
            $('form#FormDelete').submit()
        }  
    })
</script>
@endsection