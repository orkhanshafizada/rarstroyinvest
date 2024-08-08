@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Contact') }} </span> - @if (@$contact->id)
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
                                        action="{{ @$contact->id ? route('admin.contact.update',$contact) : route('admin.contact.store') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(@$contact->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-secondary nav-justified">
                                                    <li class="nav-item"><a href="#top-justified-tab1"
                                                                            class="nav-link active"
                                                                            data-toggle="tab"><span
                                                                class="flag-icon flag-icon-az"></span> {{ __('Azerbaijan') }}
                                                        </a>
                                                    </li>
                                                    <li class="nav-item"><a href="#top-justified-tab2" class="nav-link"
                                                                            data-toggle="tab"><span
                                                                class="flag-icon flag-icon-us"></span> {{ __('English') }}
                                                        </a></li>
                                                    <li class="nav-item"><a href="#top-justified-tab3" class="nav-link"
                                                                            data-toggle="tab"><span
                                                                class="flag-icon flag-icon-ru"></span> {{ __('Russian') }}
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="top-justified-tab1">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Country') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Country') }}"
                                                                           name="zh_country"
                                                                           value="{{ @$contact ? @$contact->translate('zh')->country : old('zh_country') }}">
                                                                    @error('zh_country')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_country') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Address') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Address') }}"
                                                                           name="zh_address"
                                                                           value="{{ @$contact ? @$contact->translate('zh')->address : old('zh_address') }}">
                                                                    @error('zh_address')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('zh_address') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="top-justified-tab2">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Country') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Country') }}"
                                                                           name="en_country"
                                                                           value="{{ @$contact ? @$contact->translate('en')->country : old('en_country') }}">
                                                                    @error('en_country')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_country') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Address') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Address') }}"
                                                                           name="en_address"
                                                                           value="{{ @$contact ? @$contact->translate('en')->address : old('en_address') }}">
                                                                    @error('en_address')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('en_address') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="top-justified-tab3">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Country') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Country') }}"
                                                                           name="ru_country"
                                                                           value="{{ @$contact ? @$contact->translate('ru')->country : old('ru_country') }}">
                                                                    @error('ru_country')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_country') }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <div
                                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                                    <label for="country">{{ __('Address') }}</label>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="{{ __('Address') }}"
                                                                           name="ru_address"
                                                                           value="{{ @$contact ? @$contact->translate('ru')->address : old('ru_address') }}">
                                                                    @error('ru_address')
                                                                    <div
                                                                        class="alert-danger"> {{ $errors->first('ru_address') }}
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
                                            <div class="col-lg-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="country">{{ __('E-mail') }}</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('E-mail') }}"
                                                           name="email"
                                                           value="{{ @$contact ? @$contact->email : old('email') }}">
                                                    @error('email')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('email') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="country">{{ __('Phone') }}</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Phone') }}"
                                                           name="phone"
                                                           value="{{ @$contact ? @$contact->phone : old('phone') }}">
                                                    @error('phone')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('phone') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="country">{{ __('Fax') }}</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Fax') }}"
                                                           name="fax"
                                                           value="{{ @$contact ? @$contact->fax : old('fax') }}">
                                                    @error('fax')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('fax') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div
                                                    class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="country">{{ __('Country icon') }}</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="{{ __('Country icon') }}"
                                                           name="country_icon"
                                                           value="{{ @$contact ? @$contact->country_icon : old('country_icon') }}">
                                                    @error('country_icon')
                                                    <div
                                                        class="alert-danger"> {{ $errors->first('country_icon') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center plus mb-2">
                                            <button type="submit"
                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                    class="btn btn-success btn-loading"><i
                                                    class="icon-spinner4 mr-2"></i>
                                                @if (@$contact->id) {{ __('Update') }} @else {{ __('Create') }} @endif
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
