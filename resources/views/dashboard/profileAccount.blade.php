@extends('layouts.master')
@section('judulHalaman','Profile Account')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>User Profile</h3>
        </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="{{asset('/images/'.Auth::user()->avatar)}}"
                                    alt="Avatar" title="Change the avatar" height="150px;" width="150px;">
                            </div>
                        </div>
                        <h3>{{Auth::user()->name}}</h3>

                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-mail-forward"></i> {{Auth::user()->email}}
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-calendar"></i> Tanggal Akun Verifikasi
                            </li>

                            <li>
                                <i class="fa fa-calendar"></i> {{Auth::user()->created_at->format('m-d-Y')}}
                            </li>

                            <!-- tombol modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bs-example-modal-lg">Update Avatar</button>

                                <!-- modals -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Update</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{'/update/avatar/'.Auth::user()->name}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <input type="file" name="avatar" class="form-control" id="">
                                                <hr>
                                                <button type="submit" class="btn btn-info">Update</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </ul>

                    </div>
                    <div class="col-md-9 col-sm-9 ">

                        <div class="profile_title">
                            <div class="col-md-6">
                                <h2>User Activity Report</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right"
                                    style="background: #fff; padding: 10px 15px; border: 1px solid #ccc">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span>{{ date('F-l-Y') }}</span> <b class="caret"></b>
                                </div>
                            </div>
                        </div>

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                        data-toggle="tab" aria-expanded="true">List Activity</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                        data-toggle="tab" aria-expanded="false">List Work Done</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane active " id="tab_content1"
                                    aria-labelledby="home-tab">

                                    <!-- start recent activity -->
                                    <ul class="messages">

                                        @foreach($list as $lt)
                                        <li>
                                            <img src="{{asset('/images/'.Auth::user()->avatar)}}" class="avatar"
                                                alt="Avatar">
                                            <div class="message_date">
                                                <p class="month">{{$lt->tanggal_list}}</p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading"> {{$lt->judul}} </h4>
                                                <blockquote class="message">{{$lt->deskripsi}}</blockquote>
                                                <br />
                                            </div>
                                            <a href="{{'/cetak/list/activity/'.Auth::user()->id}}" target="_blank"
                                                class="btn btn-info" style="color:white;"><i
                                                    class="fa fa-print m-right-xs"></i> Cetak List Activity</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                    <!-- end recent activity -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                    aria-labelledby="profile-tab">

                                    <!-- start user projects -->
                                    <table class="data table table-striped no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama List</th>
                                                <th>Tanggal List</th>
                                                <th class="hidden-phone">Deskripsi List</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listDone as $lt)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$lt->judul}}</td>
                                                <td>{{$lt->tanggal_list}}</td>
                                                <td>{{$lt->deskripsi}}</td>
                                                <td><button class="btn btn-success btn-sm">Done</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{'/cetak/list/done/'.Auth::user()->id}}" class="btn btn-info"
                                        style="color:white;"><i class="fa fa-print m-right-xs"></i> Cetak List Work
                                        Done</a>
                                    <!-- end user projects -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
