<?php

namespace Core\Csrf\Contracts;

interface CsrfInterface {

    public function generateToken() : void;

    public function validateToken() : bool;

}