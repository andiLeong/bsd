



<x-admin-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Package # {{$package->number}} </h1>
        </div>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

            @if($package->tracking->isNotempty())
                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Company
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tracking #
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tracking Owner
                                        </th>


                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($package->tracking as $tracking)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$tracking->company}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{$tracking->number}}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                {{$tracking->user->username}}
                                            </td>

{{--                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
{{--                                                <a href="{{route('packages.show',['package' => $package->id ])}}" class="text-indigo-600 hover:text-indigo-900">View</a>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            @if($package->slips->isNotempty())
                <div class="flex flex-col mt-6">
                    <img class="w-72 h-72 rounded-md border border-2 dark:border-white" src="{{$package->slips->first()->url}}" alt="">
                </div>
            @endif

        </div>








        {{--        <div class="mt-6 p-4">--}}
{{--        <ul>--}}
{{--            @foreach( $package->tracking as $tracking)--}}
{{--            <li>{{$tracking->company}} - {{$tracking->number}}</li>--}}

{{--            @endforeach--}}
{{--        </ul>--}}
{{--        </div>--}}



    </div>



</x-admin-layout>


