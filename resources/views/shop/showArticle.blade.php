<x-app-layout>

    <div class="py-2 w-full">
        <div class="w-11/12 mx-auto px-6">
            <div class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg ">

                <!-- Column 1 / Image -->
                <div class="grid grid-cols-12 gap-3">

                    <div class="col-span-3 justify-center">
                        <img src="{{Storage::disk("local")->url("shop/img/".$article->image) }}">

                        <div class="grid grid-cols-5 gap-2 mt-3 p-2">
                            <div class="border border-red-500 w-15 h-15"><img class="w-15 h-15" src="{{Storage::disk("local")->url("shop/img/3.1.jpg") }}"></div>
                            <div class="border border-red-500 w-16 h-16"><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/3.2.jpg") }}"></div>
                            <div class="border border-red-500 w-16 h-16"><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/".$article->image) }}"></div>
                            <div class="border border-red-500 w-16 h-16"><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/".$article->image) }}"></div>
                            <div class="border border-red-500 w-16 h-16"><img class="w-16 h-16" src="{{Storage::disk("local")->url("shop/img/".$article->image) }}"></div>
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
                            <li class="mt-1"><div >{{$detl->detail}}</div></li>
                            @endforeach
                            </ul>
                        </div>

                        <div class="mt-2">

                            <div><span><h5>Kundenrezensionen nach Funktion</h5></span></div>
                            <div>Saugleistung
                                <i class="fa fa-star text-yellow-600"></i>
                                <i class="fa fa-star text-yellow-600"></i>
                                <i class="fa fa-star text-yellow-600"></i>
                                <i class="fa-regular fa-star-half-stroke text-yellow-600"></i>
                                <i class="fa-regular fa-star text-yellow-600"></i>
                                4,6</div>
                            <div>Geräuschpegel  <i class="fa-regular fa-star-half-stroke"></i>  4,0</div>
                            <div><a href="#">Alle Rezensionen anzeigen</a></div>
                        </div>
                    </div>

                    <!-- Column 3 Buy it -->
                    <div class="col-span-2 p-2 rounded-lg bg-slate-100">
                        <div class="my-3 flex">
                            <div class="text-[20px] float-left font-bold">221</div>
                            <div class="float-left text-xs mt-[1px] font-bold">01 €</div>
                            <div class="float-none"></div>
                            <br>
                        </div>

                        <div>KOSTENFREIE Retouren</div>
                        <div><span class="text-sm">KOSTENLOSE Lieferung <b>Montag, 24. Oktober.</b> Bestellung innerhalb 9 Stdn. 34 Min.</span></div>
                        <div><span class="text-sm"><i class="fa-solid fa-location-crosshairs"></i> Liefern an Alexander - 82024 Taufkirchen</span></div>
                        <form id="frmAdd2cart" method="POST" action="{{route("shop.add2cart")}}">
                            @csrf
                        <div class="mt-2">
                            <div class="float-left w-1/4 flex pt-2">Menge</div>
                            <div class="float-left w-3/4"> 
                            <select name="quantity" class="border-gray-300 text-xs focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 ">
                                @for ($i=1; $i<11; $i++)
                                <option value={{$i}}>{{$i}}</option>    
                                @endfor
                            </select>        
                            </div>
                        </div>    
                        <div><span class="text-lg text-green-600">Nur noch 1 auf Lager</span></div>
                        <button class="bg-amber-300 hover:bg-amber-400 rounded-3xl w-full mx-auto justify-center px-1 py-2 mt-2 mr-2">In den Einkaufswagen</button>
                        <button class="bg-amber-500 hover:bg-amber-600 rounded-3xl w-full mx-auto justify-center px-1 py-2 mt-2 mr-2">Jetzt kaufen</button>
                        <input type="hidden" name="article_id" value="{{$article->id}}">
                        </form>
                        <div class="mt-2 pl-2 text-sm font-bold"><i class="fa-solid fa-lock text-yellow-600"></i> Sichere Transaktion</div>
                        <div class="text-xs">Verkauf durch Amazon und Versand durch Amazon.</div>
                        <div class="text-xs mt-2">Rücksendungen: <a class="text-xs" href="#">Retournierbar innerhalb von 30 Tagen nach Erhalt</a></div>
                        <div>
                            <div class="my-2 text-xs font-bold">
                            Extra Schutz?<br>
                            Prüfen Sie, ob die Abdeckung Ihre Bedürfnisse deckt:
                            </div>
                            <input type="checkbox" value=""> 2 Jahre Erweiterte Garantie für 14,85 €<br>
                            <input type="checkbox" value=""> 3 Jahre Erweiterte Garantie für 20,55 €<br>
                            Geschenkoptionen hinzufügen<br>
                            <hr>
                            <button class="border border-slate-500 mt-1 p-2 w-full">Auf die Liste</button><br>

                            <button class="border border-slate-500 mt-1 p-2 w-full">Auf die Hochzeitsliste</button>


                        </div>
                    </div>


                    <div class="col-span-12">
                        <hr>
                        <div class="p-2">
                            <h4>Verwandte Produkte zu diesem Artikel</h4>
                            <div class="grid grid-cols-9 gap-3">

                                <div class="flex justify-center items-center h-full">
                                    <div class="flex justify-center items-center bg-slate-100 border border-slate-500 rounded p-3 w-10 h-10">
                                        <i class="fa-solid fa-angle-left"></i>
                                    </div>
                                </div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/1.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/2.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/3.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/4.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/5.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/6.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/7.jpg")}}"></div>
                                <div class="flex justify-center items-center h-full">
                                    <div class="flex justify-center items-center bg-slate-100 border border-slate-500 rounded p-3 w-10 h-10">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="grid grid-cols-9 gap-3">

                        <div> </div>

                        <div>
                            <div class="text-sm">
                                <a href="#">
                                    Saugroboter Zigma Saug -Wischroboter 4000Pa, WLAN Staubsauger Roboter mit Intelligenter...
                                </a>
                                <div class="font-bold text-red-600">399.20 €</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">
                                <a href="#">
                                    Saugroboter Zigma Saug -Wischroboter 4000Pa, WLAN Staubsauger Roboter mit Intelligenter...
                                </a>
                                <div class="font-bold text-red-600">399.20 €</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">
                                <a href="#">
                                    Saugroboter Zigma Saug -Wischroboter 4000Pa, WLAN Staubsauger Roboter mit Intelligenter...
                                </a>
                                <div class="font-bold text-red-600">399.20 €</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">
                                <a href="#">
                                    Saugroboter Zigma Saug -Wischroboter 4000Pa, WLAN Staubsauger Roboter mit Intelligenter...
                                </a>
                                <div class="font-bold text-red-600">399.20 €</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">
                                <a href="#">
                                    Saugroboter Zigma Saug -Wischroboter 4000Pa, WLAN Staubsauger Roboter mit Intelligenter...
                                </a>
                                <div class="font-bold text-red-600">399.20 €</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">
                                <a href="#">
                                    Saugroboter Zigma Saug -Wischroboter 4000Pa, WLAN Staubsauger Roboter mit Intelligenter...
                                </a>
                                <div class="font-bold text-red-600">399.20 €</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm">
                                <a href="#">
                                    Saugroboter Zigma Saug -Wischroboter 4000Pa, WLAN Staubsauger Roboter mit Intelligenter...
                                </a>
                                <div class="font-bold text-red-600">399.20 €</div>
                            </div>
                        </div>
                        <div> </div>
                    </div>
                </div>

                    </div>

                    <div class="col-span-12">
                        <hr>
                        <div class="p-2">
                            <h4>Von Kunden häufig angesehen</h4></div>
                            <div class="grid grid-cols-9 gap-3">

                                <div class="flex justify-center items-center h-full">
                                    <div class="flex justify-center items-center bg-slate-100 border border-slate-500 rounded p-3 w-10 h-10">
                                        <i class="fa-solid fa-angle-left"></i></div>
                                </div>

                                <div> <img src="{{Storage::disk("local")->url("shop/img/1.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/2.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/3.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/4.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/5.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/6.jpg")}}"></div>
                                <div> <img src="{{Storage::disk("local")->url("shop/img/7.jpg")}}"></div>
                                <div class="flex justify-center items-center h-full">
                                    <div class="flex justify-center items-center bg-slate-100 border border-slate-500 rounded p-3 w-10 h-10">
                                        <i class="fa-solid fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 h-48"></div>
                    </div>

                </div>
             </div>

        </div>
    </div>

</x-app-layout>
