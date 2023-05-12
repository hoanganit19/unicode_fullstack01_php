<?php

function abort($error='404')
{
    $pathCore = WEB_PATH_ROOT.'/core/errors/'.$error.'.php';
    $pathApp = WEB_PATH_APP.'/Views/errors/'.$error.'.php';

    if (file_exists($pathApp)) {
        require $pathApp;
    } else {
        require $pathCore;
    }

    die();
}
