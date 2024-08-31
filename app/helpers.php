<?php

use App\Models\Setting;

/**
 * @param null $key
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
function admin($key = null)
{
    if(!auth()->guard('admin')->check())
    {
        return null;
    }

    $user = auth()->guard('admin')->user();

    return is_null($key) ? auth()->guard('admin')->user() : $user->$key;
}

/**
 * @param $dir
 * @return bool
 */
function deleteDirectory($dir)
{
    $s = explode('/', $dir);
    array_pop($s);
    $dir = implode('/', $s);
    if(!file_exists($dir))
    {
        return true;
    }
    if(!is_dir($dir))
    {
        return unlink($dir);
    }
    $files = array_diff(scandir($dir), [
        '.',
        '..'
    ]);
    foreach($files as $file)
    {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }

    return rmdir($dir);
}

/**
 * @param $image
 * @return bool
 */
function deleteImage($image)
{
    if(!file_exists($image))
    {
        return true;
    }
    if(!is_dir($image))
    {
        return unlink($image);
    }
}

/**
 * @param $key
 * @return mixed
 */
function setting($key)
{
    return Setting::where('setting_key', $key)->first()->setting_value ?? "";
}

function get_youtube_id($url)
{
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return $matches ? $matches[1] : 0;
}


/**
 * @param int $type
 * @return false|string
 */
function get_type_name(int $type)
{
    if($type == 1)
    {
        return 'About';
    }
    elseif($type == 2)
    {
        return 'News';
    }
    elseif($type == 3)
    {
        return 'House';
    }

    return false;
}

function getClassName(int $type)
{
    if($type == 1)
    {
        return 'App\Models\About\About';
    }
    elseif($type == 2)
    {
        return 'App\Models\News\News';
    }
    elseif($type == 3)
    {
        return 'App\Models\House\House\House';
    }

    return false;
}

function convertDateToReadableFormat($datetime, $locale)
{
    $locale    = ($locale == 'en' ? 'en_US' : 'ru_RU');
    $date      = new DateTime($datetime);
    $formatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE, $date->getTimezone());

    return $formatter->format($date);
}

?>

