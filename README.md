# PHP i18n Support
i18n support for PHP based on JSON

## Easy to use

PHP file
```
<?

include_once './php/classes/I18nSupport.php';
$app = new App();

// show translated text
$app->i18n("sectionName", "keyName");

?>
```
JSON file with translation

Sample:
```
{
    "navigation" : {

        "home" : [
            {
                "en" : "Home",
                "sk" : "Domov"
            }
        ],
        "about" : [
            {
                "en" : "About",
                "sk" : "O stránke"
            }
        ]
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
```