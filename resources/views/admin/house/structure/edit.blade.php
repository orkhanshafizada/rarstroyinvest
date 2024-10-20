@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-description d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Structure') }} </span> - @if (@$structure->id)
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
                                          action="{{ @$structure->id ? route('admin.structure.update',$structure) : route('admin.structure.store') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$structure->id)
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
                                                                @if(@$structure && @$structure->active == 1) selected @endif> {{ __('Active') }}</option>
                                                        <option value="0"
                                                                @if(@$structure && @$structure->active == 0) selected @endif> {{ __('Deactive') }}</option>
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
                                                           value="{{ @$structure ? @$structure->sort : old('sort') ?? 1 }}">
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
                                                                    <label for="country">{{ __('Name') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Name') }}"
                                                                           name="ru_name"
                                                                           value="{{ @$structure ? @$structure->translate('ru')->name : old('ru_name') }}">
                                                                    @error('ru_name')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_name') }}
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
                                                                    <label for="country">{{ __('Name') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Name') }}"
                                                                           name="en_name"
                                                                           value="{{ @$structure ? @$structure->translate('en')->name : old('en_name') }}">
                                                                    @error('en_name')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_name') }}
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
                                                                    <label for="country">{{ __('Name') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Name') }}"
                                                                           name="zh_name"
                                                                           value="{{ @$structure ? @$structure->translate('zh')->name : old('zh_name') }}">
                                                                    @error('zh_name')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_name') }}
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
                                                @if (@$structure->id)
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
