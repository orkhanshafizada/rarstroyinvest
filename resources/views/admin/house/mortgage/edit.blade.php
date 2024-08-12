@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">Mortgage </span> - @if (@$mortgage->id)
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
                                        action="{{ @$mortgage->id ? route('admin.mortgage.update', $mortgage ) : route('admin.mortgage.store') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$mortgage->id)
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
                                                                @if(@$mortgage && @$mortgage->active == 1) selected @endif> {{ __('Active') }}</option>
                                                        <option value="0"
                                                                @if(@$mortgage && @$mortgage->active == 0) selected @endif> {{ __('Deactive') }}</option>
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
                                                           value="{{ @$mortgage ? @$mortgage->sort : old('sort') ?? 1 }}">
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
                                                    @if(@$mortgage->image != null)
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div
                                                                    class="card-img-actions m-1">
                                                                    <img
                                                                        class="card-img img-fluid"
                                                                        src="/{{@$mortgage->image}}"
                                                                        alt=""
                                                                        id="output"
                                                                        style="height:150px; object-fit:contain;">
                                                                    <div
                                                                        class="card-img-actions-overlay card-img">
                                                                        <a href="/{{@$mortgage->image}}"
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
                                                @if (@$mortgage->id)
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
