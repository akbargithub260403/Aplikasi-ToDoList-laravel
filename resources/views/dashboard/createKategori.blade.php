@extends('layouts.master')
@section('judulHalaman','Create Category | ToDoList')
@section('content')


<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Create Category<small></small></h2>
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
                <form id="demo-form2" action="{{'/create/kategori/progress/'.Auth::user()->id}}" method="POST"
                    data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Judul Category <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="last-name" name="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror">
                            @error('nama_kategori')
                            <div class="invalid-feedback"><strong>Fail!</strong>&nbsp;{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 label-align">Deskripsi Category</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea name="deskripsi_kategori" class="resizable_textarea form-control"
                                placeholder="Deskripsi Category..." rows="4"></textarea>
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
