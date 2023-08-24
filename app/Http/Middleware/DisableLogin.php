<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisableLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->shouldLogoutUser()) {
            $this->logoutUser();
            return $this->redirectToLoginPageWithMessage();
        }
        return $next($request);
    }

    private function shouldLogoutUser(): bool
    {
        return auth()->check() && auth()->user()->disable_login == 1;
    }

    private function logoutUser(): void
    {
        auth()->logout();
    }

    private function redirectToLoginPageWithMessage(): Response
    {
        return redirect()->route('login')->with('message', 'You are not authorized to login. Contact support.');
    }

}
