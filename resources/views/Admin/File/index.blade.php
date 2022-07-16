@extends('admin.layout.main')
@section('css')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
<li class="breadcrumb-item active">Manager File</li>
@endsection
@section('js')
@endsection
@section('content')
        <iframe src="{{asset('File\dialog.php')}}" frameborder="0" width="100%" height="500px" overflow-y="auto"></iframe>
@endsection