<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <style>
            header ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            header li {
                float: left;
            }
            header li a {
                display: block;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <ul>
                    <li>
                        <a href="/">Add url</a>
                    </li>
                    <li>
                        <a href="/admin">Show added urls</a>
                    </li>
                </ul>
            </div>
        </header>
        <div class="main">
            <?= $content ?>
        </div>
    </body>
</html>