# PHP i18n Support
i18n support for PHP based on JSON with unlimited languages support. <br>

If the translation keyword doesn't exist, returns an empty string.<br>
The PHP i18n support util supports also categories (nested architecture based on parent-> child keywords). <br>
e.g. you can create a group of translation keywords for the menu under the menu keyword.

## Easy to use

Load PHP i18n Support util
```
include_once './php/classes/I18nSupport.php';
$i18nUtil = new I18n();

// set own path to translation file
$i18nUtil = new I18n($pathToTranslation);
```
Example #1 - Nested JSON structure
```
// set own path to translation file
$i18nUtil = new I18n();
$i18nUtil ->loadTranslation("i18n/i18n.json");

// show translated text from the nested JSON structure
$i18nUtil->showText("sectionName", "keyName");

// returns translated text from the nested JSON structure
$i18nUtil->getText("sectionName", "keyName");
```
Example #2 - Flat JSON structure
```
// set own path to translation file
$i18nUtil = new I18n();
$i18nUtil ->loadTranslation("i18n/i18n.json");

// show translated text from the flat JSON structure
$i18nUtil->showText("keyName");

// returns translated text from the flat JSON structure
$i18nUtil->getText("keyName");


```
JSON file with the structured translation - section/keyword (nested JSON structure)

Sample:
```
{
    "navigation" : {

        "home" :  {
                "en" : "Home",
                "sk" : "Domov"
            },
        "about" : {
                "en" : "About",
                "sk" : "O stránke"
            }        
    }
}
``` 

JSON file with the simple translation structure (flat JSON structure)

Sample:
```
{
    "home" :  {
            "en" : "Home",
            "sk" : "Domov"
        },
    "about" : {
            "en" : "About",
            "sk" : "O stránke"
        }
}
``` 


## Language detection

Auto detection or query string detection based on lang parameter
```
index.php?lang=en
```

## Language utils

```
setDefaultLanguage($lang);
getDefaultLanguage();
setSupportedLanguages([$languages]);
getSupportedLanguages();
isSupported($lang);
loadTranslation($pathToTranslationFile);
```

## Special Utils
```
showUText($key);
showLText($key);
showUFText($key);
getUText($key);
getLText($key);
getUFText($key);
```
