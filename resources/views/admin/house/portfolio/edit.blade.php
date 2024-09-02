@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-description d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Portfolio') }} </span> - @if (@$house->id)
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
                            <div class="card">
                                <div class="card-body">
                                    <form class="margin-form"
                                          action="{{ @$house->id ? route('admin.portfolio.update',$house) : route('admin.portfolio.store') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$house->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="row" style="border-bottom: 1px solid;">
                                            <div class="col-lg-6">
                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="title">{{ __('Status') }}</label>
                                                    <select name="active" class="form-control">
                                                        <option value="1"
                                                                @if(@$house && @$house->active == 1) selected @endif> {{ __('Active') }}</option>
                                                        <option value="0"
                                                                @if(@$house && @$house->active == 0) selected @endif> {{ __('Deactive') }}</option>
                                                    </select>
                                                    @error('active')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('active') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="country">{{ __('Location') }}</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Location') }}"
                                                           name="location"
                                                           value="{{ @$house ? @$house->location : old('location') }}">
                                                    @error('location')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('location') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6" style="border-right: 1px solid;">
                                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-secondary nav-justified">
                                                    <li class="nav-item">
                                                        <a href="#ru" class="nav-link active" data-toggle="tab">
                                                            <span
                                                                class="flag-icon flag-icon-ru"></span> {{ __('Russian') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#en" class="nav-link" data-toggle="tab">
                                                            <span
                                                                class="flag-icon flag-icon-us"></span> {{ __('English') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#zh" class="nav-link" data-toggle="tab">
                                                            <span
                                                                class="flag-icon flag-icon-cn"></span> {{ __('Chinese') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="ru">
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-3">
                                                                        <div
                                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                                            <label
                                                                                for="country">{{ __('Name') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="{{ __('Name') }}"
                                                                                   name="ru_name"
                                                                                   value="{{ @$house ? @$house->translate('ru')->name : old('ru_name') }}">
                                                                            @error('ru_name')
                                                                            <div
                                                                                class="alert-danger"> {{ $errors->first('ru_name') }}
                                                                            </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mb-3">
                                                                        <div
                                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                                            <label
                                                                                for="country">{{ __('Video Url') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="{{ __('Video Url') }}"
                                                                                   name="ru_video_url"
                                                                                   value="{{ @$house ? @$house->translate('ru')->video_url : old('ru_video_url') }}">
                                                                            @error('ru_video_url')
                                                                            <div
                                                                                class="alert-danger"> {{ $errors->first('ru_video_url') }}
                                                                            </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="en">
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mb-3">
                                                                        <div
                                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                                            <label
                                                                                for="country">{{ __('Name') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="{{ __('Name') }}"
                                                                                   name="en_name"
                                                                                   value="{{ @$house ? @$house->translate('en')->name : old('en_name') }}">
                                                                            @error('en_name')
                                                                            <div
                                                                                class="alert-danger"> {{ $errors->first('en_name') }}
                                                                            </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mb-3">
                                                                        <div
                                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                                            <label
                                                                                for="country">{{ __('Video Url') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="{{ __('Video Url') }}"
                                                                                   name="en_video_url"
                                                                                   value="{{ @$house ? @$house->translate('en')->video_url : old('en_video_url') }}">
                                                                            @error('en_video_url')
                                                                            <div
                                                                                class="alert-danger"> {{ $errors->first('en_video_url') }}
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
                                                                            <label
                                                                                for="country">{{ __('Name') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="{{ __('Name') }}"
                                                                                   name="zh_name"
                                                                                   value="{{ @$house ? @$house->translate('zh')->name : old('zh_name') }}">
                                                                            @error('zh_name')
                                                                            <div
                                                                                class="alert-danger"> {{ $errors->first('zh_name') }}
                                                                            </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mb-3">
                                                                        <div
                                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                                            <label
                                                                                for="country">{{ __('Video Url') }}</label>
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="{{ __('Video Url') }}"
                                                                                   name="zh_video_url"
                                                                                   value="{{ @$house ? @$house->translate('zh')->video_url : old('zh_video_url') }}">
                                                                            @error('zh_video_url')
                                                                            <div class="alert-danger">
                                                                                {{ $errors->first('zh_video_url') }}
                                                                            </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left"
                                                    style="margin-top: 15px;">
                                                    <label
                                                        for="title">{{ __('Main Image') }}</label>
                                                    @if(@$house->main_image != null)
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div
                                                                    class="card-img-actions m-1">
                                                                    <img
                                                                        class="card-img img-fluid"
                                                                        src="{{ asset(@$house->main_image ?? '') }}"
                                                                        alt=""
                                                                        id="output"
                                                                        style="height:250px; object-fit:contain;">
                                                                    <div
                                                                        class="card-img-actions-overlay card-img">
                                                                        <a href="{{ asset(@$house->main_image ?? '') }}"
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
                                        <div class="row" style="border-top: 1px solid;">
                                            <div class="col-lg-12 pt-3" style="border-left: 1px solid;">
                                                <div class="row">
                                                    @foreach($filters as $filter)
                                                        <div class="col-lg-4 mb-3">
                                                            {{ $filter->translate('ru')->name }} :
                                                        </div>
                                                        <div class="col-lg-8 mb-3">
                                                            <div
                                                                class="form-group form-group-feedback form-group-feedback-left">
                                                                <input type="text" class="form-control"
                                                                       placeholder="{{ __('Value') }}"
                                                                       name="filter_value_{{$filter->id}}"
                                                                       value="{{ old('filter_value_'.$filter->id,
                                                                    isset($house) ? $house->filters->firstWhere('id', $filter->id)?->pivot->value : '') }}">
                                                                @error('filter_value_'.$filter->id)
                                                                <div
                                                                    class="alert-danger"> {{ $errors->first('filter_value_'.$filter->id) }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center plus mb-2">
                                            <button type="submit"
                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                    class="btn btn-success btn-loading"><i
                                                    class="icon-spinner4 mr-2"></i>
                                                @if (@$house->id)
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
    </div>
@endsection
