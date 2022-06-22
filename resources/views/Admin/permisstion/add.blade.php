@extends('admin.layout.main')
@section('css')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('permisstion.index') }}">Permisstion</a></li>
    <li class="breadcrumb-item active">Add Permisstion</li>
@endsection
@section('jquery')
@endsection

@section('content')
    <div class="formAdd row justify-content-center ">
        <div class="col-8 ">
            @include('admin.layout.alert')
            <form action="{{route('permisstion.store')}}" method="post">
                @csrf @method('post')
                
                <div class="form-group">
                    <label for="name">Tên Permission</label>
                    <select name="name" id="name" class="form-control">
                        <option value="">----Chọn Module----</option>
                        {!! $html !!}
                    </select>

                </div>
                <div class="col-12 row">
                    @foreach ($module_childs as $module_child)
                        <div class="col-3">
                            <label for="">
                                <input checked value="{{ $module_child }}" id="" name="module_child[]"
                                    type="checkbox">&nbsp;{{ Ucwords($module_child) }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit">Thêm role</button>
            </form>
                <hr>
            <div class="form-group col-8">
                <b>Danh sách module đã tạo</b>
                <ul>
                    @foreach ($permisstions as $permistion)
                        <li>{{ Ucwords($permistion->name) }}</li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection
