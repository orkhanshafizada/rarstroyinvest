@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('News') }}</h5>
                @can('news.create', 'admin')
                    <a href="{{ route('admin.news.create') }}" class="btn btn-success btn-xs plus"
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
                    <th width="20%">{{ __('Main Image') }}</th>
                    <th width="25%">{{ __('Title') }}</th>
                    <th width="15%"></th>
                    <th width="20%">{{ __('How many clicks') }}</th>
                    <th width="10%">{{ __('Create date') }}</th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($newses as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td><img src="/{{ $news->main_image ?? ''}}" width="100%" height="100px" style="object-fit: contain;"></td>
                        <td>{{ $news->translate('ru')->title }}</td>
                        <td>
                            <a href="{{ route('admin.gallery.index', [$news->id, 2, 'default']) }}" class="btn btn-warning">
                                <i class="icon-paste2"></i> {{ __('Gallery') }}
                            </a>
                        </td>
                        <td>{{ $news->show }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td style="display: flex;">
                            @can('news.edit', 'admin')
                                <a href="{{ route('admin.news.show', $news) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-pencil7"></i></a>
                            @endcan
                            @can('news.delete', 'admin')
                                <form action="{{ route('admin.news.destroy', $news) }}" method="post"
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
