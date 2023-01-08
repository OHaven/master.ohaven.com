
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
                        {{ __('My Reservations') }}
                    </h2></center>
                    <script src="//unpkg.com/alpinejs" defer></script>


                          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8" >
                            <div class="overflow-x" style="width: 100%; overflow-y:scroll; overflow-x:scroll;">
                              <table class="min-w-full" style="width: 180%;">
                                <thead class="border-b">
                                  <tr>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Reference ID
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>


                                        <input type="text" hidden>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                      Print Receipt
                                    </th>


                                    <input type="text" hidden>


                                  </tr>
                                </thead>
                                <tbody>


                                    @for($i=0; $i<$transcounter; $i++)
                                  <tr class="border-b">

                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                      {{$referid[$i]}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                     @if($status[$i]==0)
                                     <span
                                     class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                     <span aria-hidden
                                         class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                 <span class="relative">Pending</span>
                                 </span>

                                 @elseif($status[$i]==1)
                                 <span
                                 class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                 <span aria-hidden
                                     class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                             <span class="relative" style="color:green;">Reserved</span>
                             </span>

                            <a href="canc?id={{$referid[$i]}}">
                             <span
                             class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                             <span aria-hidden
                                 class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                         <span class="relative" style="color:red;">Cancel</span>
                         </span>
                            </a>

                             <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

                                  <a href="printr?id={{$transid[$i]}}"><x-jet-button class="ml-4">
                                    {{ __('Print') }}
                                           </x-jet-button></a>

                              </td>

                              @else
                              <span
                              class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                              <span aria-hidden
                                  class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                          <span class="relative" style="color:red;;">Cancelled</span>
                          </span>
                                     @endif
                                    </td>


                                  </tr>
                                  @endfor


                                </tbody>
                              </table>
                            </div>
                          </div>

</div>
        </div>


    <div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <center><h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin: 5em;">
                    {{ __('Hotels near Me') }}
                </h2></center>

                @if($counter > 0)
@for ($i=0; $i < $counter; $i++)
<a href="uhrooms?id={{0}}&hid={{$ids[$i]}}">
<div class="bg-white rounded-lg max-w-sm dark:bg-gray-800" style="border:0px; shadow:0px; display:inline-block; width: 20em; margin-left: 2em;">

			<img class="rounded-t-lg p-8" src="Uploads/{{$pfp[$i]}}" alt="Hotel image">

			<div class="px-5 pb-5">
				<a href="#">
					<h3 class="text-gray-900 font-semibold text-xl tracking-tight dark:text-white">{{$hname[$i]}}</h3>
				</a>
				<div class="flex items-center mt-2.5 mb-5">

					<span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{$rating[$i]}}</span>
				</div>
				<div class="flex items-center justify-between">
				</div>
			</div>
	</div>
    </a>
<!-- {{$near[$i]}} -->



@endfor

@else

<center><h4 class="font-semibold text-m text-gray-500 leading-tight" style="margin: 5em;">
                    {{ $near }} <a href='/fhotel'>Find hotels?</a>
                </h4></center>


@endif

</div></div>
    </div>

</x-app-layout>
