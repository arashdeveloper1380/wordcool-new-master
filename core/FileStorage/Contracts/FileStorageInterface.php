<?php

namespace Core\FileStorage\Contracts;

interface FileStorageInterface
{
    public function put($path, $data);

    public function get($path);

    public function delete($path);

    public function exists($path);

    public function size($path);

}