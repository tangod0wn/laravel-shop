@if(Session::has('success'))
    <div class="flash-message flash-message-success">
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('warning'))
    <div class="flash-message flash-message-warning">
        {{ Session::get('warning') }}
    </div>
@endif