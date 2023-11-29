<?php

namespace App\Http\Forms;

use Core\FormBuilder\FormBuilder;

class SimpleForm
{
    private object $builder;

    public function __construct(FormBuilder $builder){
        $this->builder = $builder;
    }

    public function render() :void {
         $this->builder->setFormClasses(['form', 'custom-form'])
            ->setLabelClasses(['custom-label', 'text-bold'])
            ->addFieldClasses('text', ['custom-field', 'text-input'])
            ->addFieldClasses('select', ['custom-field', 'select-input'])
            ->addFieldClasses('textarea', ['custom-field', 'textarea-input'])
            ->setButtonClasses(['btn', 'btn-primary'])
            ->addField('username', 'text', 'Enter your username', 'Username')
            ->addField('password', 'password', 'Enter your password', 'Password')
            ->addField('gender', 'select', '', 'Gender', ['' => 'Select...', 'm' => 'Male', 'f' => 'Female'])
            ->addField('bio', 'textarea', 'Bio', 'Biography')
            ->build();
    }

}