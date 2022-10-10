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
                        <i class="fa fa-plus"></i> New Field
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">

                <form id="frmCreateField" action="{{route("house.createField")}}" method="POST" class="frmHouse">
                    @csrf
                    <div class="grid grid-cols-2 gap-1">

                        <div>After Field</div>
                        <div>
                            <input type="text"   id="afterFieldNameDisplay" disabled>
                            <input type="hidden" id="afterFieldName"        name="afterFieldName">
                        </div>

                        <div>Name</div>
                        <div><input type="TEXT" name="newFieldName" id="newFieldName"></div>

                        <div>Type</div>
                        <div id="">
                            <select id="newFieldType" name="newFieldType">
                                <option value="TEXT">Text</option>
                                <option value="DATE">Date</option>
                                <option value="CKBX">Checkbox</option>
                                <option value="RADIO">Radio</option>
                                <option value="SELECT">Dropdown</option>
                                <option value="TRANS">Translation</option>
                                <option value="HIDD">Hidden</option>
                                <option value="SPACE">Space</option>
                                <option value="SEP">Seperator</option>
                            </select>
                        </div>

                        <div>Length</div>
                        <div><input type="TEXT" name="newFieldLength" id="newFieldLength"></div>

                        <div>Display With (1-10)</div>
                        <div>
                            <select name="displayWidth" id="displayWidth">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>

                    </div>
                    <button type="button" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="checkNewFieldForm()">Save</button>
                </form>
            </div>
            <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">

            </div>
        </div>
    </div>
</div>


<script>

    function checkNewFieldForm(){
        var err = [];
        if ($('#newFieldName').val()=="") {
            err.push('Give the field a name!')
        }
        if ($('#newFieldType').val()=="TEXT" &&  $('#newFieldLength').val()=="") {
            err.push('Please specify a length!')
        }
        console.log(err);
        if (err.length>0) {
            alert(err);
        }
        else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route("house.createField") }}',
                data: $('#frmCreateField').serialize(),
                success: function (data){
                    console.log("success");
                },
                error: function( data) {
                    console.log(data);
                    console.log(data.responseJSON);
                }
            });
        }
    }

    function deleteField(){

    }

</script>
