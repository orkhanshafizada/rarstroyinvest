@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Faqs') }}</h5>
                @can('faqs.create', 'admin')
                    <a href="{{ route('admin.faq.create') }}" class="btn btn-success btn-xs plus"
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
                    <th>Sort</th>
                    <th>{{ __('Create date') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->id }}</td>
                        <td>{{ $faq->translate(app()->getLocale())->title }}</td>
                        <td></td>
                        <td>{{ $faq->sort }}</td>
                        <td>{{ $faq->created_at }}</td>
                        <td style="display: flex;">
                            @can('faqs.edit', 'admin')
                                <a href="{{ route('admin.faq.show', $faq) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('faqs.delete', 'admin')
                                <form action="{{ route('admin.faq.destroy', $faq) }}" method="post"
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
