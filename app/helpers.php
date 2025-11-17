<?php

if (!function_exists('t')) {
    /**
     * Translation helper for HydePHP portfolio
     * 
     * @param string $key Translation key (e.g., 'nav.home')
     * @param string|null $locale Language code (en/km), defaults to 'en'
     * @return string Translated string or key if not found
     */
    function t(string $key, ?string $locale = null): string
    {
        static $translations = [];
        
        $locale = $locale ?? 'en';
        $file = base_path("resources/lang/{$locale}/messages.php");
        
        if (!file_exists($file)) {
            return $key;
        }
        
        if (!isset($translations[$locale])) {
            $translations[$locale] = include $file;
        }
        
        $keys = explode('.', $key);
        $value = $translations[$locale];
        
        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return $key;
            }
            $value = $value[$k];
        }
        
        return is_string($value) ? $value : $key;
    }
}

if (!function_exists('resource_path')) {
    /**
     * Get the path to a resource file.
     */
    function resource_path(string $path = ''): string
    {
        return base_path('resources' . ($path ? DIRECTORY_SEPARATOR . $path : $path));
    }
}

if (!function_exists('config_path')) {
    /**
     * Get the path to a config file.
     */
    function config_path(string $path = ''): string
    {
        return base_path('config' . ($path ? DIRECTORY_SEPARATOR . $path : $path));
    }
}

