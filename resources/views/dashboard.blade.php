@extends('layouts.master')
@section('judulHalaman','Dashboard | ToDoList')
@section('content')
<!-- Bagian Atas -->
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="dashboard_graph">
            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Dashboard <small></small></h3>
                </div>
                <div class="col-md-6">
                    <div class="pull-right" style="background: #fff; padding: 10px 15px; border: 1px solid #ccc">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span>{{ date('F-l-Y') }}</span> <b class="caret"></b>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-9 ">
                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <h1>Welcome</h1>
                        <p>Aplikasi ini adalah aplikasi sederhana untuk melakukan ToDoList yang menggunakan Framework
                            Laravel version 8. Semua fitur di aplikasi ini hanyalah beta. Untuk versi full akan dirilis
                            dalam beberapa waktu ke depan.</p>
                        <!-- Pesan berhasil -->
                        @if(session('status'))
                        <hr>
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>Great!</strong> {{ session('status')}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3  bg-white">
                <div class="x_title">
                    <h2>Daftar Kategori</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-12 col-sm-12 ">
                    @foreach($kategori as $kt)
                    <article class="media event">
                        <a class="pull-left date">
                            <p class="day">{{$loop->iteration}}</p>
                        </a>
                        <div class="media-body">
                            <a class="title" href="#">{{$kt->nama_kategori}}</a>
                            <p>{{$kt->deskripsi_kategori}}</p>
                        </div>
                    </article>
                    <hr>
                    @endforeach
                </div>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>

</div>
<br />

<!-- Daftar Kegiatan Dan Keterangan -->
<div class="col-md-6 col-sm-6  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Daily active users</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <ul class="list-unstyled timeline">
                @foreach($data as $dt)
                <li>
                    <div class="block">
                        <div class="tags">
                            <a href="" class="tag">
                                <span>{{$dt->kategori->nama_kategori}}</span>
                            </a>
                        </div>
                        <div class="block_content">
                            <h2 class="title">
                                <a>{{$dt->judul}}</a>
                            </h2>
                            <div class="byline">
                                <span>{{$dt->waktu}} {{$dt->tanggal_list}}</span> by <a>{{ Auth::user()->name }}</a>
                            </div>
                            <p class="excerpt">{{$dt->deskripsi}}
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
<!-- To Do List -->
<div class="col-md-6 col-sm-6  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>To Do List</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="">
                <ul class="to_do">
                    @foreach($data as $dt)
                    <li>
                        <article class="media event">
                            <form action="{{'/checkList/'.$dt->id.'/'.$dt->judul}}" method="POST">
                                @csrf
                                @method('patch')
                                <button class="pull-left date">
                                    <p class="day"><i class="fa fa-check"></i></p>
                                </button>
                            </form>
                            <div class="media-body">
                                <a class="title" href="#">{{$dt->judul}}</a>
                                <p>{{$dt->deskripsi}}</p>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endSection
