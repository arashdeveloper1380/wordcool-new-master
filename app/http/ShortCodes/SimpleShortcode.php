<?php

namespace App\Http\ShortCodes;

use Core\ShortCode\Contracts\ShortCodeInterface;

class SimpleShortcode implements ShortCodeInterface {

    public function build() {
        $shortcode = 'simple_shortcode';
        $callback = [$this, 'exampleCallback'];

        $this->registerShortcode($shortcode, $callback);
    }

    public function exampleCallback($atts, $content = null) {
        $param1 = isset($atts['param1']) ? $atts['param1'] : '';
        $param2 = isset($atts['param2']) ? $atts['param2'] : '';
        
        return 'Param1: ' . esc_html($param1) . ', Param2: ' . esc_html($param2);
    }

    private function registerShortcode($shortcode, $callback) {
        $shortcodeInstance = new \Core\ShortCode\ShortCode();
        $shortcodeInstance->make($shortcode, $callback);
    }
}