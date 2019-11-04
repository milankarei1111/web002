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
              <h3 class="box-title">編輯 {{ $user['name'] }} 帳號</h3>
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
                <form action="{{ route('home.users.update', $user['id']) }}" method="POST">
                    <div class="form-group has-feedback">
                        姓名：<input type="text" name="name" value="{{ $user['name'] }}"/>
                    </div>
                    <div class="form-group has-feedback">
                        信箱：<input type="email" name="email" value="{{ $user['email'] }}">
                    </div>
                    @csrf
                    @method('PATCH')
                    <div class="box-footer text-left">
                      <a href="{{ route('home.users.index') }}" class="btn btn-text">返回</a>
                      <button class="btn btn-success" type="submit">
                            <i class="fa fa-save">送出</i>
                      </button>
                    </div>
                </form>
              </div>{{-- /.box --}}
        </div>
    </div>
@endsection
