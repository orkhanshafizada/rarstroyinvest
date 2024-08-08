@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Permission') }} </span> - @if (@$permission->id)
                                {{ __('Update') }} @else {{ __('Create') }} @endif
                        </h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form
                                        action="{{ @$permission->id ? route('admin.permission.update',$permission->id ) : route('admin.permission.store') }}"
                                        method="post">
                                        @csrf
                                        @if(@$permission->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="form-group row">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <input type="text" class="form-control" placeholder="{{ __('Permission name') }}"
                                                                   name="name" value="{{ @$permission->name }}">
                                                            @error('name')
                                                            <div class="alert-danger"> {{ $errors->first('name') }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <input type="text" class="form-control" placeholder="{{ __('Group') }}"
                                                                   name="group" value="{{ @$permission->group }}">
                                                            @error('group')
                                                            <div class="alert-danger"> {{ $errors->first('group') }} </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <hr>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <button type="submit"
                                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                                    class="btn btn-success btn-loading"><i class="icon-spinner4 mr-2"></i>
                                                                @if (@$permission->id) {{ __('Update') }} @else {{ __('Create') }} @endif
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
