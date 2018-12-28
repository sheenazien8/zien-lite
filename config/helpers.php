<?php

if (!function_exists('dd')) {
    function dd()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            if (is_array($arg)) {
                echo '<pre>';
                print_r($arg);
                echo '</pre>';
                echo '<hr>';
            }else {
                echo '<pre>';
                echo $arg;
                echo '</pre>';
                echo '<hr>';
            }
        }
        die();
    }
}

if (!function_exists('dump')) {
    function dump()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            if (is_array($arg)) {
                echo '<pre>';
                print_r($arg);
                echo '</pre>';
                echo '<hr>';
            }else {
                echo '<pre>';
                echo $arg;
                echo '</pre>';
                echo '<hr>';
            }
        }
    }
}

if (!function_exists('view')) {
    function view($file, $data = [])
    {
        require_once 'resources/views/'.$file.'.html';
    }
}

if (!function_exists('mix')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param string $path
     * @param string $manifestDirectory
     * @return string
     *
     * @throws \Exception
     */
    function mix($path, $manifestDirectory = '')
    {
        static $manifest;
        $publicFolder = '/public';
        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        $publicPath = $rootPath . $publicFolder;
        if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }
        if (! $manifest) {
            if (! file_exists($manifestPath = ($rootPath . $manifestDirectory.'/mix-manifest.json') )) {
                throw new Exception('The Mix manifest does not exist.');
            }
            $manifest = json_decode(file_get_contents($manifestPath), true);
        }
        if (! starts_with($path, '/')) {
            $path = "/{$path}";
        }
        $path = $publicFolder . $path;
        if (! array_key_exists($path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }
        return file_exists($publicPath . ($manifestDirectory.'/hot'))
                    ? "http://localhost:8080{$manifest[$path]}"
                    : $manifestDirectory.$manifest[$path];
    }
}

