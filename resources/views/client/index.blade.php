@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="column is-10 is-offset-1">
        @include('partials.notification')

        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Clients
                </p>
                <a href="{{ route('client.create') }}" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <table class="table table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Billing Address</th>
                            <th>Contact No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->contact }}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td>No data available</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
