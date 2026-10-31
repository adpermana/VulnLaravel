<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';

    protected $fillable = [
        'user_id', 'nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'email', 'no_hp', 'pendidikan_terakhir',
        'asal_sekolah', 'pilihan_prodi_1', 'pilihan_prodi_2',
        'foto', 'dokumen', 'status_pendaftaran', 'catatan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
