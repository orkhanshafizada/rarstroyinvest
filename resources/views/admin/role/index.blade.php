@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Roles') }}</h5>
                @can('moderator.create')
                    <a href="{{ route('admin.role.create') }}" class="btn btn-success btn-xs plus" onclick="loader();"><i
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
            <table class="table datatable-sorting">
                <thead>
                <tr>
                    <th data-field="id.count" data-sortable="true">№</th>
                    <th>{{ __('Role name') }}</th>
                    <th>{{ __('Guard') }}</th>
                    <th>{{ __('Update date') }}</th>
                    <th>{{ __('Create date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->updated_at }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td style="display: flex;">
                            @can('moderator.edit')
                                <a href="{{ route('admin.role.show', $role->id) }}"
                                   class="updateButton mr-1" title="update" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('moderator.delete')
                                    <form action="{{ route('admin.role.destroy', $role->id) }}" method="post" class="trashForm">
                                        @csrf
                                        @method('DELETE')
                                        <button title="delete" onclick="loader();"><i
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
