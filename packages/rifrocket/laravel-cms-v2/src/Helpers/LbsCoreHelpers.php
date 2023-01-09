<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Rifrocket\LaravelCmsV2\Models\LbsTranslation;

// Translator
if (!function_exists('lbsTranslate')) {
    function lbsTranslate($trans_key, $lang_key = null, $provider=null)
    {
        if($lang_key == null){
            $lang_key = App::getLocale();
        }

        //create new translation if key is not exist
        $translation_def = LbsTranslation::where('lang_key', env('DEFAULT_LANGUAGE', 'en'))->where('trans_key', $trans_key)->first();
        if(! $translation_def){
            $translation_def = new LbsTranslation;
            $translation_def->lang_key = env('DEFAULT_LANGUAGE', 'en');
            $translation_def->trans_key = $trans_key;
            $translation_def->trans_value = $trans_key;
            $translation_def->provider = 'global';
            if($provider){
                $translation_def->provider = $provider;
            }

            $translation_def->save();
        }

        //Check for session lang
        $translation_locale = LbsTranslation::where('trans_key', $trans_key)->where('lang_key', $lang_key);

        if($provider){
            $translation_locale = $translation_locale->where('provider', $provider);
        }

        $translation_locale = $translation_locale->first();

        if($translation_locale){
            return $translation_locale->trans_value ?? $trans_key;
        }
    }
}


//Generate random string
if (!function_exists('lbsRandomStr')) {
    function lbsRandomStr($sting_length, $numeric = true, $upper_case = false, $lover_case = false, $er_check = false)
    {
        try {
            if ($numeric == false and $upper_case == false and $lover_case == false) {
                return false;
            }
            $numeric_sting = '';
            $upper_case_sting = '';
            $lover_case_sting = '';
            if ($numeric) {
                $numeric_sting = '123456789';
            }
            if ($upper_case) {
                $upper_case_sting = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if ($lover_case) {
                $lover_case_sting = 'abcdefghijklmnopqrstuwxyz';
            }
            $compare_string = $numeric_sting . $upper_case_sting . $lover_case_sting;
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($compare_string) - 1; //put the length -1 in cache
            for ($i = 0; $i < $sting_length; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $compare_string[$n];
            }
            return implode($pass); //turn the array into a string
        } catch (\Exception $exception) {
            if ($er_check) {
                return $exception->getMessage();
            }
            return false;
        }
    }
}


//Generate random color hex code
if (!function_exists('lbsRandomColor')) {
    function lbsRandomColor(array $reverse = null, $hex = false, $er_check = false)
    {
        try {

            if ($reverse and is_array($reverse)) {

                $rvsColor = ($reverse[0] * 0.299 + $reverse[1] * 0.587 + $reverse[2] * 0.114) > 186
                    ? [0, 0, 0]
                    : [255, 255, 255];

                if ($hex) {
                    return sprintf("#%02x%02x%02x", $rvsColor[0], $rvsColor[1], $rvsColor[2]);
                }
                return $rvsColor;
            }

            //Generate reverse color from given color code
            $rgbColor = [];
            foreach (array(0, 1, 2) as $color) {
                //Generate a random number between 0 and 255.
                $rgbColor[$color] = mt_rand(0, 255);
            }
            if ($hex) {
                return sprintf("#%02x%02x%02x", $rgbColor[0], $rgbColor[1], $rgbColor[2]);
            }
            return $rgbColor;

        } catch (\Exception $exception) {

            if ($er_check) {
                return $exception->getMessage();
            }
            return false;
        }
    }
}

//merge multi demotion array into single array
if (!function_exists('lbs_multi_array_merge')) {
    function lbs_multi_array_merge($toMerge, $original, $er_check = false)
    {
        try {

            $outPut = [];
            foreach ($original as $key => $value) {

                if (isset($toMerge[$key])) {
                    $outPut[$key] = array_merge($value, $toMerge[$key]);
                } else {
                    $outPut[$key] = $value;
                }
            }

            return $outPut;

        } catch (\Exception $exception) {

            if ($er_check) {
                return $exception->getMessage();
            }
            return false;
        }

    }
}

//Create custom channel for logs
if (!function_exists('lbsCreateLogChannel')) {
    function lbsCreateLogChannel($fileNae)
    {
        Config::set('logging.channels.custom_chennel.path', storage_path('logs').'/'.$fileNae);
    }
}

if (!function_exists('lbsFormatBytes')) {
    function lbsFormatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

//Assets Provider
if (!function_exists('lbsAssets')) {
    function lbsAssets($append)
    {
        return URL('vendor/laravel-cms-v2/admin_assets/'.$append);
    }
}


// Shortens a number and attaches K, M, B, etc. accordingly
if (!function_exists('number_shorten')) {
    function number_shorten($number, $precision = 3, $divisors = null) {

        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        return number_format($number / $divisor, $precision) . $shorthand;
    }
}





