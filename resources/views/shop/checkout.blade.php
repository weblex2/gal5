@php
    $cart = session()->get('cartItems',[]);
    $success = session()->get('success');
    $error = session()->get('error');
    $deliveryAddress = session()->get('deliveryAddress',[]);
@endphp
<x-app-layout>
    
    <div class="py-2 w-full">
        <div class="w-11/12 mx-auto px-6">
            <div class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg p-6">

                @if ($success)
                    <div class="w-fill mb-3 bg-green-300 text-green-700 border border-green-500 p-2 rounded">
                        Alles bezahlt, supi! 
                    </div>
                    <?php Session::forget('success');?>
                @endif    
                @if ($error)
                    <div class="w-fill mb-3  bg-red-300 text-red-800 border border-red-500 p-2 rounded">
                        Nope, da ist was schiefgelaufen... {{$error}} 
                    </div>
                    <?php Session::forget('error');?>
                @endif

                <h1 class="text-xl">Einkaufswagen</h1>
                <div class="spacer">&nbsp;</div>

                
                

                @if (count($cart)>0) 
                <div class="grid grid-cols-12">
                    
                    <div class="col-span-10"> 

                        <form id="frmPay" method="POST" action="{{ route("paypal.pay") }}">
                            @csrf
                            <div id="mycart" class="grid grid-cols-12 gap-1">
                                @foreach($cart as $i => $item)
                                <div class="wk_id_{{$i}} col-span-2">
                                    <img class="col-span-4 w-48 h-48 rounded-lg" src="{{Storage::disk("local")->url("shop/img/".$item['img'])}}">
                                </div>    
                                <div class="wk_id_{{$i}} col-span-9 pt-2">
                                    <div>
                                        {{ $item['name']}} 
                                        <div class="text-red-700 text-xs">Nur noch 5 auf Lager</div>
                                    </div>
                                    <div>
                                        <select name='sel1' class="border-gray-300 text-xs focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 ">
                                            @for($j=1; $j<11; $j++)
                                                <option value="{{$j}}" {{ ( $item['quantity'] == $j) ? 'selected' : '' }}>{{$j}}</option>
                                            @endfor
                                        </select>  
                                        <input type="hidden" name="prod[{{$i}}][name]" value="{{ $item['name']}}"> 
                                        <input type="hidden" name="prod[{{$i}}][quantity]" value="{{ $item['quantity']}}"> 
                                        <input type="hidden" name="prod[{{$i}}][price]" value="{{ $item['price_per_item']}}"> 
                                        <a href="javascript:void(0)" onclick="deleteItemFromCart({{$i}})" >Löschen</a> | 
                                        <a href="#">Auf die Merkliste</a> | 
                                        <a href="#">Teilen</a> 
                                    </div>  
                                    
                                </div>
                                <div class="wk_id_{{$i}} col-span-1 font-bold pt-2 ">
                                    @money($item['price_per_item']) €
                                </div>
                                <div class="wk_id_{{$i}} col-span-12 pr-3"><hr></div>
                                <div class="spacer">&nbsp;</div>
                                @endforeach
                            </div>
                        </form>

                    </div>
                    <div class="-mt-4 col-span-2 p-3 bg-slate-100 rounded">
                        <div class="text-xs text-green-700 font-bold">
                            Ihre Bestellung qualifiziert sich für GRATIS Standardversand. Details
                        </div>    
                        <div class="mt-3 w-full">  
                            <div class="text-sm">Summe ({{ $totalArticleCnt }} Artikel):
                                <span id="wk_totalAmount" class="font-bold">  @money($totalAmount)  €</span>
                            </div>
                            <div class="my-3 pt-1 text-xs font-bold">
                                <input type="checkbox" value="is_present"> 
                                Bestellung enthält ein Geschenk
                            </div>
                            <button onclick="$('#frmPay').submit()" class="bg-amber-300 hover:bg-amber-400 rounded-3xl w-full mx-auto justify-center px-1 py-2 mt-2 mr-2">
                                Zur Kasse gehen
                            </button>
                        </div>    
                    </div>    
                </div>  
                @else
                    Nix drin, geh einkaufen!
                @endif
            </div>    
              
        </div>
    </div>
   

    <script>
        function deleteItemFromCart(i){
            var num = {};
            num['item'] = i;
            //alert("vals" + values);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },  
                url: "{{ route("shop.deleteItem")}}",
                type: "post",
                data: num ,
                success: function (response) {
                    console.log(response);  
                    response = JSON.parse(response);
                    console.log(response); 
                    $('#wk_cnt').text(response.wk_cnt); 
                    $('#wk_totalAmount').text(parseFloat(response.wk_totalAmount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\,)/g, "$1.").toString()); 
                    $('#mycart').append("<div class='col-span-12'><a href='showArticle/" + response.article_id +"'>" + response.wk_name + "</a> wurde wurde entfernt aus: Einkaufswagen.</div>");   
                    $('.wk_id_'+i).remove(); 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            }, 'json');
        }
        $(function(){
            
        })
    </script>    
</x-app-layout>