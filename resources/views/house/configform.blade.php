<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit House') }}  {{ $house->id }}
        </h2>
    </x-slot>


    <div class="py-4 w-full">
        <div class="w-full mx-auto px-6">
            <div class="bg-white p-3 w-full overflow-hidden shadow-xl sm:rounded-lg">
                @include('house.frmHouse')
            </div>
        </div>
    </div>

    <div  id="context-menu" style="display:none;position:absolute;z-index:99">
        <ul>
            <li><a href="javascript:void(0)" onclick="$('#context-menu').hide()" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus" ></i> New</a></li>
            <li><a href="#"><i class="fa fa-share-alt"></i> Share</a></li>
            <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
            <li><a href="#"><i class="fa fa-share fa-fw"></i> Move</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i> Copy</a></li>
        </ul>
    </div>

    {{-- include the Modal --}}
    @include('house.frmCreateNewField')



    <script>
        $(function() {
            var mouseX;
            var mouseY;
            $(document).mousemove(function (e) {
                mouseX = e.pageX;
                mouseY = e.pageY;
            });

            $('.context-menu').contextmenu(function(e) {
                e.preventDefault();
                $('#context-menu').show();
                $('#context-menu').offset({'top':mouseY,'left':mouseX})
                $('#afterFieldName').val($(this).attr('field'));
                $('#afterFieldNameDisplay').val($(this).attr('field'));
                //$('#newFieldName').val('');
            });

            $(document).bind("mousedown", function (e) {
                // If the clicked element is not the menu
                if (!$(e.target).parents(".context-menu").length > 0) {
                    // Hide it
                    //$("#context-menu").hide(100);
                }
            });
        });
    </script>
</x-app-layout>



