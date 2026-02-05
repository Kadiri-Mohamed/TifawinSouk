<h1>Category Details</h1>

<div>
    <strong>ID:</strong> {{ $category->id }}
</div>
<br>
<div>
    <strong>Name:</strong> {{ $category->name }}
</div>
<br>
<div>
    <strong>Slug:</strong> {{ $category->slug }}
</div>
<br>
<div>
    <strong>Description:</strong> {{ $category->description }}
</div>

<br>
<a href="{{ route('admin.categories.edit', $category) }}">Edit</a> |
<a href="{{ route('admin.categories.index') }}">Back to List</a>