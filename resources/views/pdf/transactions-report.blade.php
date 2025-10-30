<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background: #f0f0f0; }
        .text-right { text-align: right; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>{{ $title }}</h2>
    <p>Tanggal Cetak: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Nominal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $r)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($r->date_transaction)->format('d/m/Y') }}</td>
                    <td>{{ $r->category->name ?? '-' }}</td>
                    <td>{{ $r->name }}</td>
                    <td class="text-right">{{ number_format($r->amount, 0, ',', '.') }}</td>
                    <td>{{ $r->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    @php
        $pemasukan = $records->filter(fn($r) => !$r->category->is_expense)->sum('amount');
        $pengeluaran = $records->filter(fn($r) => $r->category->is_expense)->sum('amount');
        $saldo = $pemasukan - $pengeluaran;
    @endphp

    <p><strong>Total Pemasukan:</strong> Rp {{ number_format($pemasukan, 0, ',', '.') }}</p>
    <p><strong>Total Pengeluaran:</strong> Rp {{ number_format($pengeluaran, 0, ',', '.') }}</p>
    <p><strong>Saldo Akhir:</strong> Rp {{ number_format($saldo, 0, ',', '.') }}</p>
</body>
</html>
