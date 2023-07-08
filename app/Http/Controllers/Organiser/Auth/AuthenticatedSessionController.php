<?php

namespace App\Http\Controllers\Organiser\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OrganiserLoginRequest;
use App\Models\Organiser;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function index(): View
    {
        return view('organiser.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(OrganiserLoginRequest $request): RedirectResponse
    {
        $organiser = Organiser::get()->where('organiser_email', '=', $request->get('organiser_email'))->first();
        if ($organiser->status == 1) {
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::ORGANISER_HOME);
        } else {
            return redirect()->route('organiser.login')->with('message', 'Your login request is not approved by admin');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('organiser')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
