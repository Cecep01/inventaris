@extends('adminlte::page')
@section('title' , 'Dashboard')
@section ('content_header')
Dashboard
@stop
@section ('content')

<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <p style="text-align: center;">Barang</p>
               <h3 style="text-align: center;">{{DB::table('barangs')->count()}}</h3>


              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('tampungan')}}" class="small-box-footer" style="color: black">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p style="text-align: center;">Stok</p>
                <h3 style="text-align: center;">{{DB::table('barangs')->count()}}</h3>
              </div>
              <div class="icon">
                <i class="bag-flus-fill"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="text-align: center;">{{DB::table('baranng_keluars')->count()}}</h3>

                <p style="text-align: center;">Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->

          <!-- ./col -->

        <!-- /.row -->
        <!-- Main row -->

@stop

@section('css')
@stop
@section('js')
@stop
