{{-- @if (session('status'))
    <div class="notification is-primary">
        <button class="delete"></button>
        {{ session('status') }}
    </div>
@endif --}}
@if (session('status'))
    <script>
        $(function() {
            // swal("{!! ucwords(session('type')) !!}!","{!! session('status') !!}", "{!! session('type') !!}");
            // toastr["{!! session('type') !!}"]("{!! session('status') !!}")
            swal({
                title: '{!! ucwords(session('status')) !!}!',
                // text: '{!! session('status') !!}',
                type: '{!! session('type') !!}',
                confirmButtonText: 'Ok'
            })
        });
    </script>
@endif