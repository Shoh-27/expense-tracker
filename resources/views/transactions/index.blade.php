@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Transactionlar</h2>

        <div class="mb-3">
            <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Yangi</a>
        </div>

        <p><strong>Balans:</strong> {{ $balance }} | <strong>Daromad:</strong> {{ $income }} | <strong>Chiqim:</strong> {{ $expense }}</p>

        <table class="table">
            <thead><tr><th>Sana</th><th>Kategoriya</th><th>Tur</th><th>Summа</th><th>Izoh</th><th>Amallar</th></tr></thead>
            <tbody>
            @foreach($transactions as $t)
                <tr>
                    <td>{{ $t->date->format('Y-m-d') }}</td>
                    <td>{{ $t->category->name }}</td>
                    <td>{{ $t->kind }}</td>
                    <td>{{ $t->amount }}</td>
                    <td>{{ $t->note }}</td>
                    <td>
                        <a href="{{ route('transactions.edit',$t) }}" class="btn btn-sm btn-warning">✏</a>
                        <form action="{{ route('transactions.destroy',$t) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('O‘chirasizmi?')">🗑</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $transactions->links() }}
    </div>
@endsection

