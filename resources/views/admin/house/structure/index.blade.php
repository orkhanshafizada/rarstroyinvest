@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Structures') }}</h5>
                @can('structure.create', 'admin')
                    <a href="{{ route('admin.structure.create') }}" class="btn btn-success btn-xs plus"
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
                    <th data-field="id.count" data-sortable="true">№</th>
                    <th>{{ __('Title') }}</th>
                    <th></th>
                    <th>Status</th>
                    <th>{{ __('Create date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($structures as $structure)
                    <tr>
                        <td>{{ $structure->id }}</td>
                        <td>{{ $structure->translate(app()->getLocale())->title }}</td>
                        <td></td>
                        <td>{!! $structure->status ? '<p class="text-success">Active</p>' : '<p class="text-danger">Deactive</p>' !!}</td>
                        <td>{{ $structure->created_at }}</td>
                        <td style="display: flex;">
                            @can('structure.edit', 'admin')
                                <a href="{{ route('admin.structure.show', $structure) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('structure.delete', 'admin')
                                <form action="{{ route('admin.structure.destroy', $structure) }}" method="post"
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
