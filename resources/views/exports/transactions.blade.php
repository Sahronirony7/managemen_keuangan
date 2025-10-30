<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Transaksi</th>
            <th>Kategori</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $t)
            <tr>
                <td>{{ \Carbon\Carbon::parse($t->date_transaction)->format('d/m/Y') }}</td>
                <td>{{ $t->name }}</td>
                <td>{{ $t->category->name ?? '-' }}</td>
                <td>{{ $t->category->is_expense ? 'Pengeluaran' : 'Pemasukan' }}</td>
                <td>{{ number_format($t->amount, 0, ',', '.') }}</td>
                <td>{{ $t->note }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
