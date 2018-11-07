@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="column is-12">
        <div class="card mt-5">
            <header class="card-header">
                <p class="card-header-title">
                    Show
                </p>
                <a href="{{ route('statement.edit', $statement->id) }}" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="columns">
                    <div class="column is-two-fifths">
                        <div class="field">
                            <label for="" class="label">Name: <span class="has-text-weight-normal">{{
                                    $statement->client->name }}</span></label>
                        </div>

                        <div class="field">
                            <label for="" class="label">Billing Address: <span class="has-text-weight-normal">{{
                                    $statement->client->address }}</span></label>
                        </div>

                        <div class="field">
                            <label for="" class="label">Contact No.: <span class="has-text-weight-normal">{{
                                    $statement->client->contact }}</span></label>
                        </div>
                    </div>

                    <div class="column is-two-fifths">
                        <div class="field">
                            <label for="" class="label">Account Type: <span class="has-text-weight-normal">{{
                                    $statement->accountType }}</span></label>
                        </div>

                        <div class="field">
                            <label for="" class="label">Total Amount Due: <span class="has-text-weight-normal">{{
                                    number_format($statement->totalAmount, 2) }}</span></label>
                        </div>

                        <div class="field">
                            <label for="" class="label">Minimum Amount Due: <span class="has-text-weight-normal">{{
                                    number_format($statement->minimumAmount, 2) }}</span></label>
                        </div>

                        <div class="field">
                            <label for="" class="label">Due Date: <span class="has-text-weight-normal">{{
                                    date("m/d/Y",strtotime($statement->dueDate)) }}</span></label>
                        </div>
                    </div>
                </div>

                <a href="{{ route('statement.viewOne', $statement->id) }}" target="_blank" class="button is-primary">View 1</a>
                <a href="{{ route('statement.viewTwo', $statement->id) }}" target="_blank" class="button is-link">View 2</a>
                <a href="{{ route('statement.viewThree', $statement->id) }}" target="_blank" class="button is-info">View 3</a>

                <table class="table table is-bordered is-striped is-narrow is-hoverable is-fullwidth mt-3">
                    <thead class="has-background-info">
                        <tr>
                            <th class="has-text-white">Date</th>
                            <th class="has-text-white">Particulars</th>
                            <th class="has-text-white">Covered Date</th>
                            <th class="has-text-white">Balance</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($statement->particulars as $particular)
                        <tr>
                            <td>{{ date("m/d/Y",strtotime($particular->date)) }}</td>
                            <td>{{ $particular->description }}</td>
                            <td>{{ date("m/d/Y",strtotime($particular->fromDate)) }} to {{
                                date("m/d/Y",strtotime($particular->toDate)) }}</td>
                            <td>P {{ number_format($particular->balance, 2) }}</td>
                            <td>
                                <a href="javascript:void(0);" data-href="{{route('particular.destroy', $particular->id)}}" class="has-text-danger mr-2 anchor_delete" data-method="delete">
                                    <span class="icon is-medium">
                                        <span class="fa-stack">
                                            <i class="fas fa-circle fa-stack-2x is-danger"></i>
                                            <i class="fas fa-times fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </span>
                                </a>
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

                <div class="column is-6">
                    <div class="card mt-5">
                        <div class="card-header">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Add Particulars
                                </p>
                                {{-- <a href="{{ route('client.index') }}" class="card-header-icon" aria-label="more options">
                                    <span class="icon">
                                        <i class="fas fa-arrow-left" aria-hidden="true"></i>
                                    </span>
                                </a> --}}
                            </header>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('particular.store', $statement->id) }}" method="post">
                                @csrf
    
                                <div class="field">
                                    <label for="" class="label">Date</label>
                                    <div class="control">
                                        <input class="input {{$errors->has('date') ? 'is-danger' : ''}}" type="date" name="date" id="date" value="{{ old('date') }}">
                                    </div>
                                    @if ($errors->has('date'))
                                    <p class="help is-danger">
                                        {{ $errors->first('date') }}
                                    </p>
                                    @endif
                                </div>
    
                                <div class="field">
                                    <label for="" class="label">Particulars</label>
                                    <div class="control">
                                        <input class="input {{$errors->has('particulars') ? 'is-danger' : ''}}" type="text" name="particulars" id="particulars" value="{{ old('particulars') }}">
                                    </div>
                                    @if ($errors->has('particulars'))
                                    <p class="help is-danger">
                                        {{ $errors->first('particulars') }}
                                    </p>
                                    @endif
                                </div>
    
                                <div class="field">
                                    <label for="" class="label">Coverd Date</label>
                                    <div class="columns">
                                        <div class="column">
                                            <div class="field">
                                                <label for="" class="label">From</label>
                                                <div class="control">
                                                    <input class="input {{$errors->has('fromDate') ? 'is-danger' : ''}}" type="date" name="fromDate" id="fromDate" value="{{ old('fromDate') }}">
                                                </div>
                                                @if ($errors->has('fromDate'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('fromDate') }}
                                                </p>
                                                @endif
                                            </div>
    
                                        </div>
                                        <div class="column">
                                            <div class="field">
                                                <label for="" class="label">To</label>
                                                <div class="control">
                                                    <input class="input {{$errors->has('toDate') ? 'is-danger' : ''}}" type="date" name="toDate" id="toDate" value="{{ old('toDate') }}">
                                                </div>
                                                @if ($errors->has('toDate'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('toDate') }}
                                                </p>
                                                @endif
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
    
                                <div class="field">
                                    <label for="" class="label">Balance</label>
                                    <div class="control">
                                        <input class="input {{$errors->has('balance') ? 'is-danger' : ''}}" type="number" name="balance" id="balance" value="{{ old('balance') }}">
                                    </div>
                                    @if ($errors->has('balance'))
                                    <p class="help is-danger">
                                        {{ $errors->first('balance') }}
                                    </p>
                                    @endif
                                </div>
    
                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-primary"><i class="fa fa-save mr-2"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@include('partials.notification')
@endsection
