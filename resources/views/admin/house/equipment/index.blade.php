@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Equipments') }}</h5>
                @can('equipment.create', 'admin')
                    <a href="{{ route('admin.equipment.create', $house_id) }}" class="btn btn-success btn-xs plus"
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
                    <th>{{ __('Structure') }}</th>
                    <th></th>
                    <th>Sort</th>
                    <th>{{ __('Create date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->id }}</td>
                        <td>{{ $equipment->translate('ru')->title }}</td>
                        <td>{{ \App\Models\House\Structure\Structure::find($equipment->structure_id)->translate('ru')->name ?? '' }}</td>
                        <td></td>
                        <td>{{ $equipment->sort }}</td>
                        <td>{{ $equipment->created_at }}</td>
                        <td style="display: flex;">
                            @can('equipment.edit', 'admin')
                                <a href="{{ route('admin.equipment.show', $equipment) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('equipment.delete', 'admin')
                                <form action="{{ route('admin.equipment.destroy', $equipment) }}" method="post"
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
