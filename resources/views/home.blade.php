@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="column is-12">
        <div class="card mt-5">
            <header class="card-header">
                <p class="card-header-title">
                    Statement of Account
                </p>
                <a href="{{ route('statement.create') }}" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="table__wrapper">
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Total Amount Due</th>
                                <th>Minimum Amount Due</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($statements as $statement)
                                <tr>
                                    <td>{{ $statement->client->name }}</td>
                                    <td>{{ $statement->accountType }} {{ number_format($statement->totalAmount, 2) }}</td>
                                    <td>{{ $statement->accountType }} {{ number_format($statement->minimumAmount, 2) }}</td>
                                    <td>{{ date("m/j/Y",strtotime($statement->dueDate)) }}</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('statement.show', $statement->id) }}" class="has-text-link mr-2">
                                                <span class="icon is-medium">
                                                    <span class="fa-stack">
                                                        <i class="fas fa-circle fa-stack-2x"></i>
                                                        <i class="fas fa-pencil-alt fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0);" data-href="{{route('statement.destroy', $statement->id)}}" class="has-text-danger mr-2 anchor_delete" data-method="delete">
                                                <span class="icon is-medium">
                                                    <span class="fa-stack">
                                                        <i class="fas fa-circle fa-stack-2x is-danger"></i>
                                                        <i class="fas fa-times fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No data available</td>
                                    <td></td>
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
</div>
@endsection

@section('scripts')
@include('partials.notification')
@endsection
