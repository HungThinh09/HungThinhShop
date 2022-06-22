@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('adtp123\js\admin\select2\select2.min.css') }}">
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
    <li class="breadcrumb-item active">Add User</li>
@endsection
@section('jquery')
    <script src="{{ asset('adtp123\js\admin\select2\select2.min.js') }}"></script>
    <script src="{{ asset('adtp123\js\admin\select2\product_js.js') }}"></script>
@endsection
@section('content')
    <div class="formAdd row justify-content-center ">
        <div class="col-8 ">
            @include('admin.layout.alert')
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                        placeholder="Nhập tên thành viên">
                </div>
                <div class="form-group">
                    <label for="user">User Name</label>
                    <input type="text" name="user" id="user" value="{{ old('user') }}" class="form-control"
                        placeholder="Nhập tên user">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"
                        placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="role">Vai trò</label>
                    <select class="form-control select2-role" name="role[]" id="role" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->roleName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập password">
                </div>
                <div class="form-group">
                    <label for="re_password">Re-Password</label>
                    <input type="password" name="re_password" id="re_password" class="form-control"
                        placeholder="Nhập lại password">
                </div>
                <button type="submit">Thêm user</button>
            </form>
        </div>
    </div>
@endsection
