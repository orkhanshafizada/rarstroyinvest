<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Upload Images to') }} {{ get_type_name($type) }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gallery.store', [$category_id, $type]) }}"
                  method="POST"
                  class="dropzone"
                  id="dropzone"
                  enctype="multipart/form-data">
                @csrf
            </form>
        </div>
    </div>

    <div class="mb-3">
        <h6 class="mb-0 font-weight-semibold">
            Gallery
        </h6>
    </div>
    <div class="row uploadedImages">

    </div>
</div>
