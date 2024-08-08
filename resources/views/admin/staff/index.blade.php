@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Staff') }}</h5>
                @can('staff.create', 'admin')
                    <a href="{{ route('admin.staff.create') }}" class="btn btn-success btn-xs plus"
                       onclick="loader();"><i
                            class="icon-plus-circle2"></i></a>
                @endcan
            </div>
            <div class="row">
                <div class="col-12">
                    @if (session()->has('message'))
                        <div class="alert alert-{{ session('message-alert') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
            <table class="table datatable-sorting">
                <thead>
                <tr>
                    <th width="5%" data-field="id.count" data-sortable="true">№</th>
                    <th width="20%">{{ __('Image') }}</th>
                    <th width="25%">{{ __('Fullname') }}</th>
                    <th width="15%">{{ __('Position') }}</th>
                    <th width="20%">{{ __('Status') }}</th>
                    <th width="20%">{{ __('Sort') }}</th>
                    <th width="10%">{{ __('Create date') }}</th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td><img src="/{{ $staff->image ?? ''}}" width="100%" height="100px" style="object-fit: contain;"></td>
                        <td>{{ $staff->translate(app()->getLocale())->full_name }}</td>
                        <td>{{ $staff->translate(app()->getLocale())->position }}</td>
                        <td>{!! $staff->active ? "<p class='text-success'> Active </p>" : "<p class='text-danger'> Deactive </p>" !!}</td>
                        <td>{{ $staff->sort }}</td>
                        <td>{{ $staff->created_at }}</td>
                        <td style="display: flex;">
                            @can('staff.edit', 'admin')
                                <a href="{{ route('admin.staff.show', $staff) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('staff.delete', 'admin')
                                <form action="{{ route('admin.staff.destroy', $staff) }}" method="post"
                                      class="trashForm">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="loader();"><i
                                            class="icon-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
