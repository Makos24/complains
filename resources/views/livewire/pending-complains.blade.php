<div>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            @if ($added)
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ 'Complain '.$added}}
            </div>
            @endif
           
            <div class="p-3">
             <div class="flex flex-wrap -mx-3 mb-3">
        <div class="w:1/6 px-3 mb-6 md:mb-0" wire:loading.class="is-loading">
            
            <input wire:model="search"  placeholder="Search complains" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  />
            

        </div>
    </div>
                <table class="table-responsive w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/6 px-4 py-2">Plot No.</th>
                            <th class="border w-1/6 px-4 py-2">Name</th>
                            <th class="border w-1/6 px-4 py-2">Service</th>
                            <!-- <th class="border w-1/4 px-4 py-2">Service Type</th>-->
                            <th class="border w-1/6 px-4 py-2">Item</th> 
                            <th class="border w-1/7 px-4 py-2">Filed By</th>
                            <th class="border w-1/8 px-4 py-2">Date</th>
                            <th class="border w-1/8 px-4 py-2">Amount Due</th>
                            <th class="border w-1/5 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complains->where('status', 0) as $complain)
                        <tr>

                            <td class="border px-4 py-2">{{$complain->plot_no}}</td>
                            <td class="border px-4 py-2">{{$complain->name}}</td>
                            <td class="border px-4 py-2">{{$complain->service->name}}</td>
                            <!-- <td class="border px-4 py-2">{{$complain->type->name}}</td>-->
                            <td class="border px-4 py-2">{{$complain->option->name}}</td> 
                            <td class="border px-4 py-2">{{$complain->user->name}}</td>
                            <td class="border px-4 py-2">{{$complain->created_at}}</td>
                            <td class="border px-4 py-2">{{$complain->cost}}</td>

                            <td class="border px-4 py-2">


                                <a href="{{route('complains.print', $complain->id)}}" target="_blank" wire:click="$emit('complainPrint',{{$complain->id}})" class="bg-blue-300 cursor-pointer rounded p-1 text-white">
                                    <i class="fa fa-edit"></i>Print</a>
                                <a href="#" wire:click="$emit('complainEdit',{{$complain->id}})" class="bg-teal-300 cursor-pointer rounded p-1 text-white">
                                    <i class="fa fa-edit"></i>Edit</a>
                                @if($complain->status)
                                    <a href="#" title="Mark as pending" onclick="confirm('Are you sure you want to mark as pending?') || event.stopImmediatePropagation()" wire:click="pending({{$complain->id}})" class="bg-yellow-300 cursor-pointer rounded p-1 text-white">
                                        <i class="fa fa-trash"></i>Pending
                                    </a>
                                @else
                                    <a href="#" title="mark as resolved" onclick="confirm('Are you sure you want to mark as resolved?') || event.stopImmediatePropagation()" wire:click="resolved({{$complain->id}})" class="bg-teal-300 cursor-pointer rounded p-1 text-white">
                                    <i class="fa fa-check"></i>Resolved
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 <div class="livewire-pagination">
                        {{ $complains->links() }}
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