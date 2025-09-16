@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Yangi tranzaksiya qo‘shish</h2>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            {{-- Turi --}}
            <div class="mb-3">
                <label for="kind" class="form-label">Turi</label>
                <select name="kind" id="kind" class="form-select" required>
                    <option value="income">Daromad</option>
                    <option value="expense">Chiqim</option>
                </select>
            </div>

            {{-- Miqdor --}}
            <div class="mb-3">
                <label for="amount" class="form-label">Miqdor (so‘m)</label>
                <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
            </div>

            {{-- Kategoriya --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategoriya</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">-- Kategoriya tanlang --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                            ({{ $category->type == 'income' ? 'Daromad' : 'Chiqim' }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Sana --}}
            <div class="mb-3">
                <label for="date" class="form-label">Sana</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            {{-- Izoh --}}
            <div class="mb-3">
                <label for="note" class="form-label">Izoh</label>
                <textarea name="note" id="note" rows="3" class="form-control"></textarea>
            </div>

            {{-- Tugmalar --}}
            <button type="submit" class="btn btn-success">Saqlash</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Bekor qilish</a>
        </form>
    </div>
@endsection
