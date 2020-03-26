<form class="w-full max-w-lg" wire:submit.prevent="update" action="#">

    <input type="hidden" wire:model="selected_id" />
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Service Type
            </label>

            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="type_id" required>
                @foreach($types as $type)
                <option value="{{$type->id}}" {{$type->id == $type_id ? 'selected' : ''}}>{{$type->name}}</option>

                @endforeach
            </select>
            @error('type_id')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>

    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Service Item
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="name" required />
            @error('name')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror

        </div>
    </div>


<div class="flex items-center mr-4 mb-3">
    <input id="radio3" type="radio" wire:model="radio" value="1"  class="hidden" checked />
    <label for="radio3" class="flex items-center cursor-pointer">
     <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
     Fixed</label>
     <div class="w:1/4 px-3 mb-6 md:mb-0 {{$radio == 1 ? '' : 'hidden'}}">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Amount
            </label>
            <input wire:model="fx_amount" type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('fx_amount')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
   </div>

   <div class="flex items-center mr-4 mb-3">
    <input id="radio4" type="radio"  wire:model="radio" value="2" class="hidden" />
    <label for="radio4" class="flex items-center cursor-pointer">
     <span class="w-8 h-8 inline-block mr-2 rounded-full border border-grey flex-no-shrink"></span>
     Calculated</label>
     
     <div class="w:1/3 px-3 mb-6 md:mb-0 {{$radio == 2 ? '' : 'hidden'}}">
           <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
               B1
            </label>
            <input wire:model="b1" type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('b1')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div><div class="w:1/3 px-3 mb-6 md:mb-0 {{$radio == 2 ? '' : 'hidden'}}">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                C1
            </label>
            <input wire:model="c1" type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('c1')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div><div class="w:1/3 px-3 mb-6 md:mb-0 {{$radio == 2 ? '' : 'hidden'}}">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                D1
            </label>
            <input wire:model="d1" type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('d1')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
     
   </div>


<div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Amount Due
            </label>
            <input wire:model.debounce.500ms="amount" readonly class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('amount')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Requirements
            </label>
            <input wire:model.debounce.500ms="requirements" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('requirements')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>


    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Description
            </label>
            <input wire:model.debounce.500ms="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('description')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div style="width: 550px"></div>

    <div class="flex items-center justify-between">
        <button @click="isOpen = false" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
            Cancel
        </button>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">
            Update Service Item
        </button>
    </div>

</form>