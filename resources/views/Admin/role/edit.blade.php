@extends('admin.layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('adtp123\plugins\summernote\summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{asset('adtp123\js\role\role.css')}}">
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('role.index')}}">role</a></li>
<li class="breadcrumb-item active">Edit role</li>
@endsection
@section('jquery')
<script src="{{asset('adtp123\plugins\summernote\summernote-bs4.min.js')}}"></script>
<script src="{{asset('adtp123\js\admin\summernot.js')}}">  </script>
<script src="{{asset('adtp123\js\role\role.js')}}"></script>
@endsection

@section('content')
    <div class="formAdd row justify-content-center " >
       <div class="col-10">
        @include('admin.layout.alert')
        <form action="{{route('role.update',$role->id)}}" method="post">
            @csrf @method('put')
            <div class="form-group">
                <label for="roleName">role Name</label>
                <input type="hidden" name="id" value="{{$role->id}}">
                <input type="text" name="roleName" id="roleName" value="{{$role->roleName}}" class="form-control"  placeholder="Nhập tên thành viên">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
              <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="nhập mô tả role">{!!$role->description!!}</textarea>
            </div>
            <div class="col-12 row">
                <div class="col-12">
                    <label for="">
                        <input id="checkall" type="checkbox" class="checkall" id="" value="">
                        <label for="checkall">&nbsp Check All</label>
                    </label>
                </div>
                @foreach ($permisstions as $permisstion)
                    <div class="card text-white bg-info   col-12">
                        <div class="card-header">
                            <input type="checkbox" class="parentPer" id="" value="">
                            <label for="">
                                <span>Chức năng : &ensp;{{ ucfirst($permisstion->name) }}</span>
                            </label>
                        </div>
                        <div class="card-body row">
                            @foreach ($permisstion->childPer as $childPer)
                                <div class="col-3">
                                    <h5 class="card-title">
                                        <input type="checkbox" 

                                              {{$role->permisstion->contains('id',$childPer->id)?'checked':''}}
                                            
                                        class="chilPer" name="childPer[]" id=""
                                            value="{{ $childPer->id }}">
                                        <label for="">
                                            {{ $childPer->name }}
                                        </label>
    
                                    </h5>
                                </div>
                            @endforeach
    
    
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit">Edit role</button>
        </form>
       </div>
    </div>
@endsection