@if (count($errors))
    <div class="notification error closeable">
        @foreach ($errors->all() as $error)
            <p><i class="fal fa-times-circle"></i> {{ $error }}</p>
        @endforeach
        <a class="close"></a>
    </div>
@elseif(Session::has('success'))
    <div class="notification success closeable">
        <p><i class="fad fa-check"></i> {{ Session::get('success') }}</p>
        <a class="close"></a>
    </div>
@endif
