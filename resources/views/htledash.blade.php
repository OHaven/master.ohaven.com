@extends('layouts.hteldash')

@section('dashboard')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id="chart" style="border: none;display: inline-flex; margin-left: 5em; width: 29em;"></div>

                <script>

                    var options = {
                      series: [{
                        name: "Rooms",
                        data: [{{$ord}},0,0,0,0,0,0,0,0]
                    }],
                      chart: {
                      height: 350,
                      type: 'line',
                      zoom: {
                        enabled: false
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'straight'
                    },
                    title: {
                      text: 'Rooms',
                      align: 'left'
                    },
                    grid: {
                      row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                      },
                    },
                    xaxis: {
                      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    }
                    };

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                </script>

<div id="reserve" style="display: inline-flex; margin-left: 5em; width: 29em; margin-right: 2em;"></div>

<script>

	var options = {
	  series: [{
		name: "Room Reservations",
		data: [0,0,0,0,0,0,0,0,0]
	}],
	  chart: {
	  height: 350,
	  type: 'line',
	  zoom: {
		enabled: false
	  }
	},
	dataLabels: {
	  enabled: false
	},
	stroke: {
	  curve: 'straight'
	},
	title: {
	  text: 'Reservations',
	  align: 'left'
	},
	grid: {
	  row: {
		colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
		opacity: 0.5
	  },
	},
	xaxis: {
	  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
	}
	};

	var chart = new ApexCharts(document.querySelector("#reserve"), options);
	chart.render();
</script>
            </div>
        </div></div>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin: 5em;">
                    {{ __('Statistics') }}
                </h2>
                <div
	class='flex sm:flex-row flex-col space-y-2 sm:space-x-2 flex-row w-full items-center justify-center min-h-screen' style="margin-top: -20em;">
	<div
		class='flex flex-wrap flex-row sm:flex-col justify-center items-center w-full sm:w-1/4 p-5 bg-white rounded-md shadow-xl border-l-4 border-blue-300'>
		<div class="flex justify-between w-full">
			<div>
				<div class="p-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
						stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
					</svg>
				</div>
			</div>
            <div>
            </div>
		<div>
			<div class="font-bold text-5xl text-right">
                0
			</div>
			<div class="font-bold text-sm">
				Reservations
			</div>
		</div>
	</div>
            </div>

            <div
		class='flex flex-wrap flex-row sm:flex-col justify-center items-center w-full sm:w-1/4 p-5 bg-white rounded-md shadow-xl border-l-4 border-purple-300'>
		<div class="flex justify-between w-full">
			<div>
				<div class="p-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
						stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
					</svg>
				</div>
			</div>
			<div>
		</div>
		<div >
			<div class="font-bold text-5xl text-right">
			{{$ord}}
			</div>
			<div class="font-bold text-sm">
				Rooms
			</div>
		</div>
	</div></div></div>

    <div
	class='flex sm:flex-row flex-col space-y-2 sm:space-x-2 flex-row w-full items-center justify-center' style="margin-top: -15em; margin-bottom: 5em;">
    <div
		class='flex flex-wrap flex-row sm:flex-col justify-center items-center w-full sm:w-1/4 p-4 bg-white rounded-md shadow-xl border-l-4 border-red-300'>
		<div class="flex justify-between w-full">
			<div>
				<div class="p-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
						stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
					</svg>
				</div>
			</div>
			<div>
			</div>
		</div>
		<div>
			<div class="font-bold text-5xl text-right">
				0
			</div>
			<div class="font-bold text-sm">
				Cancelled Reservations
			</div>
		</div>
	</div>
	<div
		class='flex flex-wrap flex-row sm:flex-col justify-center items-center w-full sm:w-1/4 p-4 bg-white rounded-md shadow-xl border-l-4 border-green-300'>
		<div class="flex justify-between w-full">
			<div>
				<div class="p-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
						stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
					</svg>
				</div>
			</div>
			<div>
			</div>
		</div>
		<div>
			<div class="font-bold text-5xl text-right">
				0
			</div>
			<div class="font-bold text-sm">
				Successful Reservations
			</div>
		</div>
	</div></div>

        </div>
        </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin: 5em;">
                        {{ __('Customer Feedbacks') }}
                    </h2>
                </div>
            </div></div>
</x-app-layout>

@endsection
