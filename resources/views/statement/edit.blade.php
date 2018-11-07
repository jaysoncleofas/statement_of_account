@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="column is-6 is-offset-3">
        <div class="card mt-5">
            <header class="card-header">
                <p class="card-header-title">
                    Edit
                </p>
                <a href="{{ route('statement.show', $statement->id) }}" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <form action="{{ route('statement.store') }}" method="post">
                    @csrf

                    <div class="field">
                        <label for="" class="label">Client</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                                <select name="client" id="client">
                                    <option disabled >Select</option>
                                    @forelse ($clients as $client)
                                        <option {{ $statement->client_id == $client->id ? 'selected' : '' }} value="{{ $client->id }}">{{ $client->name }}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('client'))
                        <p class="help is-danger">
                            {{ $errors->first('client') }}
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="" class="label">Account Type</label>
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="accountType" id="accountType" value="PHP" {{ $statement->accountType == "PHP" ? 'checked' : '' }}>
                                PHP
                            </label>
                            <label class="radio">
                                <input type="radio" name="accountType" id="accountType" value="USD" {{ $statement->accountType == "USD" ? 'checked' : '' }}>
                                USD
                            </label>
                        </div>
                        @if ($errors->has('accountType'))
                        <p class="help is-danger">
                            {{ $errors->first('accountType') }}
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="" class="label">Due Date</label>
                        <div class="control">
                            <input class="input {{$errors->has('dueDate') ? 'is-danger' : ''}}" type="date" name="dueDate" id="dueDate" value="{{ $statement->dueDate }}">
                        </div>
                        @if ($errors->has('dueDate'))
                        <p class="help is-danger">
                            {{ $errors->first('dueDate') }}
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-primary"><i class="fa fa-pencil-alt mr-2"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
