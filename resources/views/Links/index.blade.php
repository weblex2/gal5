<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Links') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-4 p-3">
              <form action="{{ route('Links.store') }}" method="POST">
                <div>
                    New Link: 
                    <input class="p-1 rounded mt-3 mb-2 w-full" type="text" name="mylink">
                    @csrf
                    <button type="submit" class="mt-3 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-1  rounded ">Save</button>
                </div> 
              </form>
            </div>  
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
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  Delete
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @php $i=0; @endphp  
                              @foreach ($links as $link)
                              @php $i++; @endphp
                              @php $class = $i % 2 === 0 ? 'bg-white' : 'bg-gray-100'; @endphp
                              <tr class="border-b text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap {{ $class }}">
                                  <td class="p-2">{{ $link->id }}</td>
                                  <td class="p-2"><a target="_blank" class="text-blue-500" href="{{ $link->link }}">{{ $link->link }}</a></td>
                                  <td class="p-2">{{ $link->created_at }}</td>
                                  <td class="p-2">{{ $link->updated_at }}</td>
                                  <td class="text-center">        
                                        <form action="{{ route('Links.destroy',$link->id) }}" method="POST">
                                          @csrf
                                          {{-- @method('DELETE') --}}
                                          <button type="submit"><i class="fa-regular fa-trash-can text-red-500">
                                    </form>
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
