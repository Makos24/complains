<div>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">

            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">

            </div>
            <div class="p-3">
                <table class="table-responsive w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/6 px-4 py-2">Name</th>
                            <th class="border w-1/6 px-4 py-2">Service</th>
                            <!-- <th class="border w-1/4 px-4 py-2">Service Type</th>
                            <th class="border w-1/4 px-4 py-2">Option</th> -->
                            <th class="border w-1/6 px-4 py-2">Filed By</th>
                            <th class="border w-1/6 px-4 py-2">Date</th>
                            <th class="border w-1/6 px-4 py-2">Cost</th>
                            <th class="border w-1/4 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complains as $complain)
                        <tr>

                            <td class="border px-4 py-2">{{$complain->name}}</td>
                            <td class="border px-4 py-2">{{$complain->service->name}}</td>
                            <!-- <td class="border px-4 py-2">{{$complain->type->name}}</td>
                            <td class="border px-4 py-2">{{$complain->option->name}}</td> -->
                            <td class="border px-4 py-2">{{$complain->user->name}}</td>
                            <td class="border px-4 py-2">{{$complain->created_at}}</td>
                            <td class="border px-4 py-2">{{$complain->cost}}</td>

                            <td class="border px-4 py-2">


                                <a href="{{route('complains.print', $complain->id)}}" wire:click="$emit('complainPrint',{{$complain->id}})" class="bg-blue-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fa fa-edit"></i>Print</a>
                                <!-- <a href="#" wire:click="$emit('complainEdit',{{$complain->id}})" class="bg-teal-300 cursor-pointer rounded p-1 text-white">
                                    <i class="fa fa-edit"></i>Edit</a>
                                <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="resolved({{$complain->id}})" class="bg-teal-300 cursor-pointer rounded p-1 text-white">
                                    <i class="fa fa-trash"></i>Resolved
                                </a> -->
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