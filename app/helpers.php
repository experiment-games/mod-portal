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

if (!function_exists('filament_panel_is')) {
    /**
     * Check if the current panel is the given panel.
     *
     * @param string $panel
     * @return bool
     */
    function filament_panel_is(string $panel): bool
    {
        return app('filament')->getCurrentPanel()?->getId() === $panel;
    }
}
