<?php

namespace Core\Request\Contracts;

interface RequestInterface {

    public function get($key, $default = null);

    public function set($key, $value);

    public function all();

    public function has($key);

    public function input($key, $default = null);

    public function method();

    public function isPost();

    public function isGet();

    public function getString($key, $default = '');

    public function getInt($key, $default = 0);

    public function getFloat($key, $default = 0.0);

    public function getArray($key, $default = []);

    public function getBoolean($key, $default = false);

}