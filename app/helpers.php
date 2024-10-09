<?php

if (!function_exists('user')) {
    /**
     * Get the currently logged in user model.
     *
     * @return \App\Models\User|null
     */
    function user(): \App\Models\User|null
    {
        return auth()->user();
    }
}
