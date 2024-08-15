@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Partners</h5>
                @can('partners.create', 'admin')
                    <a href="{{ route('admin.partner.create') }}" class="btn btn-success btn-xs plus"
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
                    <th width="13%">{{ __('Image') }}</th>
                    <th> {{ __('Status') }}</th>
                    <th> {{ __('Sort') }}</th>
                    <th ></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td>{{ $partner->id }}</td>
                        <td><img src="{{ asset($partner->image ?? '') }}" width="100%" height="100px" style="object-fit: contain"></td>
                        <td>{!! $partner->active ? '<p style="color:green;">Active</p>' : '<p style="color:red;">Dective</p>' !!}</td>
                        <td>{{$partner->sort}}</td>
                        <td class="d-flex justify-content-center">
                            @can('partners.edit', 'admin')
                                <a href="{{ route('admin.partner.show', $partner) }}"
                                   class="updateButton mr-1" title="update" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('partners.delete', 'admin')
                                <form action="{{ route('admin.partner.destroy', $partner) }}" method="post"
                                      class="trashForm">
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
