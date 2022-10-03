@extends('layouts.gallery')
@section('options')
    <div class="container_menu_header">
        menu

        {{-- @if ($saved){
            <div>saved!!</div>
        }
        @else{
            <div>Nöööööö</div>
        }
        @endif --}}
    </div>
    <div class="galleryEditMenu">
        <form id="frmSaveGallery" method="POST" action="{{ route("gallery.save") }}">    
            @csrf
            <input type="hidden" name="gal_id" value="{{$gal_id}}">
            <table>
                <tr>
                    <td>Public:</td> 
                    <td><input type="checkbox" name="public" {{  ($gallery->public == 1 ? ' checked' : '') }}></td>
                </tr>    
                <tr>
                    <td>Gallery Name</td>
                    <td><input class="galInput" type="text" name="gal_name" value="{{ $gallery->gal_name }}"></td>
                </tr>
            </table>        
            <div class="row-span-2"><button type="submit" class="btn_save">Save</a></div>
        </form>
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
                <div class="container mb-6 ">      
                    <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data"
                        class="dropzone h-40 overflow-auto" id="dropzone">
                        @csrf
                        <input type="hidden" name="gal_id" value="{{ $gal_id }}">
                        <input type="hidden" name="user_id" value="{{ $gal_id }}">
                    </form>
                    <div class="flex content-center w-full items-center bg-slate-800 mt-3">
                    
                    </div>     
                    
                    <div class="h-full overflow">
                    <div class="preview grid grid-cols-8">
                        
                    @foreach ($pics as $i => $pic )
                        @php
                        $path = asset('storage/gal/'.$gal_id."/" . $pic->file_name);
                        $extension = strtoupper(pathinfo($path, PATHINFO_EXTENSION));
                        @endphp
                        <div class="pic_del_wrapper picWrapper_{{ $pic->id }}">
                            <div class="pic_del">
                                <i class="cursor-pointer mr-1 text-slate-500 fa fa-trash" aria-hidden="true" onclick="deletePic({{ $pic->id }})"></i>       
                                <i class="cursor-pointer mr-1 text-slate-500 fa fa-image"  onclick="setGalleryBackground({{ $pic->id }})"></i>   
                                <i class="cursor-pointer mr-1 text-slate-500 fa fa-user"  onclick="togglePicPublic({{ $pic->id }})"></i>   
                                <i class="cursor-pointer mr-1 text-slate-500 fa fa-location-pin"></i>
                                <i class="cursor-pointer mr-1 text-slate-500 fa fa-calendar"></i>
                                <i class="cursor-pointer mr-1 text-slate-500 fa fa-date"></i>
                                </a>
                            </div>
                            
                        @if (in_array($extension,['JPG','JPEG','GIF','PNG']))
                            <img class="mb-3 w-full  mx-auto rounded-b-lg shadow-2xl shadow-cyan-500/50 max-h-full" src="{{ Storage::url('gal/'.$gal_id."/medium_photos/" . $pic->hash) }}">
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
   
        function togglePicPublic(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },        
                type: 'POST',
                url: '{{ url("gallery/togglePicPublic") }}',
                data: {
                        pic_id: id
                },
                success: function (data){
                    data  = JSON.parse(data);
                    console.log(data.public);
                    var p = "";
                    if (data.public == 1) {
                        p = 'public'
                    } 
                    else {
                        p = 'private';
                    }
                    console.log("Pic is "+ p + " now");
                    $('.fa-user').each(function(index){
                         $(this).removeClass('picPublic');   
                    });
                    var picPublicClass = "";
                    if (data.public ==1) {
                        $('.picWrapper_'+id).find('.pic_del').find('.fa-user').removeClass('picPrivateClass').addClass('picPublicClass');
                    }
                    else {
                        $('.picWrapper_'+id).find('.pic_del').find('.fa-user').removeClass('picPublicClass').addClass('picPrivateClass');
                    }    
                },
                error: function( data) {
                    console.log(data);
                }
            });
        }

        function setGalleryBackground(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },        
                type: 'POST',
                url: '{{ url("gallery/setBackground") }}',
                data: {
                        pic_id: id
                },
                success: function (data){
                    console.log("Background has been successfully set!!");
                    $('.fa-image').each(function(index){
                         $(this).removeClass('isGalleryBackgroundImage');   
                    });
                    $('.picWrapper_'+id).find('.pic_del').find('.fa-image').addClass('isGalleryBackgroundImage');
                },
                error: function( data) {
                    console.log(data);
                }
            });
        }

        function deletePic(id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },        
                type: 'POST',
                url: '{{ url("files/destroy") }}',
                data: {
                        pic_id: id
                },
                success: function (data){
                    console.log("File has been successfully removed!!");
                    $('.picWrapper_'+id).remove();

                },
                error: function( data) {
                    console.log(data);
                }
            });
        };        
        

        

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
            //alert(pic_id);
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
            $(file.previewElement).attr('pic_id', response.id);
            $('#upload_status').prepend("<div>" + response.timestamp+ ": File " + response.filename + " successfully uploaded. <br>Exif <i class='text-green-700 fa-solid fa-check'></i>OSM <i class='text-green-700 fa-solid fa-check'></i></div>");
            var img = $(file.previewElement).find('.dz-image').html();
            
            var html='<div class="pic_del_wrapper picWrapper_'+response.id+'">' +
                        '<div class="pic_del">' +
                            '<i class="cursor-pointer mr-1 text-orange-500 fa fa-trash " onclick="deletePic('+response.id+')"></i>' + 
                            '<i class="cursor-pointer mr-1 text-orange-500 fa fa-image"  onclick="setGalleryBackground('+response.id+')"></i>' + 
                            '<i class="cursor-pointer mr-1 text-orange-500 fa fa-user"   onclick="makeImagePublic('+response.id+')"></i>' +   
                        '</div>'+ img +                        
                    '</div>';
                        
            
            $(file.previewElement).remove();
            //alert(html);
            $('.preview').append(html);  
            $('.picWrapper_'+response.id).find('img').addClass("mb-3 w-full  mx-auto rounded-lg shadow-2xl shadow-cyan-500/50 max-h-full");  
        },
        error: function (file, response) {
            console.log(response);
            return false;
        }
    };
   
</script>

    @endsection

