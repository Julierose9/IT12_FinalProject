<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class BaseController extends Controller
{
    protected function enforceRole(string $role): void
    {
        $user = Auth::user();

        $method = 'is' . ucfirst($role);
        if (! $user || ! method_exists($user, $method) || ! $user->{$method}()) {
            abort(403, 'Access denied.');
        }
    }
}