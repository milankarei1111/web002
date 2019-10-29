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
                    <h3 class="box-title">帳號資料</h3>
                </div>{{-- /.box-header --}}
                <div class="box-body table-responsive no-padding">
                    @if (isset($user))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th class="text-left">姓名</th>
                                <th class="text-left">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <tr>
                            <td colspan="999" class="text-center">查無資料!</td>
                        </tr>
                    @endif
                </div>{{-- /.box-body --}}
        </div>
    </div>
@endsection
