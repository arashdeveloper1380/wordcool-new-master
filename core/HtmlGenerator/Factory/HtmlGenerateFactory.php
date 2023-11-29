<?php

namespace Core\HtmlGenerator\Factory;

class HtmlGenerateFactory
{
    public static function createElement($tagName, array $attributes = [], $text = null){
        $element = new static;
        $element->tagName = $tagName;
        $element->setAttributes($attributes);
        if ($text !== null) {
            $element->addChild($text);
        }
        return $element;
    }

}