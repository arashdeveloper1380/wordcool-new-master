<?php

namespace Core\Redirect\Contracts;

interface RedirectInterface {

    public function url($url);

    public function back();

}
