<?php

namespace Core\Localization;

class Localization {

    protected $language;
    protected $translations;

    public function __construct($language = 'en') {
        $this->language = $language;
    }

    public function setLanguage($language){
        $this->language = $language;
    }

    public function get($key, $placeholders = []){
        $translation = $this->translations[$this->language][$key] ?? '';

        foreach ($placeholders as $placeholder => $value) {
            $translation = str_replace(":$placeholder", $value, $translation);
        }

        return $translation;
    }

    protected function loadTranslations()
    {
        $translationFiles = glob("translations/{$this->language}/*.php");

        foreach ($translationFiles as $file) {
            $this->translations[$this->language] = include "../../lang/" . $file;
        }
    }

}