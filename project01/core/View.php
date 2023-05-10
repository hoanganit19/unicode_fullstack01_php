<?php

namespace Core;

use Core\Template;

class View
{
    public static $share = [];

    public static function render($path, $data = [])
    {
        $contentView = self::getView($path);

        $contentView = Template::run($contentView);

        $dataSubView = Template::$data;

        if (!empty($dataSubView)) {
            foreach($dataSubView as $item) {
                $data = array_merge($data, $item);
            }

        }

        if (!empty(self::$share)) {
            foreach(self::$share as $item) {
                $data = array_merge($data, $item);
            }
        }

        extract($data);

        eval('?> '.$contentView.' <?php');
    }

    private static function getView($path)
    {
        $path = WEB_PATH_APP.'/Views/'.$path.'.php';
        return file_get_contents($path);
    }

    public static function share($data = [])
    {
        self::$share[] = $data;
    }
}
