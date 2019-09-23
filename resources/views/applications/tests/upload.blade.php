<form action="/uploads" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
​
    @if ($errors)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
​
    <p>
        <label for="photo">
            <input type="file" name="photo" id="photo">
        </label>
    </p>
    <button>Upload</button>
</form>