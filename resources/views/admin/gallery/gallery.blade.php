@extends('admin.layouts.app')
@section('content')
   @include('admin.gallery.only-content')
@endsection
@section('javascripts')
   @include('admin.gallery.only-js')
@endsection
