<form id="frmHouse" method="POST" action="{{ route('house.update') }}">
    @csrf
    @php
        #dump($house);
        $section = -1;
    @endphp

    @foreach( $frmHouse as $i => $contrl)

        @if ($contrl->section != $section)
            @if ($i>0)
                </div>
                </div>
            @endif
            <div class="house_section">
                <div class="house_section_header w-full h-10">
                    <div class="float-left w-fit">Section</div>
                    <div class="float-right w-fit>">
                        <i class="fa-solid fa-caret-down" onclick="$(this).closest('.house_section').find('.house_grid').toggle()"></i>
                    </div>
                </div>
                <div class="house_grid my-2 grid grid-cols-10 gap-1">
            @php
                $section = $contrl->section;
            @endphp
        @endif
        @php
        echo makeFormField($contrl, $house);
        @endphp
    @endforeach
            </div>
    </div>


    <button class="house_btn_save" type="submit">Save</button>


    <div class="grid grid-cols-3">


    <div class="grid grid-cols-10 gap-1 hidden w-1/3 ">
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


