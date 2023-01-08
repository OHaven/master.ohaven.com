@extends('layouts.trans')

@section('latest')

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="width: auto; padding-bottom: 5em;">
                <center><h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin: 5em;">
                    {{ __('Recent Transactions') }}
                </h2></center>
                <script src="//unpkg.com/alpinejs" defer></script>

                <div class="flex flex-col" >
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8" >
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8" >
                        <div class="overflow-x" style="width: 100%; overflow-x:scroll;">
                          <table class="min-w-full" style="width: 100%;">
                            <thead class="border-b">
                              <tr>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Reference ID
                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Reservation Date
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nights
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Request Payment
                            </th>



                              </tr>
                            </thead>
                            <tbody>


@for($i=0; $i < $transcounter; $i++)
                                <tr>


                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{$refid[$i]}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$st[$i]}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        {{$numdays[$i]}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                            @if($stat[$i]==0)
                                            <span
                                            class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                        <span class="relative">
                                            Pending
                                            @elseif($stat[$i]==1)
                                            Reserved
                                        <td  class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <a href="#">Settle</a> </td></span>
                                            @else
                                            <span
                                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">
                                            Cancelled
                                            <td  class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <a href="#">Settle</a> </td></span>

                                            @endif
                                        </span>
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
@endsection
