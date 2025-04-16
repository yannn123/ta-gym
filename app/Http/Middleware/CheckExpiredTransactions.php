<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Transaksi;
use Carbon\Carbon;

class CheckExpiredTransactions
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $today = Carbon::now()->format('Y-m-d');
        
        // Update transaksi yang expired
        Transaksi::where('status', 'pending')
            ->whereDate('expired_date', '<=', $today)
            ->update(['status' => 'expired']);
            
        return $next($request);
    }
}