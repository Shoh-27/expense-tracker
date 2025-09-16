@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kategoriyalar</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">+ Yangi kategoriya</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nomi</th>
                <th>Turi</th>
                <th>Amallar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->type == 'income')
                            <span class="badge bg-success">Daromad</span>
                        @else
                            <span class="badge bg-danger">Chiqim</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">✏ Tahrirlash</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Rostan ham o‘chirasizmi?')">🗑 O‘chirish</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Kategoriya yo‘q</td></tr>
            @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
@endsection
