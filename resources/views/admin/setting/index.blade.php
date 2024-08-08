@extends('admin.layouts.app')
@section('content')
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
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
                    <form action="{!! route('admin.config') ?? ' ' !!}" enctype="multipart/form-data" method="post">
                        <div class="row ">
                            <div class="col-lg-12 ">
                                <div class="card ">
                                    <div class="card-header">
                                        <h6 class="card-title">{{ __('Site settings') }}</h6>
                                        <button type="submit"
                                                data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                class="btn btn-success btn-loading plus"><i
                                                class="icon-spinner4 mr-2"></i>
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                    <div class="card-body ">
                                        <div class="d-lg-flex">
                                            <ul class="right-border nav nav-tabs nav-tabs-vertical flex-column mr-lg-3 wmin-lg-200 mb-lg-0 border-bottom-0">
                                                <li class="nav-item">
                                                    <a href="#left-icon-tab1" class="nav-link active" data-toggle="tab">
                                                        <i class="icon-menu7 mr-2"></i> {{ __('Seo') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#left-icon-tab2" class="nav-link" data-toggle="tab">
                                                        <i class="icon-file-picture mr-2"></i> {{ __('Photos') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#left-icon-tab3" class="nav-link" data-toggle="tab">
                                                        <i class="icon-mention mr-2"></i> {{ __('Social') }}
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#left-icon-tab4" class="nav-link" data-toggle="tab">
                                                        <i class="icon-cog mr-2"></i> {{ __('Other') }}
                                                    </a>
                                                </li>
                                            </ul>
                                            @csrf
                                            <div class="tab-content  flex-lg-fill">
                                                <div class="tab-pane fade show active" id="left-icon-tab1">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="title">{{ __('Site Title') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-lg"
                                                                               placeholder="{{ __('Site Title') }}"
                                                                               name="title"
                                                                               value="{!! setting('title') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="title">{{ __('Meta Title') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-lg"
                                                                               placeholder="{{ __('Meta Title') }}"
                                                                               name="meta_title"
                                                                               value="{!! setting('meta_title') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6" style="margin-top: 15px;">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="title">{{ __('Meta Keywords') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               placeholder="{{ __('Meta Keywords') }}"
                                                                               name="meta_keywords"
                                                                               value="{!! setting('meta_keywords') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6" style="margin-top: 15px;">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="title">{{ __('Meta Author') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-lg"
                                                                               placeholder="Author" name="meta_author"
                                                                               value="{!! setting('meta_author') ?? ' ' !!}">
                                                                    </div>

                                                                </div>
                                                                <div class="col-lg-12" style="margin-top: 15px;">
                                                                    <div class="mb-3">
                                                                        <label
                                                                            for="title">{{ __('Meta Description') }}</label>
                                                                        <textarea class="textarea"
                                                                                  name="meta_description"
                                                                                  id="editorDesc"
                                                                                  rows="4"
                                                                                  cols="4">{!! setting('meta_description') ?? ' ' !!}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="left-icon-tab2">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    @if (setting('logo_white') != null)
                                                                        <div class="card">
                                                                            <div class="card-img-actions m-1">
                                                                                <img class="card-img img-fluid"
                                                                                     src="/{!! setting('logo_white') ?? ' ' !!}"
                                                                                     style="height:150px; object-fit:contain;">
                                                                                <div
                                                                                    class="card-img-actions-overlay card-img">
                                                                                    <a href="/{!! setting('logo_white') ?? ' ' !!}"
                                                                                       class="btn btn-outline-white border-2 btn-icon rounded-pill"
                                                                                       data-popup="lightbox"
                                                                                       data-gallery="gallery1">
                                                                                        <i class="icon-plus3"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="logo_white">{{ __('Logo White') }}</label>
                                                                        <input type="file" class="form-control h-auto"
                                                                               name="logo_white">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    @if (setting('logo_colorful') != null)
                                                                        <div class="card">
                                                                            <div class="card-img-actions m-1">
                                                                                <img class="card-img img-fluid"
                                                                                     src="/{!! setting('logo_colorful') ?? ' ' !!}"
                                                                                     style="height:150px; object-fit:contain;">
                                                                                <div
                                                                                    class="card-img-actions-overlay card-img">
                                                                                    <a href="/{!! setting('logo_colorful') ?? ' ' !!}"
                                                                                       class="btn btn-outline-white border-2 btn-icon rounded-pill"
                                                                                       data-popup="lightbox"
                                                                                       data-gallery="gallery1">
                                                                                        <i class="icon-plus3"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="logo_colorful">{{ __('Logo Colorful') }}</label>
                                                                        <input type="file" class="form-control h-auto"
                                                                               name="logo_colorful">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    @if (setting('favicon') != null)
                                                                        <div class="card">
                                                                            <div class="card-img-actions m-1">
                                                                                <img class="card-img img-fluid"
                                                                                     src="/{!! setting('favicon') ?? ' ' !!}"
                                                                                     style="height:150px; object-fit:contain;">
                                                                                <div
                                                                                    class="card-img-actions-overlay card-img">
                                                                                    <a href="/{!!setting('favicon') ?? ' ' !!}"
                                                                                       class="btn btn-outline-white border-2 btn-icon rounded-pill"
                                                                                       data-popup="lightbox"
                                                                                       data-gallery="gallery1">
                                                                                        <i class="icon-plus3"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label for="favicon">{{ __('Favicon') }}</label>
                                                                        <input type="file" class="form-control h-auto"
                                                                               name="favicon">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="left-icon-tab3">
                                                    <div class="form-group row d-flex justify-content-center">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="Facebook">{{ __('Facebook') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control"
                                                                               placeholder="{{ __('Facebook') }}"
                                                                               name="facebook"
                                                                               value="{!! setting('facebook') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="Instagram">{{ __('Instagram') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control"
                                                                               placeholder="{{ __('Instagram') }}"
                                                                               name="instagram"
                                                                               value="{!! setting('instagram') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="Linkedin">{{ __('Linkedin') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               placeholder="{{ __('Linkedin') }}"
                                                                               name="linkedin"
                                                                               value="{!! setting('linkedin') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="Telegram">{{ __('Telegram') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               placeholder="{{ __('Telegram') }}"
                                                                               name="telegram"
                                                                               value="{!! setting('telegram') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="Whatsapp">{{ __('Whatsapp') }}</label>
                                                                        <input type="text" class="form-control"
                                                                               placeholder="{{ __('Whatsapp') }}"
                                                                               name="whatsapp"
                                                                               value="{!! setting('whatsapp') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="left-icon-tab4">
                                                    <div class="form-group row d-flex justify-content-center">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12" style="margin-top: 15px;">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label for="title">{{ __('Copyright') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control-lg"
                                                                               placeholder="{{ __('Copyright') }}"
                                                                               name="copyright"
                                                                               value="{!! setting('copyright') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div
                                                                        class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label
                                                                            for="Address">{{ __('Address') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control"
                                                                               placeholder="{{ __('Address') }}"
                                                                               name="address"
                                                                               value="{!! setting('address') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label for="E-mail">{{ __('E-mail') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control"
                                                                               placeholder="{{ __('E-mail') }}"
                                                                               name="email"
                                                                               value="{!! setting('email') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label for="Mobile">{{ __('Mobile') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control"
                                                                               placeholder="{{ __('Mobile') }}"
                                                                               name="mobile"
                                                                               value="{!! setting('mobile') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                                                        <label for="Time">{{ __('Time') }}</label>
                                                                        <input type="text"
                                                                               class="form-control form-control"
                                                                               placeholder="{{ __('Time') }}"
                                                                               name="time"
                                                                               value="{!! setting('time') ?? ' ' !!}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection

