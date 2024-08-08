<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkEditorController extends Controller
{
    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $folder = 'front/assets/images/ckeditor';
        $url = '/' . Storage::disk('public')->put($folder, $request->file('upload'));

        $msg = "Image Uploaded";
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');

        echo $response;
    }
}
