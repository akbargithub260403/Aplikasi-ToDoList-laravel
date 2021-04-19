@extends('errors::master')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
<p>Server Error</p>
<hr>
<p>Maaf Kami Mengalami kegagalan untuk menjalankan request yang anda kirimkan!</p>
@endsection
