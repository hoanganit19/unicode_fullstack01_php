<?php

namespace Core;

class View
{
    public static function render($path, $data = [])
    {
        extract($data);

        $contentView = self::getView($path);

        //Thay thế
        $contentView = preg_replace('/{{\s*(.+?)\s*}}/s', '<?php echo htmlentities($1); ?>', $contentView);

        $contentView = preg_replace('/{!!\s*(.+?)\s*!!}/s', '<?php echo $1; ?>', $contentView);

        $contentView = preg_replace('/@foreach\s*\((.+?)\)/s', '<?php foreach ($1): ?>', $contentView);

        $contentView = preg_replace('/@endforeach/s', '<?php endforeach; ?>', $contentView);

        eval('?> '.$contentView.' <?php');
    }

    private static function getView($path)
    {
        $path = WEB_PATH_APP.'/Views/'.$path.'.php';
        return file_get_contents($path);
    }
}
