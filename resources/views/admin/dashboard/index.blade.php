@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <!--div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4>
                            <span class="font-weight-semibold"> {{ __('Home') }} </span> - {{ __('Dashboard') }}
                        </h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div-->

            <img src="{{ get_file_url('admin/assets/dashboard.gif') }}">
        </div>
    </div>
@endsection

