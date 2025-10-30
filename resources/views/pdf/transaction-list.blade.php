<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #888; padding: 6px 10px; text-align: left; }
        h2 { text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <tr><th>Tanggal</th><td>{{ $transaction->date_transaction->format('d M Y') }}</td></tr>
        <tr><th>Nama Transaksi</th><td>{{ $transaction->name }}</td></tr>
        <tr><th>Kategori</th><td>{{ $transaction->category->name }}</td></tr>
        <tr><th>Nominal</th><td>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td></tr>
        <tr><th>Keterangan</th><td>{{ $transaction->note }}</td></tr>
    </table>
</body>
</html>
