<?php

namespace Core\Localization;

use Core\Localization\Contracts\LocalizationInterface;

class Localization implements LocalizationInterface
{
    private $translations;
    private $locale;

    public function __construct($locale){
        $this->locale = $locale;
        $this->loadTranslations();
    }

    public function loadTranslations(){
        $translationsFile = BASE_PATH . '/lang/' . $this->locale . '.php';
        if (file_exists($translationsFile)) {
            $this->translations = require($translationsFile);
        } else {
            throw new \Exception("Translation file not found for locale: " . $this->locale);
        }
    }

    public function translate($key, $replacements = []){
        $translation = $this->translations;

        foreach (explode('.', $key) as $segment) {
            if (isset($translation[$segment])) {
                $translation = $translation[$segment];
            } else {
                return $key;
            }
        }

        if (!empty($replacements)) {
            $translation = strtr($translation, $replacements);
        }

        return $translation;
    }
}
