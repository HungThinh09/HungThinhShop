@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Role</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-12">
            <form action="{{ route('role.index') }}" method="get">
                <div class="form-group">
                    <input name="search" id="search" value="{{  request()->search ? request()->search : '' }}" type="text"
                        placeholder=" Nhập tên role cần tìm">
                    <button type="submit">Tìm</button>
                </div>
            </form>
        </div>
        
        <div class="col-md-4 col-lg-4 col-12 ">
            <div class="float-right">
                <a href="{{ route('role.create') }}" class="btn btn-outline-success ">
                    <ion-icon name="add-circle-outline"></ion-icon> Thêm Role
                </a>
     
            </div>
        </div>
        <div class="col-12">  
            <div>@include('admin.layout.alert')</div></div>
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">SST</th>
                    <th width="25%">Role name</th>
                    <th >Description</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $key + 1 + ((request()->page ? request()->page : 1) - 1) * $paginate }}</td>
                        <td>{{ $role->roleName }}</td>
                        <td>{!!$role->description!!}</td>
                        <td>
                                    <a class="btn btn-warning" href="{{ route('role.edit', $role->id) }}">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                    <a class="btn btn-danger btnDelete"  href="{{ route('role.destroy', $role->id) }}" >
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
        {{ $roles->appends(request()->all())->links() }}
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
        if(confirm('Bạn có muốn xóa role này không? ')){
            $('form#FormDelete').submit()
        }  
    })
</script>
@endsection