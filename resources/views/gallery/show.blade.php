<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Gallery2') }}
        </h2>
    </x-slot>
    <div class="container_menu  flex flex-grow items-left bg-slate-700">
      <div class="w-full">
      <div class="menu_header">menu</div>
      <div><a class="btn_edit" href="{{ route("gallery.edit" , [$gal_id]) }}">Edit</a></div>
      </div>
    </div>
    <div class="container_pictures flex justify-center items-center flex-grow bg-slate-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-12">
            <div id="pic_overview" class="grid grid-cols-10 gap-3 auto-rows-max">
                @foreach ($pics as $pic)
                <div>
                    abc
                    <a href="{{ route('gallery.showPic',$pic->id) }}">
                    <img class="preview_pic" src="{{ Storage::url('gal/'.$gal_id."/medium_photos/" . $pic->hash) }}"></img>
                    </a>
                </div>
            @endforeach
asdasda
            @php
                echo "hallo " .count($pics);
            @endphp        

            @if (count($pics)==0) 
                No pics found.
            @endif
             
            </div>   
            <div class="flex">
                {{ $pics->links() }}
            </div> 
        </div>
       
    </div>  
</x-app-layout>





<script type="text/javascript">
    Dropzone.options.dropzone =
    {
        maxFilesize: 12,
        resizeQuality: 1.0,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
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