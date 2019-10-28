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
                <form action="{{ route('home.users.update', $user['id']) }}" method="POST">
                    <p><span>姓名：<input type="text" name="name" value="{{ $user['name'] }}"/></span></p>
                    <p><span>信箱：<input type="text" name="email" value="{{ $user['email'] }}"/></span></p>
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="box-footer text-left">
                      <button class="btn btn-success" type="submit">
                            <i class="fa fa-save">送出</i>
                      </button>
                    </div>
                </form>
              </div>{{-- /.box --}}
        </div>
    </div>
@endsection
