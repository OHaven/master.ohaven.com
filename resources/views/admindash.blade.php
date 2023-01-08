@extends('layouts.admindash')

@section('dashboard')
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="width: auto; padding-bottom: 5em;">
                <center><h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin: 5em;">
                    {{ __('Hotel Applications') }}
                </h2></center>
                <script src="//unpkg.com/alpinejs" defer></script>

                <div class="flex flex-col" >
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8" >
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
                                Location
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Accept
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Decline
                            </th>



                              </tr>
                            </thead>
                            <tbody>


@for($i=0; $i < $transcounter; $i++)
                                <tr>


                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{$hotel[$i]}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$loc[$i]}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <div class='button w-40 h-16 bg-green-500 rounded-lg cursor-pointer select-none
                                        active:translate-y-2  active:[box-shadow:0_0px_0_0_#1b6ff8,0_0px_0_0_#1b70f841]
                                        active:border-b-[0px]
                                        transition-all duration-150 [box-shadow:0_10px_0_0_#1b6ff8,0_15px_0_0_#1b70f841]
                                        border-b-[1px] border-blue-400
                                      ' style="background-color: green; height: 3.5em; padding: 0.5em; ">
                                          <a href="acc?id={{$hotelid[$i]}}"><span class='flex flex-col justify-center items-center h-full text-white font-bold text-lg '>Accept</span></a>
                                        </div>
                                    </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <div class='button w-40 h-16 bg-blue-500 rounded-lg cursor-pointer select-none
                                            active:translate-y-2  active:[box-shadow:0_0px_0_0_#1b6ff8,0_0px_0_0_#1b70f841]
                                            active:border-b-[0px]
                                            transition-all duration-150 [box-shadow:0_10px_0_0_#1b6ff8,0_15px_0_0_#1b70f841]
                                            border-b-[1px] border-blue-400
                                          ' style="background-color: red; height: 3.5em; padding: 0.5em; ">
                                              <a href="del?id={{$hotelid[$i]}}"><span class='flex flex-col justify-center items-center h-full text-white font-bold text-lg '>Decline</span></a>
                                            </div>
                                        </span>
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
