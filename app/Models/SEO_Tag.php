<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SEO_Tag extends Model
{
    protected $table = 'seo_tags';

    public static function getAllTagsByPage($page)
    {
        $default_tags = ['h1_heading' => '', 'img_alt' => ''];
        $content = self::where('page_type', PAGE_TYPE_STATIC)
            ->where('page_name', $page)
            ->whereIn('meta_name', ['h1_heading', 'img_alt'])
            ->pluck('meta_content', 'meta_name')->toArray();
        $content['seo_tags'] = self::where('page_type', PAGE_TYPE_STATIC)
            ->where('page_name', $page)
            ->where('meta_content', '!=', "")
            ->whereNotIn('meta_name', ['h1_heading', 'img_alt'])
            ->pluck('meta_content', 'meta_name')->toArray();

        $content['promotion_courses'] = self::where('page_type', PAGE_TYPE_STATIC)
                ->where('page_name', $page)
                ->where('meta_name', "promotion_courses")
                ->pluck('promotion_products')
                ->first();

        return array_merge($default_tags, $content);
    }

    public static function deleteExtraTagsByPage($page)
    {
        return self::where('page_type', PAGE_TYPE_STATIC)
            ->where('page_name', $page)
            ->whereNotIn('meta_name', ['h1_heading', 'img_alt'])->delete();
    }

    public static function getPromotionCourses(array $page, array $extraFields = [])
    {
        $courses = [];
        if(isset($page['promotion_courses'])) {
            $fields = ['id', 'slug', 'title', 'price', 'discounted_price', 'promotion_price', 'language'];
            $fields = array_merge($fields, $extraFields);
            $courses = Product::query()
                ->select($fields)
                ->whereIn('id', explode(',', $page['promotion_courses']))
                ->orderByRaw("field(id," . $page['promotion_courses'] . ")")
                ->get();
        }

        return $courses;
    }
}
