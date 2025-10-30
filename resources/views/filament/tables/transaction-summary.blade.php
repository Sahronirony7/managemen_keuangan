<div class="p-4 border-t bg-gray-50 dark:bg-gray-800 rounded-b-xl mt-2">
    <div class="flex flex-col md:flex-row justify-between text-sm md:text-base">
        <div class="font-semibold text-green-600">
            Total Pemasukan: Rp {{ number_format($pemasukan, 0, ',', '.') }}
        </div>
        <div class="font-semibold text-red-600">
            Total Pengeluaran: Rp {{ number_format($pengeluaran, 0, ',', '.') }}
        </div>
        <div class="font-bold text-blue-600">
            Saldo Akhir: Rp {{ number_format($saldo, 0, ',', '.') }}
        </div>
    </div>
</div>
