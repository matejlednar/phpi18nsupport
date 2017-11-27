<?
/**
 * PHP i18n Support - JSON data
 * Based on sections (HTML semantic sections / categories), keys,
 * and lang attribute (query string)
 * 
 * Author: Matej Lednár
 */
class App {

    private $translation = "";
    private $lang = "";
    private $translationPath = "translation/i18n.json";

    function __construct() {

        $this->loadTranslation($this->translationPath);
        $this->getLanguage();
    }

    /**
     * Detect and set language
     */
    public function getLanguage() {

        $lang = filter_input(INPUT_GET, "lang");
        if (!isset($lang)) {

            $lang = substr(filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE'), 0, 2);
        }

        $supportedLanguages = ['en', 'sk', 'de'];

        if (!in_array($lang, $supportedLanguages)) {
            $lang = 'en';
        }

        $this->lang = $lang;
    }

    /**
     * Load JSON file with translation
     * 
     * @param String $path
     */
    public function loadTranslation($path) {
      
        // Read JSON file
        $json = file_get_contents($path);

        //Decode JSON
        $this->translation = json_decode($json, true);
    }

    /**
     * 
     * @param String $section - section name for better JSON structure
     * @param String $key - key name for translated text
     * @return String
     */
    public function getText($section, $key) {
      
        $lang = $this->lang;
        $translation = $this->translation[$section];
        $translation = $translation[$key];
        $translation = $translation[0];
        $translation = $translation[$lang];
        return $translation;
    }

    /**
     * Show translated text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function i18n($section, $key) {
     
        echo $this->getText($section, $key);
    }
}

