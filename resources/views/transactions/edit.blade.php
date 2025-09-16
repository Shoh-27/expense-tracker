@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">✏ Tranzaksiyani tahrirlash</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kind" class="form-label">Turi</label>
                        <select name="kind" id="kind" class="form-select" required>
                            <option value="income" {{ $transaction->kind == 'income' ? 'selected' : '' }}>Daromad</option>
                            <option value="expense" {{ $transaction->kind == 'expense' ? 'selected' : '' }}>Chiqim</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Miqdor (so‘m)</label>
                        <input type="number" name="amount" id="amount" class="form-control"
                               value="{{ $transaction->amount }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategoriya</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $transaction->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Sana</label>
                        <input type="date" name="date" id="date" class="form-control"
                               value="{{ $transaction->date->format('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Izoh</label>
                        <textarea name="note" id="note" rows="3" class="form-control">{{ $transaction->note }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">💾 Yangilash</button>
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">⬅️ Bekor qilish</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
