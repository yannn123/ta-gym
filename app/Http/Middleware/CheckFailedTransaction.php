<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class CheckFailedTransaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $hasFailedTransaction = Transaksi::where('id_user', $user->id)
                ->where('status', 'failed')
                ->exists();

            if ($hasFailedTransaction && !$request->is('login') && !$request->is('register')) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your transaction has failed. Please contact support.');
            }
        }

        return $next($request);
    }
}
