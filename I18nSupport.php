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
mb_internal_encoding('UTF-8');

class I18n {

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

            $test = array_key_exists($section, $this->translation);

            if (!$test) {
                return ""; // if section doesn't exist, return empty string
            }

            $translation = $this->translation[$section];
            $translation = $translation[$key];
            $translation = $translation[$lang];
        } else {

            $key = $section;

            $test = array_key_exists($key, $this->translation);

            if (!$test) {
                return ""; // if key doesn't exist, return empty string
            }

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

    /**
     * Show translated uppercase text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function showUText($section = "", $key = "") {

        echo mb_strtoupper($this->getText($section, $key));
    }

    /**
     * Show translated lowercase text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function showLText($section = "", $key = "") {

        echo mb_strtolower($this->getText($section, $key));
    }

    /**
     * Show translated first character uppercase text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function showUFText($section = "", $key = "") {

        echo ucfirst($this->getText($section, $key));
    }

    /**
     * Get translated uppercase text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function getUText($section = "", $key = "") {

        return mb_strtoupper($this->getText($section, $key));
    }

    /**
     * Get translated lowercase text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function getLText($section = "", $key = "") {

        return mb_strtolower($this->getText($section, $key));
    }

    /**
     * Get translated first character uppercase text (key) from defined category (section)
     * 
     * @param String $section
     * @param String $key
     */
    public function getUFText($section = "", $key = "") {

        return ucfirst($this->getText($section, $key));
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
