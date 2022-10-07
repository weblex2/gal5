<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit House') }}  {{ $house->id }}
        </h2>
    </x-slot>


    <div class="py-12 w-full">
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




    <!-- Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
         id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
                        Create New Field:
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <div class="grid grid-cols-2">

                        <div>after Field</div><div id="afterFieldName"></div>
                        <div>Type</div>
                        <div id="">
                            <select id="newFieldType" name="newFieldType">
                                <option value="HIDD">Hidden</option>
                                <option value="TEXT">Text</option>
                                <option value="DATE">Date</option>
                                <option value="CKBX">Checkbox</option>
                                <option value="RADIO">Radio</option>
                                <option value="SELECT">Dropdown</option>
                                <option value="TRANS">Translation</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                            data-bs-dismiss="modal">Close</button>
                    <button type="button"
                            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">Understood</button>
                </div>
            </div>
        </div>
    </div>

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
                $('#afterFieldName').text($(this).attr('field'));
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



