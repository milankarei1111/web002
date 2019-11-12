@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>類別管理</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">分類對應產品表</h3>
                </div>
                {{-- /.box-header --}}
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="dataTables_length" id="example1_length">
                                        <label>顯示<select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>
                                        </label>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>搜尋:
                                        <input id="category_id" type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{--table start --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 130px;">分類序號</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 162px;">分類名稱</th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 162px;">產品名稱</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 162px;">單位</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 162px;">價格</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 162px;">規格</th>
                                        </tr>
                                    </thead>
                                    @forelse ($products as $product)
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$product->category_id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->unit}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->specification}}</td>
                                            </tr>
                                        </tbody>
                                    @empty
                                    <tbody>
                                            <tr role="row" class="odd">
                                              <td colspan="999" class="text-center">查無資料!</td>                                            </tr>
                                        </tbody>
                                    @endforelse

                                    <tfoot>
                                        <tr>
                                            <th>分類序號</th>
                                            <th>分類名稱</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{--table end --}}
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">顯示 X to X of X entries</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" id="example1_previous">
                                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                                        </li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                                        </li><li class="paginate_button next disabled" id="example1_next">
                                            <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /.box-body --}}

                <div class="box-footer">

                </div>
                {{-- /.box-footer --}}
            </div>
        </div>
    </div>
@endsection
