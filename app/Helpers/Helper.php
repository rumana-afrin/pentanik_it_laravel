<?php

use Illuminate\Support\Facades\Auth;

function getDefaultImage(): string
{
    return asset('assets/image/no-imge.jpg');
}
function adminInfo()
{
    return Auth::user(); // returns the entire user model of the logged-in admin
}

function adminImage()
{
    $user = Auth::user(); // Get the authenticated user

    if ($user && $user->image) {
        return asset('storage/' . $user->image);
    }

    return asset('assets/image/no-imge.jpg');
}

