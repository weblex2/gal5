<x-app-layout>

    <div class="py-2 w-full">
        <div class="w-11/12 mx-auto px-6">
            <div class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg ">

                <!-- Column 1 / Image -->
                <div class="grid grid-cols-12 gap-3">

                    <div class="col-span-3 justify-center">
                        <img src="{{Storage::disk("local")->url("shop/img/".$article->image) }}">

                        <div class="grid grid-cols-5 gap-3 mt-3">
                            <div><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/3.1.jpg") }}"></div>
                            <div><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/3.2.jpg") }}"></div>
                            <div><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/".$article->image) }}"></div>
                            <div><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/".$article->image) }}"></div>
                            <div><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/".$article->image) }}"></div>
                        </div>

                    </div>

                    <!-- Column 2 / Details -->
                    <div class="col-span-7 px-3">
                        <p class="font-bold">{{$article->description}}</p>
                        <hr>
                        <div>
                        <span class="discount_percent text-red-500">36%</span> &nbsp;
                        <span class="discount_percent text-green-500">199.68</span>
                            <p class="ordinal">1st</p>
                        </div>
                        <div>
                            Unverb. Preisempf.: 299,00€  <i class="fa-solid fa-circle-info"></i>
                        </div>

                        <div>
                            Preisangaben inkl. USt. Abhängig von der Lieferadresse kann die USt. an der Kasse variieren. <a href="#">Weitere Informationen.</a>
                        </div>

                        <div>
                            <table class="tbl_product_details w-full mt-3 p-3">
                                <tr><th colspan="2">Produktdetails</th></tr>
                                <tr><td class="text-xs font-bold">Marke</td><td>Xiaomi</td></tr>
                                <tr><td class="text-xs font-bold">Modellname</td><td>Mi Robot Vacuum-Mop 2S</td></tr>
                                <tr><td class="text-xs font-bold">Oberflächenempfehlung</td><td>Innenbereich</td></tr>
                                <tr><td class="text-xs font-bold">Besonderes Merkmal</td><td>Kompakt, Hochpräzise Sensoren, Beutellos, Leicht, Nass/Trocken</td></tr>
                                <tr><td class="text-xs font-bold">Farbe</td><td>Weiß</td></tr>
                                <tr><td class="text-xs font-bold">Produktabmessungen</td><td>35L x 35B x 9.5H cm</td></tr>
                                <tr><td class="text-xs font-bold">Controller Typ</td><td>Amazon Alexa</td></tr>
                            </table>
                        </div>

                        <div>
                            <ul class="list-disc p-3 w-5/6">
                            @foreach ($article->details as $key => $detl)
                            <li class="m-2"><div class="float-right">{{$detl->detail}}</div></li>
                            @endforeach
                            </ul>
                        </div>

                        <div class="mt-2">

                            <div><span>Kundenrezensionen nach Funktion</span></div>
                            <div>Saugleistung
                                <i class="fa-regular fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                                4,6</div>
                            <div>Geräuschpegel  <i class="fa-regular fa-star-half-stroke"></i>  4,0</div>
                            <div><a href="#">Alle Rezensionen anzeigen</a></div>
                        </div>
                    </div>

                    <div class="col-span-2 p-2 rounded-lg bg-slate-100">
                        <div>221,01€</div>
                        <div>& KOSTENFREIE Retouren</div>
                        <div><span class="text-sm">KOSTENLOSE Lieferung <b>Montag, 24. Oktober.</b> Bestellung innerhalb 9 Stdn. 34 Min.</span></div>
                        <div><span class="text-sm"><i class="fa-solid fa-location-crosshairs"></i> Liefern an Alexander - 82024 Taufkirchen</span></div>
                        <div><span class="text-lg text-green-600">Nur noch 1 auf Lager</span></div>
                        <button class="bg-amber-300  rounded-3xl w-full mx-auto justify-center px-1 py-2 mt-2 mr-2">In den Einkaufswagen</button>
                        <button class="bg-amber-500  rounded-3xl w-full mx-auto justify-center px-1 py-2 mt-2 mr-2">Jetzt kaufen</button>
                        <div></div><i class="fa-solid fa-lock"></i> Sichere Transaktion</div>
                        <div>Verkauf durch Amazon und Versand durch Amazon.</div>
                    </div>

                </div>
             </div>

        </div>


    </div>

</x-app-layout>
