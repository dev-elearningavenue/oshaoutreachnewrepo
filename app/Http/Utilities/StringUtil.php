<?php

namespace App\Http\Utilities;

class StringUtil
{
    public static function limitTextWords($content = false, $limit = false, $stripTags = false, $ellipsis = false)
    {
        if ($content && $limit) {
            $content = ($stripTags ? strip_tags($content) : $content);
            $content = explode(' ', $content, $limit+1);
            array_pop($content);
            if ($ellipsis) {
                array_push($content, '...');
            }
            $content = implode(' ', $content);
        }
        return $content;
    }
}