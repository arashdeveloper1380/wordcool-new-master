<?php

namespace Core\Localization;

<?php

class Localization
{
    protected $locale;
    protected $translations;

    public function __construct($locale)
    {
        $this->locale = $locale;
        $this->translations = $this->loadTranslations();
    }


//     protected function loadTranslations(){
    //     $translations = [];

    //     $filePath = 'path/to/translations/' . $this->locale . '.json';

    //     // Check if the translation file exists
    //     if (file_exists($filePath)) {
    //         // Load and parse the translation file
    //         $translationData = file_get_contents($filePath);
    //         $translations = json_decode($translationData, true);
    //     }

    //     return $translations;
    // }

    protected function loadTranslations(){
        $translations = [];

        // English translations
        $translations['en'] = [
            'welcome' => 'Welcome!',
            'greeting' => 'Hello :name',
            'farewell' => 'Goodbye :name',
        ];

        // French translations
        $translations['fr'] = [
            'welcome' => 'Bienvenue!',
            'greeting' => 'Bonjour :name',
            'farewell' => 'Au revoir :name',
        ];

        return $translations;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
        $this->translations = $this->loadTranslations();
    }

    public function translate($key, $replacements = [])
    {
        $translation = $this->translations[$this->locale][$key] ?? $key;

        // Perform replacements in the translation
        foreach ($replacements as $search => $replace) {
            $translation = str_replace($search, $replace, $translation);
        }

        return $translation;
    }
}
