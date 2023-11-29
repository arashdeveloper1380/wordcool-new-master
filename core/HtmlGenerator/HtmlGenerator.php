<?php

namespace Core\HtmlGenerator;
abstract class HtmlGenerator
{
    
    protected $tagName;
    protected $attributes = [];
    protected $children = [];

    public function setAttribute(string $name, string $value) : self{
        $this->attributes[$name] = $value;
        return $this;
    }

    public function addChild(HtmlGenerator $child) :self{
        $this->children[] = $child;
        return $this;
    }

    public function render(): string {
        $attributes = $this->renderAttributes();
        $children = $this->renderChildren();
        return "<{$this->tagName}{$attributes}>{$children}</{$this->tagName}>";
    }

    public function renderAttributes() : string{
        $parts = [];
        foreach ($this->attributes as $name => $value) {
            $parts[] = sprintf('%s="%s"', $name, htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
        }
        return $parts ? ' ' . implode(' ', $parts) : '';
    }

    protected function renderChildren(): string {
        return implode('', array_map(function ($child) {
            return $child->render();
        }, $this->children));
    }
    
}