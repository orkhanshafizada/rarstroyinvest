@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Comment') }} </span> - @if (@$comment->id)
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
                                          action="{{ @$comment->id ? route('admin.comment.update', $comment) : route('admin.comment.store') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$comment->id)
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
                                                                @if(@$comment->active == 1) selected @endif> {{ __('Active') }}</option>
                                                        <option value="0"
                                                                @if(@$comment->active == 0) selected @endif> {{ __('Deactive') }}</option>
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
                                                           value="{{ @$comment ? @$comment->sort : old('sort') ?? 1 }}">
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
                                                                    <label for="country">{{ __('Fullname') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Fullname') }}"
                                                                           name="en_full_name"
                                                                           value="{{ @$comment ? @$comment->translate('en')->full_name : old('en_full_name') }}">
                                                                    @error('en_full_name')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_full_name') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label
                                                                        for="country">{{ __('Description') }}</label>
                                                                    <textarea class="textarea" name="en_description"
                                                                              id="editorNewsEN"
                                                                              rows="4"
                                                                              cols="4">{{ @$comment ? @$comment->translate('en')->description : old('en_description') }}</textarea>
                                                                    @error('en_description')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_description') }}
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
                                                                    <label for="country">{{ __('Fullname') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Fullname') }}"
                                                                           name="ru_full_name"
                                                                           value="{{ @$comment ? @$comment->translate('ru')->full_name : old('ru_full_name') }}">
                                                                    @error('ru_full_name')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_full_name') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label
                                                                        for="country">{{ __('Description') }}</label>
                                                                    <textarea class="textarea" name="ru_description"
                                                                              id="editorNewsRu"
                                                                              rows="4"
                                                                              cols="4">{{ @$comment ? @$comment->translate('ru')->description : old('ru_description') }}</textarea>
                                                                    @error('ru_description')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_description') }}
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
                                                                    <label for="country">{{ __('Fullname') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Fullname') }}"
                                                                           name="zh_full_name"
                                                                           value="{{ @$comment ? @$comment->translate('zh')->full_name : old('zh_full_name') }}">
                                                                    @error('zh_full_name')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_full_name') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label
                                                                        for="country">{{ __('Description') }}</label>
                                                                    <textarea class="textarea" name="zh_description"
                                                                              id="editorNewsAz"
                                                                              rows="4"
                                                                              cols="4">{{ @$comment ? @$comment->translate('zh')->description : old('zh_description') }}</textarea>
                                                                    @error('zh_description')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_description') }}
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
                                                        for="title">{{ __('Image') }}</label>
                                                    @if(@$comment->image != null)
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div
                                                                    class="card-img-actions m-1">
                                                                    <img
                                                                        class="card-img img-fluid"
                                                                        src="/{{@$comment->image}}"
                                                                        alt=""
                                                                        id="output"
                                                                        style="height:250px; object-fit:contain;">
                                                                    <div
                                                                        class="card-img-actions-overlay card-img">
                                                                        <a href="/{{@$comment->image}}"
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
                                                @if (@$comment->id) {{ __('Update') }} @else {{ __('Create') }} @endif
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
