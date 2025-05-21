<?php

namespace App\Http\Middleware;

use App\Models\ApplnStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApplicationOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response 
    {

        $applicationStatusData = ApplnStatus::select('id')->where('user_id', auth()->id())->get();

        if ($applicationStatusData->contains($request->query()['appln_id'])) {
            return $next($request); // pass
        } else {
            session()->flash('error', 'Anda tidak dibenarkan untuk mengakses permohonan ini.');
            return redirect()->route('dashboard');
        }
        
    }
}
