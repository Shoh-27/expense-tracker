<table>
    <thead>
    <tr>
        <th>Sana</th>
        <th>Kategoriya</th>
        <th>Tur</th>
        <th>Summа</th>
        <th>Izoh</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $t)
        <tr>
            <td>{{ $t->date->format('Y-m-d') }}</td>
            <td>{{ $t->category->name }}</td>
            <td>{{ $t->kind == 'income' ? 'Daromad' : 'Chiqim' }}</td>
            <td>{{ $t->amount }}</td>
            <td>{{ $t->note }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

