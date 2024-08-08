@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('About Us') }}</span> - @if (@$about->id)
                                {{ __('Update') }} @else {{ __('Create') }} @endif
                        </h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            @if (session()->has('message'))
                                <div
                                    class="alert alert-{!! session('message-alert') ?? ' ' !!}">{!! session('message') ?? ' ' !!} </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{!! $error ?? ' ' !!}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form
                                        action="{{ @$about->id ? route('admin.about.update',$about ) : route('admin.about.store') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$about->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <ul class="nav nav-tabs nav-tabs-top nav-justified">

                                                    <li class="nav-item">
                                                        <a href="#top-justified-tab2" class="nav-link active" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-us"></span> {{ __('English') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#top-justified-tab3" class="nav-link" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-ru"></span> {{ __('Russian') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#top-justified-tab1" class="nav-link" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-cn"></span> {{ __('Chinese') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="top-justified-tab2">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="title">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="en_title"
                                                                           value="{{ @$about ? @$about->translate('en')->title : old('en_title') }}">
                                                                    @error('en_title')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_title') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="description">{{ __('Short Description') }}</label>
                                                                    <textarea class="textarea" id="en_desc_editor" name="en_short_description" rows="4" cols="4">{{ @$about ? @$about->translate('en')->short_description : old('en_short_description') }}</textarea>
                                                                    @error('en_short_description')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_short_description') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 longContent" style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label for="title">{{ __('Long Description') }}</label>
                                                                    <textarea class="textarea" name="en_long_description" id="en_editor"
                                                                              rows="4"
                                                                              cols="4">{{ @$about ? @$about->translate('en')->long_description : old('en_long_description') }}</textarea>
                                                                </div>
                                                                @error('en_long_description')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('en_long_description') }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="top-justified-tab3">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="title">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="ru_title"
                                                                           value="{{ @$about ? @$about->translate('ru')->title : old('ru_title') }}">
                                                                    @error('ru_title')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_title') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="description">{{ __('Short Description') }}</label>
                                                                    <textarea class="textarea" id="ru_desc_editor" name="ru_short_description" rows="4" cols="4">{{ @$about ? @$about->translate('ru')->short_description : old('ru_short_description') }}</textarea>
                                                                    @error('ru_short_description')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_short_description') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 longContent" style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label for="title">{{ __('Long Description') }}</label>
                                                                    <textarea class="textarea" name="ru_long_description" id="ru_editor"
                                                                              rows="4"
                                                                              cols="4">{{ @$about ? @$about->translate('ru')->long_description : old('ru_long_description') }}</textarea>
                                                                </div>
                                                                @error('ru_long_description')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('ru_long_description') }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="top-justified-tab1">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="title">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="zh_title"
                                                                           value="{{ @$about ? @$about->translate('zh')->title : old('zh_title') }}">
                                                                    @error('zh_title')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_title') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="description">{{ __('Short Description') }}</label>
                                                                    <textarea id="zh_desc_editor" class="textarea" name="zh_short_description" rows="4" cols="4">{{ @$about ? @$about->translate('zh')->short_description : old('zh_short_description') }}</textarea>
                                                                    @error('zh_short_description')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_short_description') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 longContent" style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label for="title">{{ __('Long Description') }}</label>
                                                                    <textarea class="textarea" name="zh_long_description" id="zh_editor"
                                                                              rows="4"
                                                                              cols="4">{{ @$about ? @$about->translate('zh')->long_description : old('zh_long_description') }}</textarea>
                                                                </div>
                                                                @error('zh_long_description')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('zh_long_description') }}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center plus">
                                            <button type="submit"
                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                    class="btn btn-success btn-loading"><i class="icon-spinner4 mr-2"></i>
                                                @if (@$about->id)
                                                    {{ __('Update') }} @else {{ __('Create') }}
                                                @endif
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @include('admin.gallery.only-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    @include('admin.gallery.only-js')
@endsection
