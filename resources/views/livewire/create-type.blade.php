<form class="w-full max-w-lg" wire:submit.prevent="create" action="#">


    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Service
            </label>

            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="service_id" required>
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

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Service Type Name
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="name" required />
            @error('name')
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
        <button @click="isDialogOpen = false" class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
            Cancel
        </button>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">
            Add Service Type
        </button>
    </div>

</form>