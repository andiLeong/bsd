


<x-admin-layout>


    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Package Information</h1>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

            @if($packages)
                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Number
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Paid
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created
                                        </th>

                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Mark as Paid</span>
                                        </th>

                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Set Price</span>
                                        </th>

                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($packages as $package)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$package->number}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{$package->price}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{$package->status}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                @if($package->hasPaid())
                                                    <span class="text-green-500">Paid</span>
                                                @else
                                                    <span class="text-red-500">Unpaid</span>
                                                @endif
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{$package->created_at->format('Y-m-d') }}
                                            </td>

                                            @if(!$package->hasPaid() && $package->price != 0)
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form
                                                    action="{{route('packages.payment.update',['package' => $package])}}"
                                                    method="post"
                                                >
                                                    @csrf
                                                    @method('patch')
                                                    <button class="text-indigo-600 hover:text-indigo-900">Mark as Paid</button>
                                                </form>
                                            </td>
                                            @endif()

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{route('packages.price.edit',['package' => $package->id ])}}" class="text-indigo-600 hover:text-indigo-900">Set Price</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{route('packages.show',['package' => $package->id ])}}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        {{ $packages->links() }}
                    </div>


                </div>
            @endif




        </div>
    </div>



</x-admin-layout>

