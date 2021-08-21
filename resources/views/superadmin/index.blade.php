@extends('layouts.master')

@section('css')
<style>

</style>

@endsection

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
                    <a href="#">Dashboard</a>
                </li>
            </ul>
        </div>
        <h1 class="page-title"> Dashboard 
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class=""></i>
                        </div>
                        <div class="details">
                            <div class="number"> {{number_format(count($barang))}} </div>
                            <div class="desc"> Total Produk  </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class=""></i>
                        </div>
                        <div class="details">
                            <div class="number"> {{number_format(count($trans))}} </div>
                            <div class="desc"> Total Transaksi </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class=""></i>
                        </div>
                        <div class="details">
                            <div class="number"> {{ number_format($total) }} </div>
                            <div class="desc"> Total Nilai Transaksi </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@endsection
