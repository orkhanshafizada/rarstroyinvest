<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

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
        if ($old_file) {
            // Remove old file if exists
            $old_file_path = public_path($old_file->$column);
            if (File::exists($old_file_path)) {
                File::delete($old_file_path);
            }
        }

        return $this->upload_file($file, $module . '/' . $type . '/' . $slug, $type);
    }

    /**
     * @param $file
     * @param $module
     * @param $type
     * @return bool
     */
    protected function upload_file($file, $module, $type)
    {
        $folder = 'front/assets/' . $type . '/' . $module;
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
        $full_path = public_path($file_path);

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
