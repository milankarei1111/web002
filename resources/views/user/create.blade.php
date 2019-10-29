@extends('adminlte::page');

@section('title', 'AdminLTE')

@section('content_header')
    <h1>使用者管理</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">新增帳號</h3>
            </div>{{-- /.box-header --}}
                
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box-body table-responsive no-padding">
                <form action="{{ route('home.users.store') }}" method="POST">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control"
                                placeholder="{{ __('adminlte::adminlte.full_name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control"
                                placeholder="{{ __('adminlte::adminlte.email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control"
                                placeholder="{{ __('adminlte::adminlte.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password_confirmation" class="form-control"
                                placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="box-footer text-right">
                        <a href="{{ route('home.users.index') }}" class="btn btn-text">取消</a>
                        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> 儲存</button>
                    </div>{{-- /.box-footer --}}
                </form>
            </div>{{-- /.box-body --}}
        </div>
    </div>
@endsection
