<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="/js/alpine.js" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <livewire:styles />
</head>

<div class="mx-auto p-16" style="max-width: 800px;">
    <div class="flex items-center justify-between mb-8 px-3">
        <div>
            <span class="text-2xl">Complain ID #</span>: {{strtoupper(substr($complain->complain_id, 5, 10))}}<br />
            <span>Date</span>: {{\Carbon\Carbon::parse($complain->created_at)->toFormattedDateString()}}<br />
        </div>
        <div class="text-right">
            <img src="/images/logo.jpg" width="150px" height="100px" />
        </div>
    </div>

    <div class="flex justify-between mb-8 px-3">
        <div>
            {{$complain->name}}<br />
            {{$complain->address}}<br />
            {{$complain->phone}}<br />
           {{$complain->email}}<br />
            <!-- {{$complain->phone}} -->
        </div>
        <div class="text-right">
            Along Biu Road, <br />
            PMB 1081 <br />
            Maiduguri, Borno State. <br />
            Nigeria. <br />
            
        </div>
    </div>

    <div class="border border-t-2 border-gray-200 mb-8 px-3"></div>

    <div class="mb-8 px-3">
        <p>{{$complain->description}}</p>
    </div>

    <div class="flex justify-between mb-4 bg-gray-200 px-3 py-2">
        <div>Service</div>
        <div class="text-right font-medium">{{$complain->service->name}}</div>
    </div>
    <div class="flex justify-between mb-4 bg-gray-200 px-3 py-2">
        <div>Service Type</div>
        <div class="text-right font-medium">{{$complain->type ? $complain->type->name : ''}}</div>
    </div>
    <div class="flex justify-between mb-4 bg-gray-200 px-3 py-2">
        <div>Service Option</div>
        <div class="text-right font-medium"> {{$complain->option ? $complain->option->name : ''}}</div>
    </div>

    <div class="flex mb-8 justify-end px-3">
    <div class="text-2xl leading-none"><span class="">Requirements</span>:</div>
        <div class="text-right w-1/2 px-0 leading-tight">
            <small class="text-xs">{{$complain->requirements}}</small>
        </div>
    </div>
    <div class="flex justify-between items-center mb-2 px-3">
        <div class="text-2xl leading-none"><span class="">Total</span>:</div>
        <div class="text-2xl text-right font-medium">{{$complain->cost}}</div>
    </div>

    

     <div class="flex flex-wrap justify-between">
            <img src="/images/frame.png" width="150px" height="100px" />
            <div class="mt-6">
            <h4 class="text-center mb-2 font-bold underline">Bank Details</h4>
            <span class="px-1 font-bold">Bank: </span>{{$account ? $account->bank : ''}}<br />
            <span class="px-1 font-bold">Account Name: </span>{{$account ? $account->name : ''}}<br />
            <span class="px-1 font-bold">Account Number: </span>{{$account ? $account->number : ''}}<br />
           
        </div>
        </div>
        

    <div class="mb-8 px-3">
        <span>To be paid before</span> {{\Carbon\Carbon::parse($complain->created_at)->addWeek(1)->toFormattedDateString()}} in to <b class="underline font-bold">Bank details here</b> specifying the complain ID
    </div>

    <div class="mb-8 text-4xl text-center px-3">
        <span>Thank you!</span>
    </div>

    <div class="text-center text-sm px-3">
        www.bogis.com.ng
    </div>
</div>

</html>