@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">📊 Transactionlar</h2>
            <a href="{{ route('transactions.create') }}" class="btn btn-success">+ Yangi qo‘shish</a>
            <a href="{{ route('transactions.statistics') }}" class="btn btn-info">📊 Statistika</a>
        </div>

        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">💰 Balans</h5>
                        <p class="card-text fs-4">{{ number_format($balance, 0, ',', ' ') }} so‘m</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">⬆️ Daromad</h5>
                        <p class="card-text fs-4">{{ number_format($income, 0, ',', ' ') }} so‘m</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger">⬇️ Chiqim</h5>
                        <p class="card-text fs-4">{{ number_format($expense, 0, ',', ' ') }} so‘m</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Sana</th>
                        <th>Kategoriya</th>
                        <th>Tur</th>
                        <th>Summа</th>
                        <th>Izoh</th>
                        <th class="text-center">Amallar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($transactions as $t)
                        <tr>
                            <td>{{ $t->date->format('Y-m-d') }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $t->category->name }}</span>
                            </td>
                            <td>
                                @if($t->kind == 'income')
                                    <span class="badge bg-success">Daromad</span>
                                @else
                                    <span class="badge bg-danger">Chiqim</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ number_format($t->amount, 0, ',', ' ') }}</strong> so‘m
                            </td>
                            <td>{{ $t->note }}</td>
                            <td class="text-center">
                                <a href="{{ route('transactions.edit', $t) }}" class="btn btn-sm btn-warning">✏ Tahrirlash</a>
                                <form action="{{ route('transactions.destroy', $t) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Haqiqatan o‘chirmoqchimisiz?')">🗑 O‘chirish</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Hech qanday transaction topilmadi</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $transactions->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
