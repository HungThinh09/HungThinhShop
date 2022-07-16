@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Category</li>
@endsection
@section('js')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-12">
            <form action="{{ route('category.index') }}" method="get">
                <div class="form-group">
                    <input name="search" id="search" value="{{  request()->search ? request()->search : '' }}" type="text"
                        placeholder=" Nhập danh mục cần tìm">
                    <button type="submit">Tìm</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 col-lg-4 col-12 ">
            <div class="float-right">
                <a href="{{ route('category.create') }}" class="btn btn-outline-success ">
                    <ion-icon name="add-circle-outline"></ion-icon> Thêm
                </a>
                {{-- <a href="" class="btn btn-outline-success ">
                    <ion-icon name="refresh-circle-outline"></ion-icon> Danh mục đã xóa
                </a> --}}
            </div>
        </div>
        <div class="col-12">   @include('admin.layout.alert')</div>
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">SST</th>
                    <th>Tên Danh mục</th>
                    <th>Status</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key + 1 + ((request()->page ? request()->page : 1) - 1) * $paginate }}</td>
                        <td>{{ $category->categoryName }}</td>
                        <td><span
                                class="badge badge-{{ $category->status == 1 ? 'success' : 'danger' }}">{{ $category->status == 1 ? 'Hiển thị' : 'Ẩn' }}</span>
                        </td>
                        <td>
                                    <a class="btn btn-warning" href="{{ route('category.edit', $category->id) }}">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                    <a class="btn btn-danger btnDelete"  href="{{ route('category.destroy', $category->id) }}" >
                                        <ion-icon name="trash-outline"></ion-icon>
                                        </ion-icon>
                                    </a>
                        </td>
                    </tr>
                    @endforeach --}}
                   
                    <tr>
                        <td>1</td>
                        <td>Danh sach API</td>
                        <td>Danh sach API</td>
                    </tr>
            </tbody>
          
            <tfoot>
                <tr>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="list-group" id="list-product">
        123
    </div>
    {{-- <div>
        {{ $categories->appends(request()->all())->links() }}
    </div> --}}
    
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
        if(confirm('Bạn có muốn xóa không')){
            $('form#FormDelete').submit()
        }  
    })

    $.get('https://hungshop.dev/api/product', function(res){
        
        let products = res;
        let _li='';
        console.log(products)
        products.forEach(function(item){
            _li += '<a href="" class="list-group-item">'+item.productName+'</a>';
        });
        $('#list-product').html(_li);
    });
</script>

@endsection