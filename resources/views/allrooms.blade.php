@extends('layouts.managerooms')

@section('rooms')
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


