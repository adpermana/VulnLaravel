<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPendaftar = Pendaftar::count();
        $totalUser = User::count();
        $menunggu = Pendaftar::where('status_pendaftaran', 'menunggu')->count();
        $diterima = Pendaftar::where('status_pendaftaran', 'diterima')->count();
        $ditolak = Pendaftar::where('status_pendaftaran', 'ditolak')->count();

        return view('admin.dashboard', compact(
            'totalPendaftar', 'totalUser', 'menunggu', 'diterima', 'ditolak'
        ));
    }

    public function daftarPendaftar()
    {
        $pendaftar = Pendaftar::with('user')->get();
        return view('admin.pendaftar.index', compact('pendaftar'));
    }

    // VULN: IDOR - Only checks exists, no authorization beyond middleware
    public function detailPendaftar($id)
    {
        $pendaftar = Pendaftar::with('user')->findOrFail($id);
        return view('admin.pendaftar.detail', compact('pendaftar'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pendaftaran' => 'required|in:diverifikasi,diterima,ditolak',
            'catatan' => 'nullable',
        ]);

        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update([
            'status_pendaftaran' => $request->status_pendaftaran,
            'catatan' => $request->catatan,
        ]);

        return redirect('/admin/pendaftar')->with('success', 'Status pendaftar berhasil diperbarui');
    }

    // VULN: RBAC - This function is only supposed to be for admin, but
    // the check in the controller is easily bypassed
    public function editPendaftar($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('admin.pendaftar.edit', compact('pendaftar'));
    }

    public function updatePendaftar(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update($request->all());
        return redirect('/admin/pendaftar')->with('success', 'Data pendaftar berhasil diperbarui');
    }

    public function deletePendaftar($id)
    {
        Pendaftar::findOrFail($id)->delete();
        return redirect('/admin/pendaftar')->with('success', 'Data pendaftar berhasil dihapus');
    }

    public function daftarUser()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/admin/users')->with('success', 'User berhasil diperbarui');
    }
}
