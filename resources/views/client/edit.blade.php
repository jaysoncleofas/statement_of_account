@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="column is-6 is-offset-3">
        <div class="card mt-5">
            <header class="card-header">
                <p class="card-header-title">
                    Update Client
                </p>
                <a href="{{ route('client.index') }}" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <form action="{{ route('client.update', $client->id) }}" method="post">
                    @csrf @method('put')

                    <div class="field">
                        <label for="" class="label">Name:</label>
                        <div class="control">
                            <input class="input" type="text" name="name" id="name" value="{{ $client->name }}">
                        </div>
                        @if ($errors->has('name'))
                        <p class="help is-danger">
                            {{ $errors->first('name') }}
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="" class="label">Billing Address</label>
                        <div class="control">
                            <input class="input" type="text" name="billingAddress" id="billingAddress" value="{{ $client->address }}">
                        </div>
                        @if ($errors->has('billingAddress'))
                        <p class="help is-danger">
                            {{ $errors->first('billingAddress') }}
                        </p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="" class="label">Contact No.</label>
                        <div class="control">
                            <input class="input" type="text" name="contactNumber" id="contactNumber" value="{{ $client->contact }}">
                        </div>
                        @if ($errors->has('contactNumber'))
                        <p class="help is-danger">
                            {{ $errors->first('contactNumber') }}
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
