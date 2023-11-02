<?php

namespace Core\View\Contracts;

interface ViewInterface {

    public static function render($view, $data = []);

    public static function blade($view, $data = []);

}