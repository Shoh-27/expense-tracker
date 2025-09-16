@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">📊 Statistika</h2>

        {{-- Balans kartalari --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Daromad</h5>
                        <h3>{{ number_format($income, 0, '.', ' ') }} so‘m</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Chiqim</h5>
                        <h3>{{ number_format($expense, 0, '.', ' ') }} so‘m</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Balans</h5>
                        <h3>{{ number_format($balance, 0, '.', ' ') }} so‘m</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grafiklar --}}
        <div class="row">
            {{-- Oylik daromad va chiqim --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <strong>Oylik daromad va chiqim</strong>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            {{-- Kategoriyalar bo‘yicha chiqim --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <strong>Kategoriyalar bo‘yicha chiqim</strong>
                    </div>
                    <div class="card-body">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">⬅ Orqaga</a>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Backenddan kelgan ma’lumotlar
        const monthlyLabels = @json($monthly->pluck('month'));
        const incomeData = @json($monthly->pluck('income'));
        const expenseData = @json($monthly->pluck('expense'));

        const categoryLabels = @json($categories->pluck('name'));
        const categoryData = @json($categories->pluck('total'));

        // Oylik daromad va chiqim (Line Chart)
        new Chart(document.getElementById('monthlyChart'), {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [
                    {
                        label: 'Daromad',
                        data: incomeData,
                        borderColor: 'rgba(34,197,94,1)',
                        backgroundColor: 'rgba(34,197,94,0.2)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Chiqim',
                        data: expenseData,
                        borderColor: 'rgba(239,68,68,1)',
                        backgroundColor: 'rgba(239,68,68,0.2)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Kategoriyalar bo‘yicha chiqim (Doughnut Chart, kichikroq)
        new Chart(document.getElementById('categoryChart'), {
            type: 'doughnut',
            data: {
                labels: categoryLabels,
                datasets: [{
                    data: categoryData,
                    backgroundColor: [
                        '#f87171','#60a5fa','#34d399',
                        '#fbbf24','#a78bfa','#f472b6',
                        '#38bdf8','#facc15','#fb923c'
                    ],
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 1.2, // defaultdan kichikroq qildik
                plugins: { legend: { position: 'bottom' } }
            }
        });
    </script>
@endsection
