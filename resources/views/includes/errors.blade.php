@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled p-0 m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif