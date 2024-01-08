@extends('layout')

@section('main')
    <div class="container">
        <h2>Users</h2>
        <div class="table-wrapper">
            {!! $table !!}
        </div>
        <button id="load-more-btn" style="margin: 10px 0 calc(10px - 0.5em);">Load more</button>
        <hr>
        <h2>Create</h2>
        <form id="create-user-form">
            <p>
                <label for="name">Name:</label><br>
                <input type="text" name="name" required>
            </p>
            <p>
                <label for="city">City:</label><br>
                <input type="text" name="city" required>
            </p>
            <p>
                <label for="image">Image:</label><br>
                <input id="file-input" type="file" name="images[]" multiple accept="image/*">
            </p>
            <button type="submit">Create User</button>
        </form>
    </div>
    <script>
        var route_get_users = '{{ route('api.users') }}';
        var route_create_user = '{{ route('api.create') }}';
        var route_load_content = '{{ route('table_load_content') }}';
    </script>
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection