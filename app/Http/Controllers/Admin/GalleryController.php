<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryController extends Controller
{
    use GeneralTrait;
    /**
     * @param int $category_id
     * @param int $type
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(int $category_id, int $type): View
    {
        $this->authorize('gallery.edit');

        return view('admin.gallery.gallery', compact('category_id', 'type'));
    }

    /**
     * @param int $category_id
     * @param int $type
     * @return string
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function indexJson(int $category_id, int $type)
    {
        $this->authorize('gallery.edit');
        $class = getClassName($type);
        $data = $class::where('id',$category_id)->first();
        $galleries = $data->image;
        $output = '';
        foreach ($galleries as $image) {
            $output .= '<div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-img-actions mx-1 mt-1" style="height: 200px;">
                                        <img class="card-img img-fluid" style="height: 200px;"
                                             src="/' . $image->name . '" alt="">
                                        <div class="card-img-actions-overlay card-img">
                                            <a href="/' . $image->name . '"
                                               class="btn btn-outline-white border-2 btn-icon rounded-pill" data-popup="lightbox"
                                               data-gallery="gallery1" target="_blank">
                                                <i class="icon-plus3"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start flex-nowrap">
                                            <div class="list-icons list-icons-extended ml-auto">
                                            <button class="list-icons-item remove_button" id="' . $image->id . '" onclick="delete_image(' . $image->id . ')" style="background-color: Transparent;background-repeat: no-repeat;border: none;"><i class="icon-bin top-0"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
        }

        return $output;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request,int $category_id, int $type)
    {
        $this->authorize('gallery.edit');
        $class = getClassName($type);
        $module = Str::slug(get_type_name($type),'-');
        $data = $class::where('id',$category_id)->first();
        $imageable = $this->upload_file($request->file('file'), 'gallery/'.$module, 'images');
        $data->image()->create(['name' => $imageable]);
        return response()->json(['success' => $imageable]);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request)
    {
        $this->authorize('gallery.edit');

        $images = Image::where('id', $request->get('id'))->first();
        if ($images && file_exists($images->name)) {
            unlink($images->name);
            Image::where('id', $images->id)->delete();

            return $request->get('id');
        }
    }
}
