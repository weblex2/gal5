<form id="frmHouse" method="POST" action="{{ route('house.update') }}">
    @csrf
    @php
        #dump($house);
    @endphp
    <div class="grid grid-cols-10 gap-1">
    @foreach( $frmHouse as $contrl)
        @php
        echo makeFormField($contrl, $house);
        @endphp
    @endforeach
    </div>
    <button class="house_btn_save" type="submit">Save</button>


    <div class="grid grid-cols-10 gap-1 hidden">
        <div class="col-span-1">1</div>
        <div class="col-span-9"></div>
        <div class="col-span-2">1</div>
        <div class="col-span-8"></div>
        <div class="col-span-3">1</div>
        <div class="col-span-7"></div>
        <div class="col-span-4">1</div>
        <div class="col-span-6"></div>
        <div class="col-span-5">1</div>
        <div class="col-span-5"></div>
        <div class="col-span-10">1</div>
        </div>
    </div>


    <label class="relative block hidden">
        <input class="w-full bg-white border border-slate-400 drop-shadow-md rounded-md py-2 pl-3 pr-10 focus:outline-none"
            placeholder="Enter your keyword to search" type="text" />

        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </span>
    </label>

</form>


