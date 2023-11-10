<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait BitlyTrait {

    protected function shortenUrl($longUrl){
        try {
            $response = Http::withHeaders([
                "Authorization" => "Bearer " . env('BITLY_ACCESS_TOKEN'),
                "Content-Type" => "application/json",
            ])->post(env('BITLY_API_URL') . '/v4/shorten', ['long_url' => $longUrl]);

            if ($response->successful()) {
                return $response->json("link") . "\n";
            } else {
                Log::error("Error in Bitly Shorten API");
                return "https://www.oshaoutreachcourses.com/lms\n";
            }
        } catch (\Exception $e) {
            Log::error("Bitly API Error " . $e->getMessage());
            return "https://www.oshaoutreachcourses.com/lms\n";
        }

    }
}
