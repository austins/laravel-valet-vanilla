<?php

class VanillaValetDriver extends BasicValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return is_dir($sitePath.'/library/Vanilla');
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        $_SERVER['SCRIPT_NAME'] = '/index.php';
        $_SERVER['SCRIPT_FILENAME'] = $sitePath.'/index.php';
        $_SERVER['X_PATH_INFO'] = $uri;
        $_SERVER['X_REWRITE'] = 1;

        return $sitePath.'/index.php';
    }
}
