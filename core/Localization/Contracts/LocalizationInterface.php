<?php

namespace Core\Localization\Contracts;

interface LocalizationInterface{

    public function loadTranslations();

    public function translate($key, $replacements = []);

}