@extends('layouts.gallery')
@section('options')
    <div class="container_menu_header">
                menu
    </div>
@endsection

@section('content')
    
        
        <div class="container_pictures w-full flex justify-center items-center flex-grow">
            <div class="block w-full h-full">
                <div class="py-12">
                    <div>
                        <div>
                            <div class="text-center text-slate-400">
                                <h2>Upload Files</h2> 
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="container mb-6">      
                    <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data"
                        class="dropzone" id="dropzone">
                        @csrf
                        <input type="hidden" name="gal_id" value="{{ $gal_id }}">
                        <input type="hidden" name="user_id" value="{{ $gal_id }}">
                    </form>
                    <div class="flex content-center w-full items-center bg-slate-800 mt-3">
                    <a class="btn_save" href="{{ route("gallery.save" , [$gal_id]) }}">Save</a>
                    </div>       
                </div> 
                
                
            </div>    
        </div>    
        
        
    </div>
    <div id="upload_status"></div>
    <script type="text/javascript">
   
    Dropzone.options.dropzone =
    {
        //maxFilesize: 12,
        resizeQuality: 1.0,
        //acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        //timeout: 60000,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            var pic_id = $(file.previewElement).attr('pic_id');
            alert(pic_id);
            $.ajax({
                //headers: {
                //    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                //        },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },        
                type: 'POST',
                url: '{{ url("files/destroy") }}',
                data: {
                        pic_id: pic_id
                },
                success: function (data){
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ? 
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function (file, response) {
            console.log(response);
            console.log(file);
            console.log($(file.previewElement).length);
            $(file.previewElement).attr('pic_id', response.id);
            $('#upload_status').prepend("<div>" + response.timestamp+ ": File " + response.filename + " successfully uploaded. <br>Exif <i class='text-green-700 fa-solid fa-check'></i>OSM <i class='text-green-700 fa-solid fa-check'></i></div>");
        },
        error: function (file, response) {
            console.log(response);
            return false;
        }
    };
   
</script>

    @endsection

