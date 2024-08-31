@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Houses') }}</h5>
                @can('house.create', 'admin')
                    <a href="{{ route('admin.house.create') }}" class="btn btn-success btn-xs plus"
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
                    <th width="20%">{{ __('Main Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th></th>
                    <th></th>
                    <th>Status</th>
                    <th>{{ __('Create date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($houses as $house)
                    <tr>
                        <td>{{ $house->id }}</td>
                        <td><img src="{{ get_file_url($house->main_image) }}" width="100%" height="100px"
                                 style="object-fit: contain;"></td>
                        <td>{{ $house->translate('ru')->name }}</td>
                        <td>
                            <a href="{{ route('admin.equipment.index', [$house->id]) }}"
                               class="btn btn-danger">
                                <i class="icon-paste2"></i> {{ __('Equipments') }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.gallery.index', [$house->id, 3, 'default']) }}"
                               class="btn btn-warning">
                                <i class="icon-paste2"></i> {{ __('Gallery') }}
                            </a>
                            <a href="{{ route('admin.gallery.index', [$house->id, 3, 'layout']) }}"
                               class="btn btn-primary">
                                <i class="icon-paste2"></i> {{ __('Layout') }}
                            </a>
                            <a href="{{ route('admin.gallery.index', [$house->id, 3, 'facade']) }}"
                               class="btn btn-success mt-1">
                                <i class="icon-paste2"></i> {{ __('Facade') }}
                            </a>
                        </td>
                        <td>{!! $house->active ? '<p class="text-success">Active</p>' : '<p class="text-danger">Deactive</p>' !!}</td>
                        <td>{{ $house->created_at }}</td>
                        <td style="display: flex;">
                            @can('house.edit', 'admin')
                                <a href="{{ route('admin.house.show', $house) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('house.delete', 'admin')
                                <form action="{{ route('admin.house.destroy', $house) }}" method="post"
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
