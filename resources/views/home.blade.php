@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="column is-4 is-offset-4">
        @include('partials.notification')

        You are logged in!
    </div>       
</div>
@endsection
