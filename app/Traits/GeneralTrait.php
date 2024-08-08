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
        $file_name = Storage::disk('public')->put($folder, $file);

        return $file_name;
    }
}
