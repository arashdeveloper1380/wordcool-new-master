<?php

namespace App\Http\ShortCodes;

use Core\ShortCode\Contracts\ShortCodeInterface;

class SimpleShortcode implements ShortCodeInterface {

    public function build() :void {
        $shortcode = 'simple_shortcode';
        $callback = [$this, 'exampleCallback'];

        $this->registerShortcode($shortcode, $callback);
    }

    public function exampleCallback(array $atts, string|int $content = null) {
        $name = isset($atts['name']) ? $atts['name'] : '';
        $lname = isset($atts['lname']) ? $atts['lname'] : '';
        
        return 'Param1: ' . esc_html($name) . ', Param2: ' . esc_html($lname);
    }

    private function registerShortcode($shortcode, $callback) :void {
        $shortcodeInstance = new \Core\ShortCode\ShortCode();
        $shortcodeInstance->make($shortcode, $callback);
    }
}