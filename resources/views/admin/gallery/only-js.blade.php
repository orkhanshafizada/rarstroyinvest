<script>
    load_images();

    Dropzone.options.dropzone =
        {
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".png,.jpg,.jpeg",
            addRemoveLinks: false,
            timeout:50000,

            success: function () {
                load_images();
            },
            error: function (file, response) {
                return false;
            }
        };

    function load_images() {
        $.ajax({
            url: "{{ route('admin.gallery.indexJson', [$category_id, $type]) }}",
            success: function (data) {
                $('.uploadedImages').html(data)
            }
        })
    }
    function delete_image(imageId) {
        var id = imageId;
        $.ajax({
            beforeSend: function () {
                $('.ajax-loader').css("visibility", "visible");
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: "{{ route('admin.gallery.destroy') }}",
            data: {id: id},
            success: function (data) {
                load_images();
            },
            error: function (e) {
                console.log(e);
            },
            complete: function () {
                $('.ajax-loader').css("visibility", "hidden");
            }
        });
    }

</script>
