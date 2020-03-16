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
            <span class="text-2xl">Complain ID #</span>: {{$complain->complain_id}}<br />
            <span>Date</span>: {{$complain->created_at}}<br />
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
            hello@pixelandtonic.com<br />
            <!-- {{$complain->phone}} -->
        </div>
        <div class="text-right">
            Borno State Nigeria<br />
            Street 12<br />
            10000 City<br />
            hello@yoursite.com
        </div>
    </div>

    <div class="border border-t-2 border-gray-200 mb-8 px-3"></div>

    <div class="mb-8 px-3">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquam vestibulum elit, id rutrum sem lobortis eget. In a massa et leo vehicula dapibus. In convallis ut nisi ut vestibulum. Integer non feugiat tellus. Nullam id ex suscipit, volutpat sapien tristique, porttitor sapien.</p>
    </div>

    <div class="flex justify-between mb-4 bg-gray-200 px-3 py-2">
        <div>Service</div>
        <div class="text-right font-medium">{{$complain->service->name}}- 1200 N</div>
    </div>
    <div class="flex justify-between mb-4 bg-gray-200 px-3 py-2">
        <div>Service Type</div>
        <div class="text-right font-medium">{{$complain->type ? $complain->type->name : ''}}- 800 N</div>
    </div>
    <div class="flex justify-between mb-4 bg-gray-200 px-3 py-2">
        <div>Service Option</div>
        <div class="text-right font-medium"> {{$complain->option ? $complain->option->name : ''}}- 300 N</div>
    </div>

    <div class="flex justify-between items-center mb-2 px-3">
        <div class="text-2xl leading-none"><span class="">Total</span>:</div>
        <div class="text-2xl text-right font-medium">2300 N</div>
    </div>

    <div class="flex mb-8 justify-end px-3">
        <div class="text-right w-1/2 px-0 leading-tight">
            <small class="text-xs">Nullam auctor, tellus sit amet eleifend interdum, quam nisl luctus quam, a tincidunt nisi eros ac dui. Curabitur leo ipsum, bibendum sit amet suscipit sed, gravida non lectus. Nunc porttitor lacus sapien, nec congue quam cursus nec. Quisque vel vehicula ipsum. Donec condimentum dolor est, ut interdum augue blandit luctus. </small>
        </div>
    </div>

    <div class="mb-8 px-3">
        <span>To be paid before</span> Februari 1st 2019 on <b class="underline font-bold">BE71 0961 2345 6769</b> specifying the invoice #
    </div>

    <div class="mb-8 text-4xl text-center px-3">
        <span>Thank you!</span>
    </div>

    <div class="text-center text-sm px-3">
        bogis.com
    </div>
</div>

</html>