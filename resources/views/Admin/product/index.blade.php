@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{route('product.index')}}">Products</a></li>
@endsection
@section('js')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-12">
            <form action="{{ route('product.index') }}" method="get">
                <div class="form-group">
                    <input name="search" id="search" value="{{ request()->search ? request()->search : '' }}"
                        type="text" placeholder=" Nhập danh mục cần tìm">
                    <button type="submit">Tìm</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 col-lg-4 col-12 ">
            <div class="float-right">
                <a href="{{ route('product.create') }}" class="btn btn-outline-success ">
                    <ion-icon name="add-circle-outline"></ion-icon> Thêm
                </a>
                @can('productListDelete')
                <a href="{{route('deleteList')}}" class="btn btn-outline-success ">
                    <ion-icon name="refresh-circle-outline"></ion-icon>Sản phẩm đã xóa
                </a>
                @endcan
               
            </div>
        </div>
        <div class="col-12"> @include('admin.layout.alert')</div>
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">SST</th>
                    <th>Tên Sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá (VNĐ)</th>
                    <th width="15%">Hình ảnh</th>
                    <th>Status</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 + ((request()->page ? request()->page : 1) - 1) * $paginate }}</td>
                        <td>{{ $product->productName }}</td>
                        <td>
                            @foreach ($product->category as $category)
                                <ul style="list-style-type: circle;">
                                    <li> <a
                                            href="{{route('product.index','slug='.$category->categorySlug)}}">{{ $category->categoryName }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </td>
                        <td>{{ number_format($product->price) }} </td>
                        <td><img src="{{ asset('uploads/product/' . $product->image) }}" width="100%" alt="img not founds"></td>
                        <td>
                            <a  href="{{route('product.index','status='.$product->status)}}"
                                class="badge badge-{{ $product->status == 1 ? 'success' : 'danger' }}">{{ $product->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            @can('productListDelete')
                            <a class="btn btn-danger btnDelete" href="{{ route('product.destroy', $product->id) }}">
                                <ion-icon name="trash-outline"></ion-icon>
                                </ion-icon>
                            </a>
                            @endcan
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="" method="POST" id="FormDelete">
        @csrf
        @method('Delete')
    </form>
    <div>
        {{ $products->appends(request()->all())->links() }}
    </div>
@endsection
@section('jquery')
    <script>
        $('.btnDelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#FormDelete').attr('action', _href);
            if (confirm('Bạn có muốn xóa sản phẩm này không?')) {
                $('form#FormDelete').submit()
            }
        })
    </script>
@endsection
