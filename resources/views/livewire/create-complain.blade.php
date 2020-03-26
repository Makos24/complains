<form class="w-full max-w-lg" wire:submit.prevent="create" action="#">

     <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Plot Number
            </label>

            <input wire:model="plot_no" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
            @error('plot_no')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>

    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Complainants Name
            </label>

            <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
            @error('name')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>

    </div>

    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Phone Number
            </label>
            <input wire:model="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required>
            @error('phone')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Address
            </label>
            <input wire:model="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
            @error('address')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Service
            </label>

            <select wire:model="service_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                <option value="">Select Service</option>
                @foreach($services as $service)

                <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
            @error('service_id')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>

    </div>

    <div class="flex flex-wrap -mx-3 mb-2 {{ count($this->types)==0 ? 'hidden' : '' }}">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Type
            </label>

            <select wire:model="type_id" class="{{ count($this->types)==0 ? 'hidden' : '' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                <option value="">Select Service Type</option>
                @foreach($types as $type)

                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
            @error('type_id')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>

    </div>

    <div class="flex flex-wrap -mx-3 mb-2 {{ count($this->options)==0 ? 'hidden' : '' }}">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Item
            </label>

            <select wire:model="option_id" class="{{ count($this->options)==0 ? 'hidden' : '' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                <option value="">Select Item</option>
                @foreach($options as $option)

                <option value="{{$option->id}}">{{$option->name}}</option>
                @endforeach
            </select>
            @error('option_id')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>

    </div>


    <div class="flex flex-wrap -mx-3 mb-2 {{ $description ? '' : 'hidden'}}">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Description
            </label>
            <input wire:model="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('description')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2 {{ $requirements ? '' : 'hidden'}}">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Requirements
            </label>
            <input wire:model="requirements" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('requirements')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2 {{ $amount ? '' : 'hidden'}}">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Amount Due
            </label>
            <input wire:model="amount" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @error('amount')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div style="width: 550px"></div>

    <div class="flex items-center justify-between">
        <button @click="isDialogOpen = false" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
            Cancel
        </button>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">
            File Complain
        </button>
    </div>

</form>