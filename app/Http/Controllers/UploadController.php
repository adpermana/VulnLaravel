<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'administrator') {
            $uploads = Upload::with('user')->latest()->get();
        } else {
            $uploads = Upload::where('user_id', Auth::id())->latest()->get();
        }

        return view('spmb.upload', compact('uploads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = strtolower($file->getClientOriginalExtension());

        // VULN: FILE UPLOAD - Validasi blacklist (hanya blokir ekstensi .php).
        // Ekstensi .phar TIDAK diblokir. Apache mod_php mengeksekusi .phar
        // sebagai PHP (lihat FilesMatch ".+\.ph(?:ar|p|tml)$"), sehingga berkas
        // .phar yang di-upload dapat menjalankan kode PHP (RCE) saat diakses.
        $blockedExtensions = ['php'];

        if (in_array($extension, $blockedExtensions, true)) {
            return back()->with('error', 'Berkas dengan ekstensi .php tidak diizinkan.');
        }

        $mimeType = $file->getClientMimeType();
        $size = $file->getSize();

        $filename = time() . '_' . $originalName;
        $file->move(public_path('uploads'), $filename);

        Upload::create([
            'user_id' => Auth::id(),
            'original_name' => $originalName,
            'filename' => $filename,
            'path' => 'uploads/' . $filename,
            'mime_type' => $mimeType,
            'size' => $size,
        ]);

        return back()->with('success', 'Berkas berhasil di-upload.');
    }

    public function destroy($id)
    {
        $upload = Upload::findOrFail($id);

        $fullPath = public_path($upload->path);
        if (is_file($fullPath)) {
            @unlink($fullPath);
        }

        $upload->delete();

        return back()->with('success', 'Berkas berhasil dihapus.');
    }
}
