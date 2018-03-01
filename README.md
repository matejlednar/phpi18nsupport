# PHP i18n Support
i18n support for PHP based on JSON

## Easy to use

PHP file
```
<?

include_once './php/classes/I18nSupport.php';
$app = new App();

// set own path to translation file
$app = new App($pathToTranslation);

// set own path to translation file
$app = new App();
$app ->loadTranslation("i18n/i18n.json");

// show translated text
$app->showText("sectionName", "keyName");

// returns translated text
$app->getText("sectionName", "keyName");

?>
```
JSON file with structured translation - section / content

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

JSON file with flat translation structure - content

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