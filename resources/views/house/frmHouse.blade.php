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
    Articles:
    @foreach($house->articles as $article)
        {{$article->arnr}}<br>
    @endforeach


</form>


