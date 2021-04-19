@extends('layouts.master')
@section('judulHalaman','Create List | ToDoList')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Create List<small></small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if(session('status'))
            <hr>
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
                <strong>Great!</strong> {{ session('status')}}
            </div>
            @endif
            <div class="form-group">
                <form id="demo-form2" action="{{'/create/list/progress/'.Auth::user()->id}}" method="POST"
                    data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Judul List <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="judul"
                                class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                            <div class="invalid-feedback"><strong>Fail!</strong>&nbsp;{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Waktu<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 ">
                            <select name="waktu" id="" class="form-control">
                                <option value="00.00">00.00</option>
                                <option value="01.00">01.00</option>
                                <option value="02.00">02.00</option>
                                <option value="03.00">03.00</option>
                                <option value="04.00">04.00</option>
                                <option value="05.00">05.00</option>
                                <option value="06.00">06.00</option>
                                <option value="07.00">07.00</option>
                                <option value="08.00">08.00</option>
                                <option value="09.00">09.00</option>
                                <option value="10.00">10.00</option>
                                <option value="11.00">11.00</option>
                                <option value="12.00">12.00</option>
                                <option value="13.00">13.00</option>
                                <option value="14.00">14.00</option>
                                <option value="15.00">15.00</option>
                                <option value="16.00">16.00</option>
                                <option value="17.00">17.00</option>
                                <option value="18.00">18.00</option>
                                <option value="19.00">19.00</option>
                                <option value="20.00">20.00</option>
                                <option value="21.00">21.00</option>
                                <option value="22.00">22.00</option>
                                <option value="23.00">23.00</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kategori<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 ">
                            <select name="kategori_id" id="" class="form-control">
                                @foreach($kategori as $kt)
                                <option value="{{$kt->id}}">{{$kt->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Bulan Tahun
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 ">
                            <input type="number" autocomplete="off" placeholder="tanggal" id="first-name" name="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror">
                            @error('judul')
                            <div class="invalid-feedback"><strong>Fail!</strong>&nbsp;{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                            <select name="bulan" id="" class="form-control">
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                            <input type="number" name="tahun" placeholder="tahun" autocomplete="off"
                                class="form-control @error('tahun') is-invalid @enderror">
                            @error('judul')
                            <div class="invalid-feedback"><strong>Fail!</strong>&nbsp;{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 label-align">Deskripsi List</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea name="deskripsi" class="resizable_textarea form-control"
                                placeholder="Deskripsi List..." rows="4"></textarea>
                        </div>
                    </div>
            </div>

            <div class="ln_solid"></div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
