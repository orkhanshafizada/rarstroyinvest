@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Moderator') }} </span> - @if (@$moderator->id)
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
                                    <form action="{{ @$moderator->id ? route('admin.moderator.update',$moderator->id ) : route('admin.moderator.store') }}" method="post">
                                        @csrf
                                        @if(@$moderator->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="form-group row">
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <label for="fullname">{{ __('Fullname') }}</label>
                                                            <input type="text" class="form-control" placeholder="{{ __('Fullname') }}"
                                                                   name="fullname"
                                                                   value="{{ @$moderator->fullname }}">
                                                            @error('fullname')
                                                            <div class="alert-danger"> {{ $errors->first('fullname') }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <label for="email">{{ __('E-mail') }}</label>
                                                            <input type="text" class="form-control form-control-lg"
                                                                   placeholder="{{ __('E-mail') }}" name="email"
                                                                   value="{{ @$moderator->email }}">
                                                            @error('email')
                                                            <div class="alert-danger"> {{ $errors->first('email') }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <label for="role">{{ __('Role') }}</label>
                                                            <select name="role" class="form-control">
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}"
                                                                            @if(@$moderator and @$moderator->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('role')
                                                            <div class="alert-danger"> {{ $errors->first('role') }} </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <hr>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <label for="password">{{ __('Password') }}</label>
                                                            <input type="password" class="form-control"
                                                                   placeholder="{{ __('Password') }}"
                                                                   name="password" value="">
                                                            @error('password')
                                                            <div class="alert-danger"> {{ $errors->first('password') }} </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div
                                                            class="form-group form-group-feedback form-group-feedback-left">
                                                            <label for="password_confirmation">{{ __('Repeat Password') }}</label>
                                                            <input type="password" class="form-control"
                                                                   placeholder="Repeat Password"
                                                                   name="password_confirmation" value="">
                                                            @error('password_confirmation')
                                                            <div class="alert-danger"> {{ $errors->first('password_confirmation') }} </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                    class="btn btn-success btn-loading"><i class="icon-spinner4 mr-2"></i>
                                                @if (@$moderator->id) {{ __('Update') }} @else {{ __('Create') }} @endif
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
