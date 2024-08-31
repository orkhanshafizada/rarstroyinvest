@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Sliders</h5>
                @can('slider.create', 'admin')
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-success btn-xs plus"
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
                    <th> {{ __('Title') }}</th>
                    <th> {{ __('Status') }}</th>
                    <th> {{ __('Sort') }}</th>
                    <th >{{ __('Type') }}</th>
                    <th ></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td><img src="{{ asset('storage/'.$slider->image ?? '') }}" width="100%" height="100px"></td>
                        <td>{{$slider->translate('ru')->title}}</td>
                        <td>{!! $slider->active ? '<p class="text-success">Active</p>' : '<p class="text-danger">Deactive</p>' !!}</td>
                        <td>{{$slider->sort}}</td>
                        <td>{{ $slider->type == 1 ? __('Content') : __('Link') }}</td>
                        <td class="d-flex justify-content-center">
                            @can('slider.edit', 'admin')
                                <a href="{{ route('admin.slider.show', $slider) }}"
                                   class="updateButton mr-1" title="update" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('slider.delete', 'admin')
                                <form action="{{ route('admin.slider.destroy', $slider) }}" method="post"
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
