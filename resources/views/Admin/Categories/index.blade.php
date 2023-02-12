@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Add Category</a>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Sources</th>
                <th>Description</th>
                <th>Date added</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categoryList as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->sources->map(fn($item) => $item->name)->implode(", ") }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">change</a> <a href="#">delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $categoryList->links() }}
    </div>
@endsection
