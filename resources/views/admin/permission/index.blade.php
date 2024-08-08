@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Permissions') }}</h5>
                @can('moderator.create')
                    <a href="{{ route('admin.permission.create') }}" class="btn btn-success btn-xs plus"
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
                    <th>{{ __('Permission name') }}</th>
                    <th>{{ __('Group') }}</th>
                    <th>{{ __('Guard') }}</th>
                    <th>{{ __('Update date') }}</th>
                    <th>{{ __('Create date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->group }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->updated_at }}</td>
                        <td>{{ $permission->created_at }}</td>
                        <td style="display: flex;">
                            @can('moderator.edit')
                                <a href="{{ route('admin.permission.show',$permission->id) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('moderator.delete')
                                    <form action="{{ route('admin.permission.destroy', $permission->id) }}" method="post" class="trashForm">
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

