<!DOCTYPE html>

<?
include_once './php/classes/I18nSupport.php';
$app = new App();
?>

<html lang="en">
    <head>
        <title><? $app->showText("metadata", "title"); ?></title>
        <meta charset="utf-8">
        <meta name="author" content="PhDr. Matej Lednár, PhD.">
        <meta name="description" content="PhDr.Matej Lednár, PhD. - PHP showText support demo - my Bootstrap template">
        <meta name="keywords" content="matej, lednár, bootstrap, template, php, showText">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>                
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><? $app->showText("navigation", "brand"); ?></a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"><? $app->showText("navigation", "home"); ?> <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><? $app->showText("navigation", "about"); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><? $app->showText("navigation", "services"); ?></a>
                        </li>
                        <li class="nav-item languages">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="?lang=en">
                                        <? $app->showText("navigation", "en"); ?>
                                    </a>
                                </li>    
                                <li>
                                    <a href="?lang=de">
                                        <? $app->showText("navigation", "de"); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="?lang=sk">
                                        <? $app->showText("navigation", "sk"); ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container">
            <h2>Tests</h2>
            <?
            echo $app->getDefaultLanguage() . "<br>";
            echo implode(" ", $app->getSupportedLanguages()) . "<br>";
            echo ($app->isSupported("sk") ? "true" : "false") . "<br>";
            echo ($app->isSupported("cz") ? "true" : "false") . "<br>";

            echo "-----------------<br>";

            $app->setDefaultLanguage("sk");
            $app->setSupportedLanguages([
                "en",
                "cz",
                "sk"]);
            echo $app->getDefaultLanguage() . "<br>";
            echo implode(" ", $app->getSupportedLanguages()) . "<br>";
            echo ($app->isSupported("sk") ? "true" : "false") . "<br>";
            echo ($app->isSupported("cz") ? "true" : "false") . "<br>";
            ?>

        </div>
    </body>
</html>