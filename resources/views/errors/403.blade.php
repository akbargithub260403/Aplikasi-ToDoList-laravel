@extends('errors::master')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message')
<p>Forbidden</p>
<hr>
<p>Akses anda untuk masuk ke halaman ini di tolak!</p>
@endsection
