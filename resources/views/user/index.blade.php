@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>使用者管理</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @if(Session::has('message'))
                <div class="alert alert-info"> {{Session::get('message')}}</div>
            @endif
            <div class="box">
                <div class="box-header">
                <h3 class="box-title">帳號列表</h3>
                <div class="no-margin pull-right">
                    <a href="{{ route('home.users.create') }}" class="btn btn-primary btn-xs">
                    <i class="fa fa-plus fa-fw"></i> 新增
                    </a>
                </div>
            </div>{{-- /.box-header --}}
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th class="text-center" style="width: 4em;">#</th>
                        <th class="text-left">姓名</th>
                        <th class="text-left">Email</th>
                        <th class="text-center" style="width: 4em;">查看</th>
                        <th class="text-center" style="width: 4em;">編輯</th>
                        <th class="text-center" style="width: 4em;">刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-xs" href="{{ route('home.users.show', $user->id) }}">
                                        <i class="fa fa-eye fa-fw"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-default btn-xs" href="{{ route('home.users.edit', $user->id) }}">
                                        <i class="fa fa-edit fa-fw"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('home.users.destroy', $user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a class="btn btn-danger btn-xs" href="" type="submit">
                                            <i class="fa fa-times fa-fw"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="999" class="text-center">查無資料!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>{{-- /.box-body --}}
            <div class="box-footer clearfix">
                    {{ $users->links() }}
            </div>{{-- /.box-footer --}}
        </div>
    </div>
@endsection

