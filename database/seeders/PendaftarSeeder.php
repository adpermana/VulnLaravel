<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('username', 'user01')->first();
        $userId = $user ? $user->id : 2;

        $firstNames = [
            'Budi', 'Siti', 'Dian', 'Andi', 'Rina', 'Agus', 'Dewi', 'Rizky', 'Putri',
            'Fajar', 'Nur', 'Hendra', 'Maya', 'Rudi', 'Lestari', 'Bayu', 'Indah',
            'Yoga', 'Sinta', 'Arif', 'Wulan', 'Dimas', 'Ayu', 'Bambang', 'Citra',
            'Eko', 'Ratna', 'Hadi', 'Fitri', 'Galih', 'Intan', 'Joko', 'Kartika',
            'Lukman', 'Mega', 'Nanda', 'Oki', 'Puspita', 'Rahmat', 'Sari',
            'Taufik', 'Umar', 'Vina', 'Wahyu', 'Yuni', 'Zaki', 'Ahmad', 'Bella',
            'Cinta', 'Dedi',
        ];

        $lastNames = [
            'Santoso', 'Rahmawati', 'Permata', 'Wijaya', 'Kusuma', 'Nugroho',
            'Saputra', 'Pratama', 'Hidayat', 'Setiawan', 'Anggraini', 'Maulana',
            'Purnama', 'Utami', 'Firmansyah', 'Halim', 'Iskandar', 'Kurniawan',
            'Lestari', 'Maharani',
        ];

        $cities = [
            'Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Medan',
            'Semarang', 'Makassar', 'Denpasar', 'Palembang', 'Malang',
        ];

        $streets = [
            'Jl. Merdeka', 'Jl. Sudirman', 'Jl. Diponegoro', 'Jl. Ahmad Yani',
            'Jl. Gajah Mada', 'Jl. Melati', 'Jl. Mawar', 'Jl. Kenanga',
            'Jl. Cendrawasih', 'Jl. Pahlawan',
        ];

        $sekolah = [
            'SMA Negeri 1', 'SMA Negeri 2', 'SMA Negeri 3', 'SMA Negeri 5',
            'SMK Negeri 1', 'SMK Negeri 2', 'SMA Islam Al-Azhar',
            'SMA Katolik Santo Yoseph',
        ];

        $pendidikan = ['SMA/SMK', 'D1', 'D2', 'D3', 'S1'];

        $prodi = [
            'Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro',
            'Manajemen', 'Akuntansi', 'Hukum',
        ];

        $statuses = ['menunggu', 'diverifikasi', 'diterima', 'ditolak'];

        for ($i = 1; $i <= 50; $i++) {
            $nama = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];

            $nik = '3276' . str_pad((string) (100000000000 + $i), 12, '0', STR_PAD_LEFT);

            $prodi1 = $prodi[array_rand($prodi)];
            do {
                $prodi2 = $prodi[array_rand($prodi)];
            } while ($prodi2 === $prodi1);

            $status = $statuses[array_rand($statuses)];

            $data = [
                'user_id' => $userId,
                'nama_lengkap' => $nama,
                'tempat_lahir' => $cities[array_rand($cities)],
                'tanggal_lahir' => sprintf('%04d-%02d-%02d', rand(2005, 2008), rand(1, 12), rand(1, 28)),
                'jenis_kelamin' => ['L', 'P'][array_rand([0, 1])],
                'alamat' => $streets[array_rand($streets)] . ' No. ' . rand(1, 200),
                'email' => 'pendaftar' . $i . '@example.com',
                'no_hp' => '08' . rand(100000000, 999999999),
                'pendidikan_terakhir' => $pendidikan[array_rand($pendidikan)],
                'asal_sekolah' => $sekolah[array_rand($sekolah)],
                'pilihan_prodi_1' => $prodi1,
                'pilihan_prodi_2' => $prodi2,
                'status_pendaftaran' => $status,
                'catatan' => in_array($status, ['diterima', 'ditolak'], true)
                    ? ($status === 'diterima' ? 'Selamat, Anda diterima.' : 'Maaf, Anda belum diterima.')
                    : null,
            ];

            Pendaftar::firstOrCreate(['nik' => $nik], $data);
        }
    }
}
