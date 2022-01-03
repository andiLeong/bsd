


<x-admin-layout>


    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Update Package Price</h1>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

            <form class="space-y-8 divide-y divide-gray-200" method="POST" action="{{route('packages.price.update',['package' => $package])}}">
                @csrf
                @method('patch')
                <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="price" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Price
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input value="{{$package->price}}" type="text" name="price" id="price" placeholder="9999" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-5" x-data>
                    <div class="flex justify-end">
                        <button @click.prevent="window.location.replace('/packages')" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Cancel
                        </button>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>





        </div>
    </div>



</x-admin-layout>

