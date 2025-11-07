<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi {{ now()->format('d-M-Y H_i') }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        .header img {
            width: 50px;
            height: 50px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
        tr:nth-child(even) {
            background: #fafafa;
        }
        .summary {
            margin-top: 25px;
            width: 60%;
            border: 1px solid #aaa;
            padding: 10px;
        }
        .summary h4 {
            margin: 0;
            margin-bottom: 5px;
        }
        .footer {
            text-align: right;
            font-size: 10px;
            margin-top: 40px;
            color: #555;
        }
    </style>
</head>
<body>
    <div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ public_path('images/logo.png') }}" alt="Logo Yayasan" width="60" style="vertical-align: middle; margin-right:10px;">
    <h2 style="display:inline-block; vertical-align: middle; margin:0;">
        Laporan Transaksi Keuangan Kas<br>
        <span style="font-size:14px;">Yayasan AQU Humanity Indonesia</span>
    </h2>
</div>


    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 20%">Nama Transaksi</th>
                <th style="width: 15%">Kategori</th>
                <th style="width: 10%">Tipe</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 15%">Jumlah</th>
                <th style="width: 20%">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $index => $t)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $t->name }}</td>
                    <td>{{ $t->category->name ?? '-' }}</td>
                    <td>
                        @if ($t->category && $t->category->is_expense)
                            <span style="color: red;">Pengeluaran</span>
                        @else
                            <span style="color: green;">Pemasukan</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($t->date_transaction)->format('d M Y') }}</td>
                    <td>Rp {{ number_format($t->amount, 0, ',', '.') }}</td>
                    <td>{{ $t->note ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <h4>Ringkasan:</h4>
        <p><strong>Total Pemasukan:</strong> Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
        <p><strong>Total Pengeluaran:</strong> Rp {{ number_format($totalExpense, 0, ',', '.') }}</p>
        <p><strong>Saldo Akhir:</strong> Rp {{ number_format($balance, 0, ',', '.') }}</p>
    </div>

    <div class="footer">
        Dicetak pada: {{ now()->format('d M Y H:i') }}
    </div>
</body>
</html>
