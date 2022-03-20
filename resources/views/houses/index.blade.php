<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Houses') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('houses.store') }}" method="POST">
                    @csrf


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
                                    <div>
                                        <a class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-1  rounded" href="{{ route('houses.create') }}"> Create New House</a>
                                    </div>
                                  </th>    
                              </tr>      
                              <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  No
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                  First
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    First
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Show
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Edit
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Del
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Del
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @php $i=0; @endphp  
                              @foreach ($houses as $house)
                              @php $i++; @endphp
                              @php $class = $i % 2 === 0 ? 'bg-white' : 'bg-gray-100'; @endphp
                              <tr class="border-b text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap {{ $class }}">
                                  <td class="px-6">{{ $house->id }}</td>
                                  <td>{{ $house->name }}</td>
                                  <td>{{ $house->detail }}</td>
                                  <td>{{ $house->detail }}</td>
                                  <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('houses.show',$house->id) }}"><i class="fa-solid fa-pen text-blue-300"></i></a>
                                  </td>
                                  <td class="text-center">        
                                        <a class="btn btn-primary" href="{{ route('houses.edit',$house->id) }}"><i class="fa-solid fa-eye text-blue-300"></i></a>
                                  </td>
                                  <td class="text-center">        
                                    <form action="{{ route('houses.destroy',$house->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit"><i class="fa-regular fa-trash-can text-red-500">
                                    </form>
                                  </td>
                              </tr>
                              @endforeach


                            </tbody>
                          </table>
                          {!! $houses->links() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center m-4">
                    <button type="submit" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-1  rounded">Submit</button>
                  </div>  

                </form>
            </div>
        </div>
    </div>
</x-app-layout>