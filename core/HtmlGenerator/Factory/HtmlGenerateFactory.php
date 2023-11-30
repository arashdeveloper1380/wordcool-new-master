<?php

namespace Core\HtmlGenerator\Factory;

class HtmlGenerateFactory
{
    public static function createElement(string $tagName, array $attributes = [], $children = []){
        $className = "App\\Http\\Html\\makeTag\\" . ucfirst($tagName);

        if (!class_exists($className)) {
            throw new \InvalidArgumentException("Class {$className} does not exist.");
        }

        $tag = new $className;

        foreach ($attributes as $name => $value) {
            $tag->setAttribute($name, $value);
        }

        if (is_array($children)) {
            foreach ($children as $child) {
                $tag->addChild($child);
            }
        } else {
            $tag->addChild($children);
        }

        return $tag;
    }

}