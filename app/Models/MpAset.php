<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class MpAset extends Model
{
    use HasFactory;

    protected $table = 'mp_aset';

    protected $fillable = [
        'nama_aset',
        'tanggal_perolehan',
        'jumlah_unit',
        'umur_manfaat',
        'harga_perolehan',
        'akumulasi_penyusutan',
    ];
    protected $appends = ['penyusutan_per_tahun', 'umur_berjalan', 'nilai_buku'];

    // Hitung penyusutan per tahun (garis lurus)
    public function getPenyusutanPerTahunAttribute()
    {
        if (!$this->umur_manfaat || !$this->harga_perolehan) return 0;
        return $this->harga_perolehan / $this->umur_manfaat;
    }

    // Hitung umur berjalan (dalam tahun)
    public function getUmurBerjalanAttribute()
    {
        if (!$this->tanggal_perolehan) return 0;
        return Carbon::parse($this->tanggal_perolehan)->diffInYears(Carbon::now());
    }

    // Hitung nilai buku sekarang
    public function getNilaiBukuAttribute()
    {
        $totalPenyusutan = $this->penyusutan_per_tahun * $this->umur_berjalan;
        $nilaiBuku = $this->harga_perolehan - $totalPenyusutan;
        return max($nilaiBuku, 0); // tidak boleh negatif
    }
}
