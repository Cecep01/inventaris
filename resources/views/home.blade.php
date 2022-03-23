@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
      <div class="col-lg-4">
    <div class="card">
        <div class="card-head text-center" style="font-family: bold , font-size: 200">
            Selamat Datang Di Halaman Admin
        </div>
    </div>
    </div>
@stop
@section('content')

<div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box-open"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Barang Masuk</span>
                            <span class="info-box-number">
                                <h3><b>{{ DB::table('barangs')->count() }}</b></h3>
                            </span>
                            <span class="info-box-content">
                                <a href="{{ route('tampungan') }}" class="text-right">Lihat Detail</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Barang Keluar</span>
                            <span class="info-box-number">
                                <h3><b>{{ DB::table('baranng_keluars')->count() }}</b></h3>
                            </span>
                            <span class="info-box-content">
                                <a href="{{ route('barangkeluar-card') }}" class="text-right">Lihat Detail</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hand-holding"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Peminjam</span>
                            <span class="info-box-number">
                                <h3><b>{{ DB::table('peminjams')->count() }}</b></h3>
                            </span>
                            <span class="info-box-content">
                                <a href="{{ route('peminjam-card') }}" class="text-right">Lihat Detail</a>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>


            <!-- /.row -->

            <!-- ./col -->

            <!-- ./col -->

            <!-- /.row -->
            <!-- Main row -->

        @stop

        @section('css')
        @stop
        @section('js')
        @stop
