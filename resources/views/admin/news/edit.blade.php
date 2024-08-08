@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('News') }} </span> - @if (@$news->id)
                                {{ __('Update') }} @else {{ __('Create') }} @endif
                        </h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            @if (session()->has('message'))
                                <div class="alert alert-{{ session('message-alert') }}">
                                    {{ session('message') }}
                                </div>
                            @endif
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="margin-form"
                                          action="{{ @$news->id ? route('admin.news.update', $news) : route('admin.news.store') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$news->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-secondary nav-justified">
                                                    <li class="nav-item">
                                                        <a href="#en" class="nav-link active" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-us"></span> {{ __('English') }}
                                                        </a></li>
                                                    <li class="nav-item">
                                                        <a href="#ru" class="nav-link" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-ru"></span> {{ __('Russian') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#zh" class="nav-link" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-cn"></span> {{ __('Chinese') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content">

                                            <div class="tab-pane fade show active" id="en">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="en_title"
                                                                           value="{{ @$news ? @$news->translate('en')->title : old('en_title') }}">
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
                                                                    <label
                                                                        for="country">{{ __('Short Content') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Short Content') }}"
                                                                           name="en_short_content"
                                                                           value="{{ @$news ? @$news->translate('en')->short_content : old('en_short_content') }}">
                                                                    @error('en_short_content')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_short_content') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label
                                                                        for="country">{{ __('Long Content') }}</label>
                                                                    <textarea class="textarea" name="en_long_content"
                                                                              id="editorNewsEN"
                                                                              rows="4"
                                                                              cols="4">{{ @$news ? @$news->translate('en')->long_content : old('en_long_content') }}</textarea>
                                                                    @error('en_long_content')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_long_content') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="ru">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="ru_title"
                                                                           value="{{ @$news ? @$news->translate('ru')->title : old('ru_title') }}">
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
                                                                    <label
                                                                        for="country">{{ __('Short Content') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Short Content') }}"
                                                                           name="ru_short_content"
                                                                           value="{{ @$news ? @$news->translate('ru')->short_content : old('ru_short_content') }}">
                                                                    @error('ru_short_content')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_short_content') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label
                                                                        for="country">{{ __('Long Content') }}</label>
                                                                    <textarea class="textarea" name="ru_long_content"
                                                                              id="editorNewsRu"
                                                                              rows="4"
                                                                              cols="4">{{ @$news ? @$news->translate('ru')->long_content : old('ru_long_content') }}</textarea>
                                                                    @error('ru_long_content')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_long_content') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="zh">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="zh_title"
                                                                           value="{{ @$news ? @$news->translate('zh')->title : old('zh_title') }}">
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
                                                                    <label
                                                                        for="country">{{ __('Short Content') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Short Content') }}"
                                                                           name="zh_short_content"
                                                                           value="{{ @$news ? @$news->translate('zh')->short_content : old('zh_short_content') }}">
                                                                    @error('zh_short_content')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_short_content') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label
                                                                        for="country">{{ __('Long Content') }}</label>
                                                                    <textarea class="textarea" name="zh_long_content"
                                                                              id="editorNewsAz"
                                                                              rows="4"
                                                                              cols="4">{{ @$news ? @$news->translate('zh')->long_content : old('zh_long_content') }}</textarea>
                                                                    @error('zh_long_content')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_long_content') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
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
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                    style="margin-top: 15px;">
                                                    <label
                                                        for="title">{{ __('Main Image') }}</label>
                                                    @if(@$news->main_image != null)
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div
                                                                    class="card-img-actions m-1">
                                                                    <img
                                                                        class="card-img img-fluid"
                                                                        src="/{{@$news->main_image}}"
                                                                        alt=""
                                                                        id="output"
                                                                        style="height:250px; object-fit:contain;">
                                                                    <div
                                                                        class="card-img-actions-overlay card-img">
                                                                        <a href="/{{@$news->main_image}}"
                                                                           class="btn btn-outline-white border-2 btn-icon rounded-pill"
                                                                           data-popup="lightbox"
                                                                           data-gallery="gallery1">
                                                                            <i class="icon-plus3"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-lg-12">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <input type="file"
                                                                   class="form-control h-auto"
                                                                   name="main_image"
                                                                   accept="image/*"
                                                                   onchange="loadFile(event)">
                                                            @error('main_image')
                                                            <div
                                                                class="alert-danger"> {{ $errors->first('main_image') }}
                                                            </div>
                                                            @enderror
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
                                        <div class="d-flex justify-content-center plus mb-2">
                                            <button type="submit"
                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                    class="btn btn-success btn-loading"><i
                                                    class="icon-spinner4 mr-2"></i>
                                                @if (@$news->id) {{ __('Update') }} @else {{ __('Create') }} @endif
                                            </button>
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
