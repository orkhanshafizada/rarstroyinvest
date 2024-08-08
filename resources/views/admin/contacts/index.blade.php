@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Contact') }}</h5>
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
                    <th width="20%">{{ __('Name') }}</th>
                    <th width="15%">{{ __('E-mail') }}</th>
                    <th width="15%">{{ __('Message') }}</th>
                    <th width="15%">{{ __('Status') }}</th>
                    <th width="15%">{{ __('Create date') }}</th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{!! $contact->name !!}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{!! $contact->message !!}</td>
                        <td>{{ $contact->read ? "Readed" : "Unreaded" }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td style="display: flex;">
                            @can('contacts.edit', 'admin')
                                <a href="{{ route('admin.contact.show', $contact) }}"
                                   class="updateButton mr-1" title="show" onclick="loader();"><i
                                        class="icon-eye"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
