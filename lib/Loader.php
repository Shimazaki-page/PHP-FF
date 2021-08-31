<?php

class Loader
{
    private $directories = array();

    public function regDirectory($dir)
    {
        $this->directories[] = $dir;
        return;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function loadClass($className)
    {
        foreach ($this->directories as $dir) {
            $filePath = $dir . '/' . $className . '.php';
            if (is_readable($filePath)) {
                require $filePath;
                return;
            }
        }
    }
}