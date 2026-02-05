<h1>Edit Category</h1>

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
    </div>
    <br>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
    </div>
    <br>
    <button type="submit">Update</button>
</form>

<a href="{{ route('admin.categories.index') }}">Back to List</a>