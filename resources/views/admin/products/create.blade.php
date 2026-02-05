<h1>Create Category</h1>

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <br>
    <div>
        <label for="slug">Slug:</label><br>
        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required>
    </div>
    <br>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>
    <br>
    <button type="submit">Create</button>
</form>

<a href="{{ route('admin.categories.index') }}">Back to List</a>