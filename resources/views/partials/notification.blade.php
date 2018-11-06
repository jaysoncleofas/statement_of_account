@if (session('status'))
    <div class="notification is-primary">
        <button class="delete"></button>
        {{ session('status') }}
    </div>
@endif
