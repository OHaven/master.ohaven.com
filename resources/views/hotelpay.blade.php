@extends('layouts.hotelpay')

@section('paymenttable')
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Hotel Payment Details') }}
    </h2>
</x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="width: auto; padding-bottom: 5em;">
                <center><h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin: 5em;">
                    {{ __('Hotel Payment Details') }}
                </h2></center>
                <script src="//unpkg.com/alpinejs" defer></script>

                <div class="flex flex-col" >
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8" >
                      <form  method="GET" style="width: 15em; float:right; position:relative; margin-top:2em; margin-right:5em;" action="hpaykey">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" name="skey" required>
                            <div class="flex absolute inset-y-0 right-4 items-center pl-3 pointer-events-none">
                            <button type="submit" class="p-1.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                            </div>
                        </div>

                    </form>
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8" >
                        <div class="overflow-x" style="width: 100%; overflow-y:scroll; height: 400px;">
                          <table class="min-w-full" style="width: 100%;">
                            <thead class="border-b">
                              <tr>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Hotel Name
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Details
                            </th>


                              </tr>
                            </thead>
                            <tbody>


@for($i=0; $i < $cnter; $i++)
                                <tr>


                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{$paydets[$i]}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                           <a href="vdets?hotel={{$paydets[$i]}}"> View Details </a>
                                        </p>
                                    </td>

                                </tr>
@endfor

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


<div

@endsection
