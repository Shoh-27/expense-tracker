@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Yangi kategoriya qo‘shish</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nomi</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Turi</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="income">Daromad</option>
                    <option value="expense">Chiqim</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Saqlash</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Bekor qilish</a>
        </form>
    </div>
@endsection
