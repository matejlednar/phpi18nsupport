<?

/**
 * PHP i18n Support - JSON data
 * 
 * Based on sections (HTML semantic sections and content),
 * and lang attribute (query string)
 * 
 * Structured JSON and flat JSON structure support
 * 
 * Author: Matej Lednár
 */
class App {

    private $translation = "";
    private $lang = "en";
    private $translationPath = "translation/i18n.json";
    private $languages = [
        'en',
        'sk',
        'de'];

    function __construct($url = "") {
        if ($url == "") {
            $url = $this->translationPath;
        }
        $this->loadTranslation($url);
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

        if (!in_array($lang, $this->languages)) {
            $lang = $this->$lang;
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
        if (file_exists($path)) {
            $json = file_get_contents($path);
        } else {
            $json = "{}";
        }
        //Decode JSON
        $this->translation = json_decode($json, true);
    }

    /**
     * 
     * @param String $section - section name for better JSON structure
     * @param String $key - key name for translated text
     * @return String
     */
    public function getText($section = "", $key = "") {

        $lang = $this->lang;
        if ($key != "") {
            $translation = $this->translation[$section];
            $translation = $translation[$key];
            $translation = $translation[$lang];
        } else {
            $key = $section;
            $translation = $this->translation[$key];
            $translation = $translation[$lang];
        }
        return $translation;
    }

    /**
     * Show translated text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function showText($section = "", $key = "") {

        echo $this->getText($section, $key);
    }

    public function setDefaultLanguage($lang) {

        $this->lang = $lang;
    }

    public function getDefaultLanguage() {

        return $this->lang;
    }

    public function setSupportedLanguages($languages) {

        $this->languages = $languages;
    }

    public function getSupportedLanguages() {

        return $this->languages;
    }

    public function isSupported($lang) {

        if (in_array($lang, $this->languages)) {
            return true;
        }
        return false;
    }

}
