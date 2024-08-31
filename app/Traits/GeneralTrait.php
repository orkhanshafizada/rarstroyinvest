<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait GeneralTrait
{
    /**
     * @param $type
     * @param $file
     * @param $id
     * @param $slug
     * @param $column
     * @param $class
     * @param $module
     * @return mixed
     */
    protected function save_file($type, $file, $id, $slug, $column, $class, $module)
    {
        $old_file = $class::find($id);
        if($old_file)
        {
            deleteDirectory($old_file->$column);
        }

        return $this->upload_file($file, $module.'/' . $type . '/' . $slug, $type);
    }

    /**
     * @param $file
     * @param $module
     * @param $type
     * @return bool
     */
    protected function upload_file($file, $module, $type)
    {
        $folder = 'front/assets/'.$type.'/' . $module;
        $file_name = $this->convert_and_save_webp($file, $folder);

        return $file_name;
    }

    /**
     * Convert image to WebP format and save it.
     *
     * @param $file
     * @param $folder
     * @return string
     */
    protected function convert_and_save_webp($file, $folder)
    {
        $image = imagecreatefromstring(file_get_contents($file));
        if (!$image) {
            throw new \Exception('Could not create image from file');
        }

        $file_name = uniqid() . '.webp';
        $file_path = $folder . '/' . $file_name;
        $full_path = storage_path('app/public/' . $file_path);

        $dir = dirname($full_path);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        if (imagewebp($image, $full_path)) {
            imagedestroy($image);
            return $file_path;
        }

        imagedestroy($image);
        throw new \Exception('Failed to save WebP image');
    }

}
