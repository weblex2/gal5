<div class="float-left bg-gray-200 bg-opacity-25 shadow-xl sm:rounded-lg w-1/5 p-3">
    <div>Search</div>
    <form method="POST" action="{{route("kb.show")}}">
        @csrf
        <div>Topic:</div>
        <div>
            <input type="text" name="topic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
        </div>
        <button type="submit" class="px-3 py-2 mt-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ">Search</button>
    </form>
</div>