@extends('layouts.master')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Transaksi</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Kelola Tranksaksi
            <small></small>
        </h1>
        
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Transaksi</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modTambah"><i
                            class="fa fa-plus"></i> Tambah</button>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $key => $item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{number_format($item->total)}}</td>
                                    <td>
                                        <a href="{{route('transaksi.edit', $item->id)}}"><button class="btn btn-warning"
                                                style="float:left;"><i class="fa fa-pencil"></i> Edit</button></a>
                                        <form action="{{route('transaksi.destroy', $item->id)}}" method="POST">
                                            @csrf {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="modTambah" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Transaksi</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('transaksi.store')}}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="barang" class="col-md-4 col-form-label text-md-right">Barang</label>
                                            <div class="col-md-8">
                                                <select name="barang" class="form-control">
                                                    @foreach ($barang as $item)
                                                    <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                                    @endforeach
                                                </select>
                    
                                                @if ($errors->has('barang'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('barang') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="jumlah"
                                                class="col-md-4 col-form-label text-md-right">Jumlah</label>

                                            <div class="col-md-8">
                                                <input id="jumlah" type="number" class="form-control" name="jumlah"required>

                                                @if ($errors->has('jumlah'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('jumlah') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary col-md-4"
                                                    style="float:right;">
                                                    Tambah Barang
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection
