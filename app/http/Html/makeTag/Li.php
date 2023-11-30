<?php

namespace App\Http\Html\makeTag;

use Core\HtmlGenerator\HtmlGenerator;

class Li extends HtmlGenerator
{
    protected $tagName = 'li';

    public function setClass(string $name, string $value): HtmlGenerator{
        return $this->setAttribute($name, $value);
    }
}