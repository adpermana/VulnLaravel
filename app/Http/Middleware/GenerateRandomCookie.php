<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class GenerateRandomCookie
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cookie identitas portal dibangkitkan secara acak pada setiap request.
        // VULN: cookie diset TANPA flag HttpOnly dan Secure, serta dikecualikan
        // dari enkripsi Laravel (lihat bootstrap/app.php) sehingga nilainya
        // plaintext dan dapat dibaca/diubah oleh pengguna.
        Cookie::queue(cookie(
            'spmb_visitor',
            Str::random(32),
            60 * 24 * 30,
            '/',
            null,
            false,
            false,
            false,
            'lax'
        ));

        return $next($request);
    }
}
