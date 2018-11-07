@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-4 is-offset-4">
            <div class="card mt-5">
                <header class="card-header">
                    <p class="card-header-title">Log in</p>
                </header>
                <div class="card-content">
                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="field">
                            <label for="" class="label">Email:</label>
                            <div class="control">
                                <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email" value="{{ old('email') }}">
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
                                <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" value="{{ old('password') }}">
                            </div>
                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <div class="div control">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <button type="submit" class="button is-primary">Log in</button>
                            </div>
                            {{-- <div class="control">
                                <a class="button is-text" href="{{ route('password.request') }}">Forgot password?</a>
                            </div> --}}
                        </div>

                    </form>
                </div>
            </div>
            <!--card-->
        </div>
    </div>
</div>
@endsection
