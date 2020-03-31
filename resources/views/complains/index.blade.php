@extends('layouts.admin')

@section('content')




<main class="bg-white-300 flex-1 p-3 overflow-hidden">
    @if(auth()->user()->hasRole('User'))

 <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="shadow-lg bg-red-300 border-l-8 hover:bg-red border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{App\Complain::all()->count()}}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Complains Filed Overall
                    </a>
                </div>
            </div>

            <div class="shadow bg-blue-400 border-l-8 hover:bg-blue-400 border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{App\Complain::whereDate('created_at', \Carbon\Carbon::today())->count()}}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Complains Filed Today
                    </a>
                </div>
            </div>

            <div class="shadow bg-yellow-400 border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                         {{App\Complain::where('status', 0)->count()}}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Pending Complains
                    </a>
                </div>
            </div>

            <div class="shadow bg-green-400 border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{App\Complain::where('status', 1)->count()}}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Complains Resolved
                    </a>
                </div>
            </div>
        </div>
    @endif

    <div class="flex flex-col">

        <div x-data="{ 'isDialogOpen': false, 'isOpen': false }" @open-modal.window="isOpen = true" @close-modal.window="isDialogOpen = false" @keydown.escape="isDialogOpen = false" @closee-modal.window="isOpen = false" class="break-words bg-white border border-2 rounded shadow-md">

            <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                Complains
            </div>

            <div class="overflow-auto " style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                <!-- dialog -->
                <div class="bg-white shadow-2xl m-4 sm:m-8 " x-show="isDialogOpen" @click.away="isDialogOpen = false">
                    <div class="flex justify-between items-center border-b p-3 text-xl">
                        <h6 class="text-xl font-bold">File a Complain</h6>
                        <button type="button" @click="isDialogOpen = false">✖</button>
                    </div>
                    <div class="p-2">
                        <!-- content -->
                        <h4 class="font-bold"></h4>

                        <aside class="max-w-lg mt-2 p-6">
                            <livewire:create-complain />
                        </aside>
                    </div>
                </div><!-- /dialog -->
            </div><!-- /overlay -->

            <div class="overflow-auto " style="background-color: rgba(0,0,0,0.5)" x-show="isOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isOpen }">
                <!-- dialog -->
                <div class="bg-white shadow-2xl m-4 sm:m-8 " x-show="isOpen" @click.away="isOpen = false">
                    <div class="flex justify-between items-center border-b p-3 text-xl">
                        <h6 class="text-xl font-bold">Edit Complain</h6>
                        <button type="button" @click="isOpen = false">✖</button>
                    </div>
                    <div class="p-2">
                        <!-- content -->
                        <h4 class="font-bold"></h4>

                        <aside class="max-w-lg mt-2 p-6">
                            @livewire('edit-complain')
                        </aside>
                    </div>
                </div><!-- /dialog -->
            </div><!-- /overlay -->

            <div class="w-full p-6">
                <ul class="flex">
                    <li class="flex-1 mr-2">
                        <!-- <x-modal>
                            <x-slot name="trigger"> -->
                        <button @click="isDialogOpen = true" class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white">File a Complain</button>
                        <!-- </x-slot> -->

                        <!-- <livewire:create-service /> -->
                        <!-- </x-modal> -->
                    </li>

                </ul>
            </div>

            <livewire:list-complains />
        </div>
    </div>
</main>
<!-- </div> -->


@endsection