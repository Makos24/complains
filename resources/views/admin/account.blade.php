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
        
       

        <div class="break-words bg-white border border-2 rounded shadow-md">

            <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                Account Details
            </div>
<aside class="max-w-lg mt-2 p-6">
           <form class="w-full max-w-lg" action="{{route('admin.account.store')}}" method="POST">


    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Bank Name
            </label>

            <input value="{{$account ? $account->bank : old('bank')}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="bank" required />
            
            @error('bank')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>

    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Account Number
            </label>
            <input value="{{$account ? $account->number : old('number')}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="number" required />
            @error('number')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror

        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Account Name
            </label>
            <input value="{{$account ? $account->name : old('name')}}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('name')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div style="width: 550px"></div>

    <div class="flex items-center justify-between">
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ $account ? 'Update ' : 'Save '}} Account
        </button>
    </div>

</form>
</aside>
        </div>


    </div>
</main>
<!-- </div> -->
@endsection