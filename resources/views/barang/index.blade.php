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
                    <a href="#">Barang</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Kelola Barang
            <small></small>
        </h1>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Barang</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modTambah"><i
                            class="fa fa-plus"></i> Tambah</button>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barang as $key => $item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$item->nama_barang}}</td>
                                    <td>{{number_format($item->harga)}}</td>
                                    <td>{{$item->stok}}</td>
                                    <td>
                                        <a href="{{route('barang.edit', $item->id)}}"><button class="btn btn-warning"
                                                style="float:left;"><i class="fa fa-pencil"></i> Edit</button></a>
                                        <form action="{{route('barang.destroy', $item->id)}}" method="POST">
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
                                    <h4 class="modal-title">Tambah Barang</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{route('barang.store')}}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="nama_barang" class="col-md-4 col-form-label text-md-right">Nama
                                                Barang</label>

                                            <div class="col-md-8">
                                                <input id="nama_barang" name="nama_barang" type="text"
                                                    class="form-control" required autofocus>

                                                @if ($errors->has('nama_barang'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nama_barang') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="harga"
                                                class="col-md-4 col-form-label text-md-right">Harga</label>

                                            <div class="col-md-8">
                                                <input id="harga" type="number" class="form-control" name="harga"
                                                    step="0.01" required>

                                                @if ($errors->has('harga'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('harga') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="stok" class="col-md-4 col-form-label text-md-right">Stok</label>

                                            <div class="col-md-8">
                                                <input id="stok" type="number" class="form-control" name="stok"
                                                    required>

                                                @if ($errors->has('stok'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('stok') }}</strong>
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
