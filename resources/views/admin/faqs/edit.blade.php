@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-description d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Faq') }} </span> - @if (@$faq->id)
                                {{ __('Update') }} @else {{ __('Create') }} @endif
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
                                          action="{{ @$faq->id ? route('admin.faq.update',$faq) : route('admin.faq.store') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$faq->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="country">{{ __('Sort') }}</label>
                                                    <input type="number" class="form-control"
                                                           placeholder="{{ __('Sort') }}"
                                                           name="sort"
                                                           value="{{ @$faq ? @$faq->sort : old('sort') }}">
                                                    @error('sort')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('sort') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-secondary nav-justified">
                                                    <li class="nav-item">
                                                        <a href="#ru" class="nav-link active" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-ru"></span> {{ __('Russian') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#en" class="nav-link" data-toggle="tab">
                                                            <span class="flag-icon flag-icon-us"></span> {{ __('English') }}
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
                                            <div class="tab-pane fade show active" id="ru">
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
                                                                           value="{{ @$faq ? @$faq->translate('ru')->title : old('ru_title') }}">
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
                                                                        for="country">{{ __('Long Content') }}</label>
                                                                    <textarea class="textarea" name="ru_content"
                                                                              id="editorFaqRu"
                                                                              rows="4"
                                                                              cols="4">{{ @$faq ? @$faq->translate('ru')->content : old('ru_content') }}</textarea>
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
                                            </div>
                                            <div class="tab-pane fade" id="en">
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
                                                                           value="{{ @$faq ? @$faq->translate('en')->title : old('en_title') }}">
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
                                                                        for="country">{{ __('Long Content') }}</label>
                                                                    <textarea class="textarea" name="en_content"
                                                                              id="editorFaqEn"
                                                                              rows="4"
                                                                              cols="4">{{ @$faq ? @$faq->translate('en')->content : old('en_content') }}</textarea>
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
                                                                           value="{{ @$faq ? @$faq->translate('zh')->title : old('zh_title') }}">
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
                                                                        for="country">{{ __('Long Content') }}</label>
                                                                    <textarea class="textarea" name="zh_content"
                                                                              id="editorFaqZh"
                                                                              rows="4"
                                                                              cols="4">{{ @$faq ? @$faq->translate('zh')->content : old('zh_content') }}</textarea>
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
                                                @if (@$faq->id) {{ __('Update') }} @else {{ __('Create') }} @endif
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
