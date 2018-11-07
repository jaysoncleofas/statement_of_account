@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="column is-6 is-offset-3">
        <div class="card mt-5">
            <header class="card-header">
                <p class="card-header-title">
                    Add Statement of Account
                </p>
                <a href="{{ route('home') }}" class="card-header-icon" aria-label="more options">
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
                                    <option selected disabled>Select</option>
                                    @forelse ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
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
                                <input type="radio" name="accountType" id="accountType" value="PHP">
                                PHP
                            </label>
                            <label class="radio">
                                <input type="radio" name="accountType" id="accountType" value="USD">
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
                            <input class="input" type="date" name="dueDate" id="dueDate" value="{{ old('dueDate') }}">
                        </div>
                        @if ($errors->has('dueDate'))
                        <p class="help is-danger">
                            {{ $errors->first('dueDate') }}
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
@endsection
