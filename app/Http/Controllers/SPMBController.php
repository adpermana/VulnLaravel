<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SPMBController extends Controller
{
    public function showRegistrationForm()
    {
        return view('spmb.register');
    }

    public function submitRegistration(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:pendaftar,nik',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'pendidikan_terakhir' => 'required',
            'asal_sekolah' => 'required',
            'pilihan_prodi_1' => 'required',
            'pilihan_prodi_2' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id() ?? 1;
        $data['status_pendaftaran'] = 'menunggu';

        // VULN: FILE UPLOAD - no extension/MIME validation, no filename sanitization
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads'), $fotoName);
            $data['foto'] = 'uploads/' . $fotoName;
        }

        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen');
            $dokumenName = time() . '_' . $dokumen->getClientOriginalName();
            $dokumen->move(public_path('uploads'), $dokumenName);
            $data['dokumen'] = 'uploads/' . $dokumenName;
        }

        Pendaftar::create($data);

        return redirect('/spmb/status')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function showStatus()
    {
        // VULN: IDOR - If user is not admin, they can still access other pendaftar data
        // by manipulating the query
        if (Auth::user()->role === 'administrator') {
            $pendaftar = Pendaftar::all();
        } else {
            // VULN: RBAC - Regular users can view all pendaftar if they access this
            $pendaftar = Pendaftar::where('user_id', Auth::id())->get();
        }

        return view('spmb.status', compact('pendaftar'));
    }

    // VULN: IDOR - No ownership check, any authenticated user can view any pendaftar detail
    public function detail($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('spmb.detail', compact('pendaftar'));
    }

    public function cekStatusForm()
    {
        return view('spmb.cek_status');
    }

    public function cekStatus(Request $request)
    {
        $request->validate([
            'nik' => 'required',
        ]);

        $pendaftar = Pendaftar::where('nik', $request->nik)->first();

        if (!$pendaftar) {
            return back()->with('error', 'Data dengan NIK tersebut tidak ditemukan.');
        }

        return view('spmb.cek_status', compact('pendaftar'));
    }
}
