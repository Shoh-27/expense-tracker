@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kategoriyani tahrirlash</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nomi</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Turi</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Daromad</option>
                    <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Chiqim</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Yangilash</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Bekor qilish</a>
        </form>
    </div>
@endsection
