<?php
class FileStorage
{
    protected $basePath;

    public function __construct($basePath){
        $this->basePath = $basePath;
    }

    public function put($path, $data){
        $fullPath = $this->getFullPath($path);
        $directory = dirname($fullPath);

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        file_put_contents($fullPath, $data);
    }

    public function get($path){
        $fullPath = $this->getFullPath($path);

        if (file_exists($fullPath)) {
            return file_get_contents($fullPath);
        }

        return null;
    }

    public function delete($path){
        $fullPath = $this->getFullPath($path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function exists($path){
        $fullPath = $this->getFullPath($path);

        return file_exists($fullPath);
    }

    public function size($path){
        $fullPath = $this->getFullPath($path);

        if (file_exists($fullPath)) {
            return filesize($fullPath);
        }

        return -1;
    }

    protected function getFullPath($path){
        return $this->basePath . '/' . $path;
    }
}