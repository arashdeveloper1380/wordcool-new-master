<?php

namespace Core\Request\Contracts;

interface RequestInterface {

    public function get($key, $default = null);

    public function post($key = null, $default = null);

    public function all();

    public function input($key, $default = null);

    public function method();

    public function isPost();

    public function isGet();

}