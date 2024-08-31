<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Exception;

trait GeneralTrait
{
    /**
     * Save the given file, replacing any existing file associated with the given model.
     *
     * @param string $type
     * @param \Illuminate\Http\UploadedFile $file
     * @param int $id
     * @param string $slug
     * @param string $column
     * @param string $class
     * @param string $module
     * @return string The path to the uploaded file.
     */
    protected function saveFile($type, $file, $id, $slug, $column, $class, $module)
    {
        $model = $class::find($id);

        if ($model && $model->$column) {
            $oldFilePath = public_path($model->$column);

            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }

        return $this->uploadFile($file, "{$module}/{$type}/{$slug}", $type);
    }

    /**
     * Upload the given file to the specified module and type folder.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $module
     * @param string $type
     * @return string The path to the uploaded file.
     */
    protected function uploadFile($file, $module, $type)
    {
        $folder = "front/assets/{$type}/{$module}";
        $fileName = $this->convertAndSaveWebp($file, $folder);

        return $fileName;
    }

    /**
     * Convert the image file to WebP format and save it.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @return string The path to the saved WebP file.
     * @throws \Exception If image conversion or saving fails.
     */
    protected function convertAndSaveWebp($file, $folder)
    {
        $image = imagecreatefromstring(file_get_contents($file));

        if (!$image) {
            throw new Exception('Could not create image from file');
        }

        $fileName = uniqid() . '.webp';
        $filePath = "{$folder}/{$fileName}";
        $fullPath = public_path($filePath);

        $dir = dirname($fullPath);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        if (imagewebp($image, $fullPath)) {
            imagedestroy($image);
            return $filePath;
        }

        imagedestroy($image);
        throw new Exception('Failed to save WebP image');
    }
}
