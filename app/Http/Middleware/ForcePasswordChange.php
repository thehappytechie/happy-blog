<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->shouldRedirectToPasswordChange()) {
            return $this->redirectToPasswordChange();
        }
        return $next($request);
    }

    private function shouldRedirectToPasswordChange(): bool
    {
        return auth()->check() && auth()->user()->force_password_change == 1;
    }

    private function redirectToPasswordChange(): Response
    {
        return redirect()->route('password-change.edit', Auth::user()->id);
    }
}
