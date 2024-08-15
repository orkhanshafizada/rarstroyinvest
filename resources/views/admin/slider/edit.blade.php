@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">Slider </span> - @if (@$slider->id)
                                {{ __('Update') }}
                            @else
                                {{ __('Create') }}
                            @endif
                        </h4>
                        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form
                                        action="{{ @$slider->id ? route('admin.slider.update', $slider ) : route('admin.slider.store') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$slider->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                    style="margin-top: 15px;">
                                                    <label for="title">{{ __('Status') }}</label>
                                                    <select name="active" class="form-control">
                                                        <option value="1"
                                                                @if(@$slider && @$slider->active == 1) selected @endif> {{ __('Active') }}</option>
                                                        <option value="0"
                                                                @if(@$slider && @$slider->active == 0) selected @endif> {{ __('Deactive') }}</option>
                                                    </select>
                                                    @error('active')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('active') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                    style="margin-top: 15px;">
                                                    <label for="title">{{ __('Sort') }}</label>
                                                    <input type="number" class="form-control"
                                                           placeholder="{{ __('Sort') }}"
                                                           name="sort"
                                                           value="{{ @$slider ? @$slider->sort : old('sort') ?? 1 }}">
                                                    @error('sort')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('sort') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                    style="margin-top: 15px;">
                                                    <label for="title">{{ __('Type') }}</label>
                                                    <select name="type" class="form-control" id="type">
                                                        <option value="1"
                                                                @if(@$slider->type == 1) selected @endif> {{ __('Content') }}</option>
                                                        <option value="2"
                                                                @if(@$slider->type == 2) selected @endif> {{ __('Link') }}</option>
                                                    </select>
                                                    @error('Type')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('Type') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-secondary nav-justified">
                                                    <li class="nav-item"><a href="#tab-en"
                                                                            class="nav-link active"
                                                                            data-toggle="tab"><span
                                                                class="flag-icon flag-icon-us"></span>
                                                            {{ __('English') }}</a></li>
                                                    <li class="nav-item"><a href="#tab-ru"
                                                                            class="nav-link"
                                                                            data-toggle="tab"><span
                                                                class="flag-icon flag-icon-ru"></span>
                                                            {{ __('Russian') }}</a></li>
                                                    <li class="nav-item"><a href="#tab-zh"
                                                                            class="nav-link "
                                                                            data-toggle="tab"><span
                                                                class="flag-icon flag-icon-cn"></span>
                                                            {{ __('Chinese') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tab-en">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                                    style="margin-top: 15px;">
                                                                    <label for="title">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="en_title"
                                                                           value="{{ @$slider ? @$slider->translate('en')->title : old('en_title') }}">
                                                                    @error('en_title')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_title') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 link"
                                                                 style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label for="title">{{ __('Link') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Link') }}"
                                                                           name="en_link"
                                                                           value="{{ @$slider ? @$slider->translate('en')->link : old('en_link') }}">
                                                                </div>
                                                                @error('en_link')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('en_link') }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-12 content_slider"
                                                                 style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="title">{{ __('Content') }}</label>
                                                                    <textarea class="textarea" name="en_content"
                                                                              id="en_editor_slider"
                                                                              rows="4"
                                                                              cols="4">{{ @$slider ? @$slider->translate('en')->content : old('en_content') }}</textarea>
                                                                </div>
                                                                @error('en_content')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('en_content') }}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="tab-ru">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                                    style="margin-top: 15px;">
                                                                    <label for="title">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="ru_title"
                                                                           value="{{ @$slider ? @$slider->translate('ru')->title : old('ru_title') }}">
                                                                    @error('ru_title')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_title') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 link"
                                                                 style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label for="title">{{ __('Link') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Link') }}"
                                                                           name="ru_link"
                                                                           value="{{ @$slider ? @$slider->translate('ru')->link : old('ru_link') }}">
                                                                </div>
                                                                @error('ru_link')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('ru_link') }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-12 content_slider"
                                                                 style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="title">{{ __('Content') }}</label>
                                                                    <textarea class="textarea" name="ru_content"
                                                                              id="ru_editor_slider"
                                                                              rows="4"
                                                                              cols="4">{{ @$slider ? @$slider->translate('ru')->content : old('ru_content') }}</textarea>
                                                                </div>
                                                                @error('ru_content')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('ru_content') }}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="tab-zh">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                                    style="margin-top: 15px;">
                                                                    <label for="title">{{ __('Title') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Title') }}"
                                                                           name="zh_title"
                                                                           value="{{ @$slider ? @$slider->translate('zh')->title : old('zh_title') }}">
                                                                    @error('zh_title')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_title') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 link"
                                                                 style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label for="title">{{ __('Link') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Link') }}"
                                                                           name="zh_link"
                                                                           value="{{ @$slider ? @$slider->translate('zh')->link : old('zh_link') }}">
                                                                </div>
                                                                @error('zh_link')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('zh_link') }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-12 content_slider"
                                                                 style="margin-top: 15px;">
                                                                <div class="mb-3">
                                                                    <label
                                                                        for="title">{{ __('Content') }}</label>
                                                                    <textarea class="textarea" name="zh_content"
                                                                              id="zh_editor_slider"
                                                                              rows="4"
                                                                              cols="4">{{ @$slider ? @$slider->translate('zh')->content : old('zh_content') }}</textarea>
                                                                </div>
                                                                @error('zh_content')
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('zh_content') }}
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
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                    style="margin-top: 15px;">
                                                    <label
                                                        for="title">{{ __('Big Image') }}</label>
                                                    @if(@$slider->image != null)
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div
                                                                    class="card-img-actions m-1">
                                                                    <img
                                                                        class="card-img img-fluid"
                                                                        src="/{{@$slider->image}}"
                                                                        alt=""
                                                                        id="output"
                                                                        style="height:250px; object-fit:contain;">
                                                                    <div
                                                                        class="card-img-actions-overlay card-img">
                                                                        <a href="/{{@$slider->image}}"
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
                                                                   name="image"
                                                                   accept="image/*"
                                                                   onchange="loadFile(event)">
                                                            @error('image')
                                                            <div
                                                                class="alert-danger"> {{ $errors->first('image') }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center plus">
                                            <button type="submit"
                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                    class="btn btn-success btn-loading"><i
                                                    class="icon-spinner4 mr-2"></i>
                                                @if (@$slider->id)
                                                    {{ __('Update') }}
                                                @else
                                                    {{ __('Create') }}
                                                @endif
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
        @endsection
        @section('javascripts')
            <script>
                checkDiv();

                function checkDiv() {
                    if ($('#type').val() == 1) {
                        $('.content_slider').show();
                        $('.link').hide();
                    } else {
                        $('.content_slider').hide();
                        $('.link').show();
                    }
                }

                $('#type').change(function () {
                    checkDiv();
                });
            </script>
@endsection
