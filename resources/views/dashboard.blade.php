
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>




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
