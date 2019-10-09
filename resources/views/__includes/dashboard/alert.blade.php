@if (count($errors))
    <div class="notification error closeable">
        @foreach ($errors->all() as $error)
            <p><i class="fal fa-times-circle"></i> {{ $error }}</p>
        @endforeach
        <a class="close"></a>
    </div>
@endif
