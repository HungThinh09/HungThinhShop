@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Setting</li>
@endsection
@section('js')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-8 col-12">
            <form action="{{ route('setting.index') }}" method="get">
                <div class="form-group">
                    <input name="search" id="search" value="{{  request()->search ? request()->search : '' }}" type="text"
                        placeholder=" Nhập tên setting cần tìm">
                    <button type="submit">Tìm</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 col-lg-4 col-12 ">
            <div class="float-right">
                <a href="{{ route('setting.create') }}" class="btn btn-outline-success ">
                    <ion-icon name="add-circle-outline"></ion-icon> Thêm
                </a>
     
            </div>
        </div>
        <div class="col-12">  @include('admin.layout.alert')</div>
        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th width="5%">SST</th>
                    <th width="35%">Tên Setting</th>
                    <th>Status</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settings as $key => $setting)
                    <tr>
                        <td>{{ $key + 1 + ((request()->page ? request()->page : 1) - 1) * $paginate }}</td>
                        <td>{{ $setting->settingName }}</td>
                        <td><span
                                class="badge badge-{{ $setting->status == 1 ? 'success' : 'danger' }}">{{ $setting->status == 1 ? 'Hiển thị' : 'Ẩn' }}</span>
                        </td>
                        <td>
                                    <a class="btn btn-warning" href="{{ route('setting.edit', $setting->id) }}">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                    <a class="btn btn-danger btnDelete"  href="{{ route('setting.destroy', $setting->id) }}" >
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
        {{ $settings->appends(request()->all())->links() }}
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
        if(confirm('Bạn có muốn xóa setting này không? ')){
            $('form#FormDelete').submit()
        }  
    })
</script>
@endsection