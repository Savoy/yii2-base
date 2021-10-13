<?php

return [
    'class' => '\yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'cache' => !YII_DEBUG ? 'cache' : false,
    'rules' => require __DIR__ . '/urlRules.php',
];
