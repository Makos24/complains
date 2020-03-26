<div>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            @if ($added)
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ 'Service item '.$added}}
            </div>
            @endif
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Service Items
            </div>
            <div class="p-3">
            <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w:1/6 px-3 mb-6 md:mb-0" wire:loading.class="is-loading">
            
            <input wire:model="search"  placeholder="Search Items" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  />
            

        </div>
    </div>
                <table class="table-responsive w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/6 px-4 py-2">Service Item</th>
                            <th class="border w-1/6 px-4 py-2">Service Type</th>
                            <th class="border w-1/5 px-4 py-2">Requirements</th>
                            <th class="border w-1/4 px-4 py-2">Description</th>
                            <th class="border w-1/7 px-4 py-2">Amount</th>
                            <th class="border w-1/7 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($options as $option)
                        <tr>

                            <td class="border px-4 py-3">{{$option->name}}</td>
                            <td class="border px-4 py-2">{{$option->type->name}}</td>
                            <td class="border px-4 py-2">{{$option->requirements}}</td>
                            <td class="border px-4 py-2">{{$option->description}}</td>
                            <td class="border px-4 py-2">{{$option->amount}}</td>

                            <td class="border px-4 py-2">

                                <a href="#" wire:click="$emit('optionEdit',{{$option->id}})" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fa fa-edit"></i>Edit</a>
                                <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="destroy({{$option->id}})" class="bg-red-500 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fa fa-trash"></i>Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                    <div class="livewire-pagination">
                        {{ $options->links() }}
                    </div>
                  
                
            </div>
           
        </div>
        
    </div>
   
</div>

@push('scripts')
<script type="text/javascript">
    function con() {

        swal('Are you sure?', {
            dangerMode: true,
            buttons: true
        })

    }
</script>
@endpush