<?php

namespace App\Http\Html\makeTag;

use Core\HtmlGenerator\HtmlGenerator;

class A extends HtmlGenerator
{
    protected $tagName = 'a';

    public function setHref(string $href){
        return $this->setAttribute('href', $href);
    }
}