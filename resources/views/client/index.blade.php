@extends('layouts.app')

{{-- @section('styles')
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection --}}

@section('content')
<div class="container mt-5">
    <div class="column is-12">
        <div class="card mt-5">
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
                <div class="table__wrapper">
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" id="example">
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
                                    <td>
                                        <div class="buttons">
                                            <a href="{{ route('client.edit', $client->id) }}" class="has-text-link mr-2">
                                                <span class="icon is-medium">
                                                    <span class="fa-stack">
                                                        <i class="fas fa-circle fa-stack-2x"></i>
                                                        <i class="fas fa-pencil-alt fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0);" data-href="{{route('client.destroy', $client->id)}}" class="has-text-danger mr-2 anchor_delete" data-method="delete">
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
{{-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script> --}}
@endsection