<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Trackersheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use the Auth facade to check if the user is authenticated
        $user = Auth::user();
        $trackerColumn = 0; // or some default value

        if ($user) {
            $trackerColumn = Trackersheet::where('user_id', $user->id)->count();
        }

        if ($user && ($user->role_id == 1 || $user->role_id == 2)) {
            $users = User::with('Group', 'Role')->where('status', 1)->get();
        } else {
            $users = User::with('Group', 'Role')->where('status', 1)
                ->where('role_id', 4)
                ->where('group_id', optional($user)->group_id)
                ->get();
        }

        // Pass the data to a specific view
        view()->share(['users' => $users, 'trackerColumn' => $trackerColumn]);
    }
}
