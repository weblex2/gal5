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
                    
                    <div class="h-full overflow">
                    <div class="grid grid-cols-8">
                        
                    @foreach ($pics as $i => $pic )
                        @php
                        $path = asset('storage/gal/'.$gal_id."/" . $pic->file_name);
                        $extension = strtoupper(pathinfo($path, PATHINFO_EXTENSION));
                        @endphp
                        <div class="w-32 h-32 overflow-hidden rounded-lg mb-3 bg-slate-700 rounded-lg shadow-2xl shadow-cyan-500/50">
                            <div class="pic_del z-20 position absolute bg-gradient-to-r from-transparent to-gray-900 p-2 text-xs text-right">
                                <form method="POST" action="{{ route("gallery.deletePic") }}"> 
                                    @csrf
                                    <input type="hidden" name="pic_id" value="{{ $pic->id }}">
                                </form> 
                                <a class="javascript:void(0)" onclick="$(this).closest('div').find('form').submit()" href="#">
                                    <i class="text-gray-800 fa fa-trash" aria-hidden="true"></i>
                                           
                                </a>
                            </div>
                        @if (in_array($extension,['JPG','JPEG','GIF','PNG']))
                            <img class="mb-3 w-full  mx-auto rounded-lg shadow-2xl shadow-cyan-500/50 max-h-full" src="{{ Storage::url('gal/'.$gal_id."/" . $pic->file_name) }}">
                        @else
                            <video class="w-full mx-auto ">
                            <source src="{{ Storage::url('gal/'.$gal_id."/" . $pic->file_name) }}" type="video/mp4">
                            Your browser does not support the video tag.
                            </video>               
                        @endif  
                        </div>
                    @endforeach
                    </div>
                    </div>

                </div> 
                
                
                
            </div>    
        </div>    
        
        
    </div>
    <div id="upload_status" class="hidden"></div>
    <script type="text/javascript">
   
    Dropzone.options.dropzone =
    {
        maxFilesize: 500,
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

