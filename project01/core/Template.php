<?php

namespace Core;

class Template
{
    public static $data = [];

    public static function run($contentView)
    {
        //Xử lý master layout
        $contentView = self::masterLayout($contentView);

        //Xử lý import subview
        $contentView = self::include($contentView);

        //Xử lý các cú pháp Template
        $contentView = self::show($contentView);

        $contentView = self::foreachLoop($contentView);

        return $contentView;
    }

    public static function masterLayout($contentView)
    {
        $patternLayout = '~@extends\([\'"](.+?)[\'"]\)~s';
        preg_match($patternLayout, $contentView, $matches);
        if (!empty($matches[1])) {
            $layoutPath = $matches[1];
            $contentLayout = file_get_contents(WEB_PATH_APP.'/Views/'.$layoutPath.'.php');
            $contentView = preg_replace($patternLayout, $contentLayout, $contentView);

            //Lấy được danh sách @yield bên trong layout
            $patternYield = '~@yield\([\'"](.+?)[\'"]\)~s';

            preg_match_all($patternYield, $contentView, $yieldMatches);

            if (!empty($yieldMatches[1])) {
                $yieldList = $yieldMatches[1];
                foreach ($yieldList as $yieldName) {
                    $patternSection = '~@section\([\'"]'.$yieldName.'[\'"]\)(.+?)@endsection~s';

                    preg_match($patternSection, $contentView, $sectionMatches);

                    if (!empty($sectionMatches[1])) {
                        $sectionContent = $sectionMatches[1];
                        $contentView = preg_replace('~@yield\([\'"]'.$yieldName.'[\'"]\)~s', $sectionContent, $contentView);
                    }
                }
            }

            //Xóa @section
            $contentView = preg_replace('~@section\([\'"].+?[\'"]\)(.+?)@endsection~s', '', $contentView);

            //Xóa @yield
            $contentView = preg_replace('~@yield\([\'"].+?[\'"]\)~s', '', $contentView);

        }

        return $contentView;
    }

    public static function show($contentView)
    {
        $pattern = '/{{\s*(.+?)\s*}}/s';
        $contentView = preg_replace($pattern, '<?php echo htmlentities($1); ?>', $contentView);

        $pattern = '/{!!\s*(.+?)\s*!!}/s';
        $contentView = preg_replace($pattern, '<?php echo $1; ?>', $contentView);

        return $contentView;
    }

public static function foreachLoop($contentView)
{
    $contentView = preg_replace('/@foreach\s*\((.+?)\)/s', '<?php foreach ($1): ?>', $contentView);

    $contentView = preg_replace('/@endforeach/s', '<?php endforeach; ?>', $contentView);
    return $contentView;
}

public static function include($contentView)
{
    $basePath = WEB_PATH_APP.'/Views/';
    preg_match_all('~@include\(\'(.+?)\'(?:\s*,\s*(.+?))*\)~s', $contentView, $matches);


    if (!empty($matches[0])) {
        foreach ($matches[0] as $key => $value) {
            $args = !empty($matches[2][$key]) ? $matches[2][$key] : [];
            $pathView = $basePath.$matches[1][$key].'.php';

            $result = [];
            if (!empty($args)) {
                if (preg_match("/'(.*?)' => '(.*?)'/", $args, $matchesArgs)) {
                    $result[ $matchesArgs[1] ] = $matchesArgs[2];
                }
                self::$data[] = $result;
            }

            $contentSubView = file_get_contents($pathView);


            $contentView = preg_replace('~@include\(\''.$matches[1][$key].'\'(?:\s*,\s*(.+?))*\)~s', $contentSubView, $contentView);

        }
    }
    return $contentView;
}
}
