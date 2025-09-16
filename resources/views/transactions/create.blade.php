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
                    <option value="income" {{ old('kind') == 'income' ? 'selected' : '' }}>Daromad</option>
                    <option value="expense" {{ old('kind') == 'expense' ? 'selected' : '' }}>Chiqim</option>
                </select>
            </div>

            {{-- Miqdor --}}
            <div class="mb-3">
                <label for="amount" class="form-label">Miqdor (so‘m)</label>
                <input type="number" step="0.01" name="amount" id="amount"
                       value="{{ old('amount') }}" class="form-control" required>
            </div>

            {{-- Kategoriya --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategoriya</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">-- Kategoriya tanlang --</option>

                    <optgroup label="💰 Daromad kategoriyalari">
                        @foreach($categories->where('type', 'income') as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </optgroup>

                    <optgroup label="💸 Chiqim kategoriyalari">
                        @foreach($categories->where('type', 'expense') as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

            {{-- Sana --}}
            <div class="mb-3">
                <label for="date" class="form-label">Sana</label>
                <input type="date" name="date" id="date" class="form-control"
                       value="{{ old('date', now()->format('Y-m-d')) }}" required>
            </div>

            {{-- Izoh --}}
            <div class="mb-3">
                <label for="note" class="form-label">Izoh</label>
                <textarea name="note" id="note" rows="3" class="form-control">{{ old('note') }}</textarea>
            </div>

            {{-- Tugmalar --}}
            <button type="submit" class="btn btn-success">Saqlash</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Bekor qilish</a>
        </form>
    </div>
@endsection
