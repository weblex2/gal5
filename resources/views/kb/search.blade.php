<div class=" search_wrapper bg-gray-200 mb-3 bg-opacity-25 shadow-xl w-full float-left  sm:rounded-lg lg:w-1/5  lg:block lg:float-left lg:mb-1">
    <div class="bg-gray-100 shadow-xs p-3 rounded-t border-b border-slate-100 font-bold lg:text-orange-500 ">Search</div>
    <div class="p-6">
        <form method="GET" action="{{route("kb.show")}}">
            <div >Topic:</div>
            <div>
                <input type="text" name="topic" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
            </div>
            <div >Description:</div>
            <div>
                <input type="text" name="description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
            </div>
            <button type="submit" class="px-3 py-2 mt-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ">Search</button>
        </form>
    </div>
</div>

