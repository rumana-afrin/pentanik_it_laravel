<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

function getDefaultImage(): string
{
    return asset('assets/backend/image/no-imge.jpg');
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

//setting table
function getOption($option_key)
{

    $system_settings = config('settings');


    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } else {
        return '';
    }
}

function getImage($file)
{
    Log::info("inge", ['file' => $file]);

    // Check if file is not empty and exists in public storage
    if (!empty($file) && Storage::disk('public')->exists($file)) {
        return asset('storage/' . $file);
    }

    // Fallback image (note: should match actual public path)
    return asset('assets/backend/image/no-imge.jpg');
}

//
function uploadFile($to, $file, $oldFile = '')
{

    if ($oldFile) {
        removeFile($oldFile); // Pass the old file path
    }
    $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
    $file_name = time() . rand(1000, 9999) . '.' . $extension;
    $file_name = str_replace(' ', '_', $file_name);

    Storage::disk('public')->put($to . '/' . $file_name, file_get_contents($file->getRealPath()));
    return $to . '/' . $file_name;
}

function removeFile($file)
{
    if (Storage::disk('public')->exists($file)) {
        Storage::disk('public')->delete($file);
        return true;
    }
    return false;
}
