@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Moderators') }}</h5>
                @can('moderator.create', 'admin')
                    <a href="{{ route('admin.moderator.create') }}" class="btn btn-success btn-xs plus"
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
                    <th width="5%" data-field="id.count" data-sortable="true">№</th>
                    <th width="20%">{{ __('Fullname') }}</th>
                    <th width="20%">{{ __('Username') }}</th>
                    <th width="10%">{{ __('Role') }}</th>
                    <th width="15%">{{ __('Update date') }}</th>
                    <th width="15%">{{ __('Create date') }}</th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($moderators as $moderator)
                    <tr>
                        <td>{{ $moderator->id }}</td>
                        <td>{{ $moderator->fullname }}</td>
                        <td>{{ $moderator->email }}</td>
                        <td>{{ $moderator->roles->first()->name ?? "" }}
                        </td>
                        <td>{{ $moderator->updated_at }}</td>
                        <td>{{ $moderator->created_at }}</td>
                        <td style="display: flex;">
                            @can('moderator.edit', 'admin')
                                <a href="{{ route('admin.moderator.show', $moderator->id) }}"
                                   class="updateButton mr-1" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('moderator.delete', 'admin')
                                <form action="{{ route('admin.moderator.destroy', $moderator->id) }}" method="post"
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
