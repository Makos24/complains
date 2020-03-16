<div>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            @if ($added)
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ 'Service type '.$added}}
            </div>
            @endif
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Full Table
            </div>
            <div class="p-3">
                <table class="table-responsive w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/4 px-4 py-2">Service Type</th>
                            <th class="border w-1/4 px-4 py-2">Service</th>
                            <th class="border w-1/6 px-4 py-2">Description</th>
                            <th class="border w-1/5 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                        <tr>

                            <td class="border px-4 py-2">{{$type->name}}</td>
                            <td class="border px-4 py-2">{{$type->service->name}}</td>
                            <td class="border px-4 py-2">{{$type->description}}</td>

                            <td class="border px-4 py-2">

                                <a href="#" wire:click="$emit('typeEdit',{{$type->id}})" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fa fa-edit"></i>Edit</a>
                                <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="destroy({{$type->id}})" class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fa fa-trash"></i>Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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