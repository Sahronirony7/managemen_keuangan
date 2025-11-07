<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal Transaksi</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Nominal</th>
            <th>Tipe</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $trx)
            <tr>
                <td>{{ $trx->id }}</td>
                <td>{{ $trx->date_transaction }}</td>
                <td>{{ $trx->category->name ?? '-' }}</td>
                <td>{{ $trx->description ?? '-' }}</td>
                <td>{{ number_format($trx->amount, 0, ',', '.') }}</td>
                <td>{{ $trx->category->is_expense ? 'Pengeluaran' : 'Pemasukan' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
