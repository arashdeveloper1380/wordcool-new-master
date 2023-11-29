<?php

namespace Core\FormBuilder;

class FormBuilder
{
    private string $action;
    private string $method;
    private array $fields = [];
    private array $formClasses = [];
    private array $fieldClasses  = [];
    private array $labelClasses = [];
    private array $buttonClasses = [];

    public function __construct(string $action, string $method){
        $this->action = $action;
        $this->method = $method;
    }

    public function setFormClasses(array $classes) : self{
        $this->formClasses = $classes;
        return $this;
    }

    public function addFieldClasses(string $type, array $classes) : self{
        $this->fieldClasses[$type] = $classes;
        return $this;
    }

    public function setLabelClasses(array $classes) : self{
        $this->labelClasses = $classes;
        return $this;
    }

    public function setButtonClasses(array $classes) : self{
        $this->labelClasses = $classes;
        return $this;
    }

    public function addField(string $name, string $type, string $placeholder = '', $label = '', $options = [] ) : self{
        $this->fields[] = compact(
            'name',
            'type',
            'placeholder',
            'label',
            'options');

        return $this;
    }

    public function getFieldClasses(string $type) : string{
        return implode(' ', $this->fieldClasses[$type] ?? []);
    }

    public function build() {
        $formClassString = implode(' ', $this->formClasses);

        echo "<form action='$this->action' method='$this->method' class='$formClassString'>\n";

        foreach ($this->fields as $field) {
            $labelClassString = implode(' ', $this->labelClasses);
            $fieldClassString = $this->getFieldClasses($field['type']);
            if ($field['label'] !== '') {
                echo "<label for='{$field['name']}' class='$labelClassString'>{$field['label']}</label>\n";
            }

            $inputString = '';
            switch ($field['type']) {
                case 'select':
                    $optionsString = '';
                    foreach ($field['options'] as $value => $optionLabel) {
                        $optionsString .= "<option value='$value'>$optionLabel</option>";
                    }
                    $inputString .= "<select name='{$field['name']}' class='$fieldClassString'>$optionsString</select>";
                    break;
                case 'textarea':
                    $inputString .= "<textarea name='{$field['name']}' placeholder='{$field['placeholder']}' class='$fieldClassString'></textarea>";
                    break;
                default:
                    $inputString .= "<input type='{$field['type']}' name='{$field['name']}' placeholder='{$field['placeholder']}' class='$fieldClassString' />";
                    break;
            }

            echo $inputString . "\n";
        }

        $buttonClassString = implode(' ', $this->buttonClasses);
        echo "<button type='submit' class='$buttonClassString'>Submit</button>\n";
        echo "</form>\n";
    }

    public function handle(string $class) : void{
        $namespace = "App\Http\Forms\\";
        $className = $namespace . $class;
        if(class_exists($className)){
            $object = new $className($this);
            $object->render();
        }
    }

}