@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-4 is-offset-4">
            <div class="card mt-5">
                <header class="card-header">
                    <p class="card-header-title">Register</p>
                </header>
                <div class="card-content">
                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="field">
                            <label for="" class="label">Name:</label>
                            <div class="control">
                                <input class="input {{$errors->has('name') ? 'is-danger' : ''}}" type="text" name="name" value="{{ old('name') }}">
                            </div>
                            @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="" class="label">Email:</label>
                            <div class="control">
                                <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="" class="label">Password:</label>
                            <div class="control">
                                <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" value="{{ old('password') }}">
                            </div>
                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="" class="label">Confirm Password:</label>
                            <div class="control">
                                <input id="password-confirm" class="input" type="password" name="password_confirmation">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
