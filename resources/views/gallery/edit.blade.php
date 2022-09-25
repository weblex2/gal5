@extends('layouts.gallery')
@section('options')
    <a href="{{ route('gallery.edit', ['id'=>1] ) }}">Edit</a>
@endsection

@section('content')
    
        <div class="container_menu  flex flex-grow items-left bg-slate-700">
                menu
        </div>
        <div class="container_pictures flex justify-center items-center flex-grow bg-slate-200">
            <div class="block w-full h-full bg-slate-300">
                <div class="py-12">
                    <div>
                        <div>
                            <div class="text-center">
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
                          
                </div> 
                <div class="flex content-center w-full items-center bg-slate-800">
                    <a class="btn_save" href="{{ route("gallery.save" , [$gal_id]) }}">Save</a>
                </div> 
                
            </div>    
        </div>    
        
        
    </div>

    @endsection

<script type="text/javascript">
    Dropzone.options.dropzone =
    {
        maxFilesize: 12,
        resizeQuality: 1.0,
        //acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 60000,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: '{{ url("files/destroy") }}',
                data: {filename: name},
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
        },
        error: function (file, response) {
            console.log(response);
            return false;
        }
    };
</script>