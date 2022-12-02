@extends('layouts.showallrooms')

@section('rooms')



<div style="width: 15em; float:right; position:relative; margin-top:2em; margin-right:5em;"> 
            <div @click.away="openSort = false" class="relative" x-data="{ openSort: true,sortType:'Sort by' }">
                <button @click="openSort = !openSort" class="flex  text-black bg-gray-200 items-center justify-start w-40  py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg ">
                    <span x-text="sortType"></span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': openSort, 'rotate-0': !openSort}" class="w-4 h-4  transition-transform duration-200 transform "><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
              <div x-show="openSort" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 w-full  origin-top-right">
                <div class="px-2 pt-2 pb-2 bg-white rounded-md shadow-lg dark-mode:bg-gray-700">
                  <div class="flex flex-col">
                    <a @click="sortType='Price',openSort=!openSort" x-show="sortType != 'Price'" class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200 " href="sortprice?hid={{$hid[0]}}">
                      
                      <div class="">
                        <p class="font-semibold">Price</p>
                      </div>
                    </a>
    
                    <a @click="sortType='Capacity',openSort=!openSort" x-show="sortType != 'Capacity'" class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200 " href="sortcap?hid={{$hid[0]}}">
                      
                      <div class="">
                        <p class="font-semibold">Capacity</p>
                      </div>
                    </a>
    
                  </div>
                </div>
              </div>
            </div> </div>
        <script src="//unpkg.com/alpinejs" defer></script>

        <form  method="GET" style="width: 15em; float:right; position:relative; margin-top:2em; margin-right:5em;" action="searchbyname?hid={{$hid[0]}}">   
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" name="skey" required>
            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$hid[0]}}" name="hid" required hidden>
            <div class="flex absolute inset-y-0 right-4 items-center pl-3 pointer-events-none">
            <button type="submit" class="p-1.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
            </div>
        </div>
      
    </form>
            
<div class="py-12" style="display: inline-flex; width: 100%;">



<div class="max-w-100xl mx-auto sm:px-6 lg:px-8">  


        @for ($i=0; $i < $ord; $i++)
        
        <div class="rounded-lg max-w-lg" style="display:inline-flex; margin: 2em;">
        <a href="editroom?id={{$ids[$i]}}">
<div class="mx-5 mt-5">
    <img class="rounded-lg bg-cover" src="Uploads/{{$php[$i]}}" alt="" style="height:120px; width: 200px;">
    <div class="flex flex-row justify-between items-start mt-4">
        <div>
            <p class="text-sm text-gray-800 font-bold">{{$name[$i]}}</p>
            <p class="text-sm text-gray-800">{{$cap[$i]}} person capacity</p>
            <p class="text-sm text-gray-800 mt-2"> <strong>{{$price[$i]}}</strong> per night</p>
        </div>
    </div>
</div></a></div>
@endfor
</div>     

</div>
@endsection


