<form id="frmHouse" method="POST" action="{{ route('house.update') }}">
    @csrf
    @php
        #dump($house);
        $section = -1;
        if(isset($config)){
            $configClass="field";
        }
        else{
            $configClass="";
        }

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
                <i class="fa-solid fa-caret-down"
                   onclick="$(this).closest('.house_section').find('.house_grid').toggle()"></i>
            </div>
        </div>
        <div class="house_grid my-2 grid grid-cols-10 gap-1">
        @php
            $showLang = Session::get('showLanguages');
            $language_label = [
              'D'   => 'Deutsch',
              'E'   => 'Englisch',
              'F'   => 'Französisch',
            ];
            $lang_cnt = count($showLang);
            $section = $contrl->section;
        @endphp
        @endif

        <!-- create fields with values -->
            @php
                $width = $contrl->field_width-1;
            @endphp
            @if (in_array($contrl->field_type,['HIDD','SEP','SPACE','PTXT']))

                {{-- Seperator --}}
                @if ($contrl->field_type=='SEP')
                    <div class="col-span-10">
                        <hr>
                    </div>

                    {{-- Hidden Field --}}
                @elseif ($contrl->field_type=='HIDD')
                    <input type="hidden" name="{{ $contrl->field_name }}" value="{{ $house->{$contrl->field_name} }}">

                    {{-- Plain Text --}}
                @elseif ($contrl->field_type=='TEXT')
                    {{ $house->{$contrl->field_name} }}

                    {{-- Spacer --}}
                @elseif ($contrl->field_type=='SPACE')
                    @php $wspace = $width +1; @endphp
                    <div class="col-span-{{$wspace}}">&nbsp;</div>
                @endif



            @else

                {{-- Label --}}
                <div class='col-span-1 field_descr'>{{ $contrl->field_name}}</div>

                @switch ($contrl->field_type)

                    {{-- Text --}}
                    @case('TEXT')


                    <div class="col-span-{{ $width }} {{$configClass}}">

                        {{-- TextField from another Table--}}
                        {{-- Translation --}}
                        @if ($contrl->field_data_src!="" && $contrl->field_data_src=="translations")
                            @php $translations = $house->{$contrl->field_data_src}; @endphp

                            {{-- Only translations for this field --}}
                            <div class="grid grid-cols-{{ $lang_cnt }} gap-3">
                                {{--@foreach  ($translations as $item)--}}
                                  @foreach  ($house->showLang as $lang)
                                        @php
                                            $val="";
                                            $item_id = "";
                                        @endphp
                                        @foreach  ($translations as $item)

                                            @if ( $item->field == $contrl->field_name && $lang == $item->language )
                                                @php
                                                $val = $item->translation;
                                                $item_id = $item->id;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            if ($item_id == "") $item_id = $lang;
                                        @endphp
                                        <div class="translation">
                                            <span class="translation_header">{{ $language_label[$lang] }}</span>
                                            <input type="text" f="{{$contrl->field_name}}"
                                                   name="trans[{{ $contrl->field_name }}][{{ $item_id }}]"
                                                   id="trans_{{$contrl->field_name}}_{{ $item->language }}"
                                                   value="{{ $val }}"
                                            />
                                        </div>



                                @endforeach
                            </div>


                            {{-- Normal Text field--}}
                        @else
                            <input type="text"
                                   name="{{ $contrl->field_name }}"
                                   id="txt_{{$contrl->field_name}}"
                                   value="{{ $house->{$contrl->field_name} }}"
                            />

                        @endif
                    </div>
                    @break

                    {{-- Text Area --}}
                    @case('TEXTA')


                    <div class="col-span-{{ $width }} {{$configClass}}">

                        {{-- TextField from another Table--}}
                        {{-- Translation --}}
                        @if ($contrl->field_data_src!="" && $contrl->field_data_src=="translations")
                            @php $translations = $house->{$contrl->field_data_src}; @endphp

                            {{-- Only translations for this field --}}
                            <div class="grid grid-cols-3 gap-3">
                                @foreach  ($translations as $item)
                                    @if ( $item->field == $contrl->field_name)
                                        <div class="translation">
                                            <span class="tranlation_header">sprache</span>
                                            <textarea
                                                name="trans[{{ $contrl->field_name }}][{{ $item->id }}]"
                                                id="trans_{{$contrl->field_name}}_{{ $item->language }}"
                                                value=""
                                            />{{ $item->translation }}</textarea>
                                        </div>
                                    @endif
                                @endforeach
                            </div>


                            {{-- Normal Text field--}}
                        @else
                            <input type="text"
                                   name="{{ $contrl->field_name }}"
                                   id="txt_{{$contrl->field_name}}"
                                   value="{{ $house->{$contrl->field_name} }}"
                            />

                        @endif
                    </div>
                    @break

                    {{-- Checkboxes --}}
                    @case('CKBX')
                    <div class="col-span-{{$width}}  {{$configClass}}">
                        <input type="hidden" name="{{ $contrl->field_name }}" value="0">
                        <input type="checkbox"
                               name="{{ $contrl->field_name }}"
                               id="ckbx_{{ $contrl->field_name }}"
                               value="{{ $house->{$contrl->field_name} }}"
                            {{ $house->{$contrl->field_name}==1 ? "checked" : ""}}
                        />
                    </div>
                    @break

                    {{-- Radio --}}
                    @case('RADIO')
                    <div class="col-span-{{$width}}  {{$configClass}}">
                        @foreach ($contrl->inputs as $inp)
                            <div>
                                <input type="radio"
                                       name="{{ $contrl->field_name }}"
                                       id="ckbx_{{ $contrl->field_name }}"
                                       value="{{ $inp->code }}"
                                    {{ $inp->code == $house->{$contrl->field_name} ? " checked ": "" }}
                                />
                                {{ $inp->value }}


                            </div>
                        @endforeach
                    </div>
                    @break

                    {{-- Datepicker --}}
                    @case('DATE')
                    <div class="col-span-{{$width}}  {{$configClass}}">
                        <div class="datepicker" data-mdb-toggle-button="true" data-mdb-format="dd.mm.yyyy" data-mdb-language="de">
                            <input name="{{$contrl->field_name}}"
                                   id="dat_{{$contrl->field_name}}"
                                   value="{{ $house->{$contrl->field_name} }}"
                                   type="text"
                            />
                        </div>
                    </div>
                    @break

                    {{-- Select --}}
                    @case ('SELECT')
                    <div class="col-span-{{ $width }}  {{$configClass}}">
                        <select name="{{ $contrl->field_name }}" id="sel_{{$contrl->field_name}}">
                            @foreach($contrl->inputs as $inp)
                                <option
                                    value="{{ $inp->code }}" {{ $house->{$contrl->field_name}==$inp->code ? "selected" : ""  }} >{{ $inp->value }}</option>
                            @endforeach
                        </select>
                    </div>
                    @break

                    {{-- Default nothing --}}
                    @default
                    @break
                @endswitch
            @endif

            @php
                #echo makeFormField($contrl, $house);
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
        <input
            class="w-full bg-white border border-slate-400 drop-shadow-md rounded-md py-2 pl-3 pr-10 focus:outline-none"
            placeholder="Enter your keyword to search" type="text"/>

        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </span>
    </label>

</form>

<script>

</script>


