@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Filter') }}</h5>
                @can('filter.create', 'admin')
                    <a href="{{ route('admin.filter.create') }}" class="btn btn-success btn-xs plus"
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
                    <th width="25%">{{ __('Name') }}</th>
                    <th width="20%">{{ __('Status') }}</th>
                    <th width="20%">{{ __('Sort') }}</th>
                    <th width="10%">{{ __('Create date') }}</th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($filters as $filter)
                    <tr>
                        <td>{{ $filter->id }}</td>
                        <td>{{ $filter->translate('ru')->name }}</td>
                        <td>{!! $filter->active ? "<p class='text-success'> Active </p>" : "<p class='text-danger'> Deactive </p>" !!}</td>
                        <td>{{ $filter->sort }}</td>
                        <td>{{ $filter->created_at }}</td>
                        <td style="display: flex;">
                            @can('filter.edit', 'admin')
                                <a href="{{ route('admin.filter.show', $filter) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('filter.delete', 'admin')
                                <form action="{{ route('admin.filter.destroy', $filter) }}" method="post"
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
