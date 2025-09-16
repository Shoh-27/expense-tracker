@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Yangi tranzaksiya qo‘shish</h2>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="type" class="form-label">Turi</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="income">Daromad</option>
                    <option value="expense">Chiqim</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Miqdor (so‘m)</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategoriya</label>
                <input type="text" name="category" id="category" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Sana</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Izoh</label>
                <textarea name="note" id="note" rows="3" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Saqlash</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Bekor qilish</a>
        </form>
    </div>
@endsection

