<?php

namespace Core\HtmlGenerator;
class HtmlGenerator
{
    
    protected $tagName;
    protected $attributes = [];
    protected $children = [];

    public function setAttribute(string $name, string $value) : self{
        $this->attributes[$name] = $value;
        return $this;
    }

    public function addChild($child) :self{
        if (is_string($child)) {
            $child = new TextNode($child);
        }

        if (!$child instanceof self) {
            throw new \InvalidArgumentException("Child must be a string or an instance of HtmlGenerator");
        }

        $this->children[] = $child;
        return $this;
    }

    public function build(): string {
        $attributes = $this->renderAttributes();

        $selfClosingTags = ['img', 'hr', 'br', 'input', 'meta', 'link'];
        if (in_array($this->tagName, $selfClosingTags)) {
            return "<{$this->tagName}{$attributes} />";
        }

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
            return $child->build();
        }, $this->children));
    }

    public function section(string $class) : void{
        $namespace = 'App\Http\Html\render\\';
        $className = $namespace . $class;
        if(class_exists($className)){
            $object = new $className($this);
            $object->run();
        }
    }
    
}

class TextNode extends HtmlGenerator
{
    protected $text;

    public function __construct(string $text){
        $this->text = $text;
    }

    public function build(): string{
        return htmlspecialchars($this->text, ENT_QUOTES, 'UTF-8');
    }
}