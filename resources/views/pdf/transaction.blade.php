<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
</head>
<body>
    <h2>Laporan Transaksi</h2>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaction->date_transaction)->format('d M Y') }}</p>
    <p><strong>Nama:</strong> {{ $transaction->name }}</p>
    <p><strong>Kategori:</strong> {{ $transaction->category->name }}</p>
    <p><strong>Nominal:</strong> Rp {{ number_format($transaction->amount, 0, ',', '.') }}</p>
    <p><strong>Keterangan:</strong> {{ $transaction->note }}</p>
</body>
</html>
