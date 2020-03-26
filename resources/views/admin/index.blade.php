@extends('layouts.admin')

@section('content')
<!-- <div class="flex items-center">
    <div class="md:w-1/2 md:mx-auto">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif -->

<main class="bg-white-300 flex-1 p-3 overflow-hidden">
    <div class="flex flex-col">
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="shadow-lg bg-red-300 border-l-8 hover:bg-red border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{App\Complain::all()->count()}}
                    </a>
                    <a href="{{route('complains.index')}}" class="no-underline text-white text-lg">
                        Complains Filed Overall
                    </a>
                </div>
            </div>

            <div class="shadow bg-blue-400 border-l-8 hover:bg-blue-400 border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{App\Complain::whereDate('created_at', \Carbon\Carbon::today())->count()}}
                    </a>
                    <a href="{{route('complains.index')}}" class="no-underline text-white text-lg">
                        Complains Filed Today
                    </a>
                </div>
            </div>

            <div class="shadow bg-yellow-400 border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                         {{App\Complain::where('status', 0)->count()}}
                    </a>
                    <a href="{{route('complains.pending')}}" class="no-underline text-white text-lg">
                        Pending Complains
                    </a>
                </div>
            </div>

            <div class="shadow bg-green-400 border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{App\Complain::where('status', 1)->count()}}
                    </a>
                    <a href="{{route('complains.resolved')}}" class="no-underline text-white text-lg">
                        Complains Resolved
                    </a>
                </div>
            </div>
        </div>
        <div class="break-words bg-white border border-2 rounded shadow-md">

            <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                Dashboard
            </div>

            <div class="w-full p-6">
                <ul class="flex">
                    <li class="flex-1 mr-2">
                        <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white" href="{{route('admin.services.index')}}">Services</a>
                    </li>
                    <li class="flex-1 mr-2">
                        <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white" href="{{route('admin.services.types')}}">Service Types</a>
                    </li>
                    <li class="flex-1 mr-2">
                        <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white" href="{{route('admin.services.options')}}">Service Type Options</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="break-words bg-white border border-2 rounded shadow-md">

            <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                Recent Complains
            </div>

            <div class="w-full p-6">
                <livewire:recent-complains />
            </div>
        </div>


    </div>
</main>
<!-- </div> -->
@endsection