@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Permisstion</li>
@endsection
@section('js')
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-12 ">
            <form action="{{ route('permisstion.index') }}" method="get">
                <div class="form-group">
                    <input name="search" id="search" value="{{  request()->search ? request()->search : '' }}" type="text"
                        placeholder=" Nhập tên permisstion cần tìm">
                    <button type="submit">Tìm</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 col-lg-4 col-12 ">
            <div class="float-right">
                <a href="{{ route('permisstion.create') }}" class="btn btn-outline-success ">
                    <ion-icon name="add-circle-outline"></ion-icon> Thêm
                </a>
     
            </div>
        </div>
        <div class="col-12">  @include('admin.layout.alert')</div>
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">SST</th>
                    <th width="35%">Tên permisstion</th>
                    <th width="">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permisstions as $key => $permisstion)
                    <tr>
                        <td>{{ $key + 1 + ((request()->page ? request()->page : 1) - 1) * $paginate }}</td>
                        <td>{{ $permisstion->name }}</td>
                        <td>
                                    <a class="btn btn-danger btnDelete"  href="{{ route('permisstion.destroy', $permisstion->id) }}" >
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
        {{ $permisstions->appends(request()->all())->links() }}
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
        if(confirm('Bạn có muốn xóa permisstion này không? ')){
            $('form#FormDelete').submit()
        }  
    })
</script>
@endsection