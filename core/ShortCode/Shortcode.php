<?php

namespace Core\ShortCode;

use Core\ShortCode\Contracts\ShortCodeInterface;
use Exception;


class ShortCode {

    public function __construct() {
        add_action('init', [$this, 'make']);
    }

    public function make(string $shortcode = '', $shortcodeCallback = null) :void {
        if (!empty($shortcode) && is_callable($shortcodeCallback)) {
            add_shortcode($shortcode, $shortcodeCallback);
        }
    }

    public function register(string $class) :void {
        $namespace = 'App\Http\ShortCodes\\';
        $className = $namespace . $class;
        if (class_exists($className)) {
            $shortcodeObject = new $className();
            if ($shortcodeObject instanceof ShortCodeInterface) {
                $shortcodeObject->build();
            } else {
                throw new Exception('Shortcode class must implement ShortCodeInterface');
            }
        } else {
            throw new Exception('Shortcode class does not exist');
        }
    }
}