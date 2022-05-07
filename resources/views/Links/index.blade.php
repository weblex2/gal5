<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Houses') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  @if ($errors->any())
                    <div class="sm:rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif    
                
                <div class="flex flex-col">
                  <form action="{{ route('Links.store') }}" method="POST">
                    <div>
                      New Link: <input type="text" name="mylink">
                        @csrf
                        <button type="submit">Save</button>
                    </div> 
                  </form>
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                          <table class="min-w-full">
                            <thead class="bg-white border-b">
                              <tr>
                                  <th colspan="6">
                                    
                                  </th>    
                              </tr>      
                              <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  ID
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Link
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Created
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Updated
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @php $i=0; @endphp  
                              @foreach ($links as $link)
                              @php $i++; @endphp
                              @php $class = $i % 2 === 0 ? 'bg-white' : 'bg-gray-100'; @endphp
                              <tr class="border-b text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap {{ $class }}">
                                  <td class="px-6">{{ $link->id }}</td>
                                  <td class="px-6"><a target="_blank" class="text-blue-500" href="{{ $link->link }}">{{ $link->link }}</a></td>
                                  <td class="px-6">{{ $link->created_at }}</td>
                                  <td class="px-6">{{ $link->updated_at }}</td>
                                  
                                  <td class="text-center">        
                                        <a class="btn btn-primary" href="{{ route('houses.edit',$link->id) }}"><i class="fa-solid fa-eye text-blue-300"></i></a>
                                  </td>
                                  <td class="text-center">        
                                    
                                  </td>
                              </tr>
                              @endforeach


                            </tbody>
                          </table>
                          
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>
</x-app-layout>
