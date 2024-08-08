@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-lg-inline">
                    <div class="page-title d-flex">
                        <h4><a href="{{ url()->previous() }}"><i class="icon-arrow-left52 mr-2"></i></a> <span
                                class="font-weight-semibold">{{ __('Role') }} </span> - @if (@$role->id)
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
                                    <form
                                        action="{{ @$role->id ? route('admin.role.update',$role->id ) : route('admin.role.store') }}"
                                        method="post">
                                        @csrf
                                        @if(@$role->id)
                                            @method('PATCH')
                                        @endif
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                    <label for="name">{{ __('Role name') }}</label>
                                                    <input type="text" class="form-control" placeholder="{{ __('Role name') }}"
                                                           name="name"
                                                           value="{{ @$role->name }}">
                                                    @error('name')
                                                    <div class="alert-danger"> {{ $errors->first('name') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12"></div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-group form-group-feedback form-group-feedback-left">
                                                    <h2>{{ __('Permissions') }}</h2>
                                                    <div class="row">
                                                        @foreach ($permissionsGroup as $group => $permissions)
                                                            <div class="col-lg-4">
                                                                <div class="col-lg-12">
                                                                    <hr>
                                                                    <h5 style="font-weight: bold">{{$group}}</h5>
                                                                    <hr>
                                                                </div>
                                                                @foreach ($permissions as $permission)
                                                                    <div
                                                                        class="custom-control custom-checkbox mb-2 col-lg-12">

                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="{{ $permission->name }}"
                                                                               value="{{ $permission->id }}"
                                                                               name="permissions[]"
                                                                               @if (@$role->id and @$role->hasPermissionTo($permission->name)) checked @endif>
                                                                        <label class="custom-control-label"
                                                                               for="{{ $permission->name }}">{{ $permission->name }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @error('permission')
                                                    <div class="alert-danger"> {{ $errors->first('permission') }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                    data-initial-text="<i class='icon-spinner4 mr-2'></i> Loading state"
                                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                                    class="btn btn-success btn-loading"><i
                                                    class="icon-spinner4 mr-2"></i>
                                                @if (@$role->id)
                                                    {{ __('Update') }} @else {{ __('Create') }}
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
