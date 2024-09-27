<x-frontend-layout>
    <section class="py-10">
        <div class="container">
            <div>
                <h3 class="w-2/3 mx-auto text-3xl text-center text-gray-700 dark:text-white">
                    List your Restaurant or Store at BazzarX Market Pvt. Ltd.! Reach 1,00,000 + new customers.
                </h3>


                <!-- Modal toggle -->
                <button data-modal-target="send-request-modal" data-modal-toggle="send-request-modal"
                    class="block text-white bg-[#703273] hover:bg-[#8d3391] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[#703273] dark:hover:bg-[#703273] dark:focus:ring-[#8d3391] mx-auto mt-8"
                    type="button">
                    SEND A REQUEST
                </button>
            </div>

            <!-- Main modal -->
            <div id="send-request-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-[#703273] dark:text-[#703273]">
                                Send a Request
                            </h3>
                            <button type="button"
                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="send-request-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="#703273" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" fill="#703273" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 space-y-4 md:p-5">
                            <form action="{{ route('vendor-create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="name">Name <span class="text-red-700">*</span></label>
                                        <input type="text" name="name" id="name"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="email">Email <span class="text-red-700">*</span></label>
                                        <input type="email" name="email" id="email"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone">Phone <span class="text-red-700">*</span></label>
                                        <input type="text" name="phone" id="phone"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="vendor_name">Vendor Name <span class="text-red-700">*</span></label>
                                        <input type="text" name="vendor_name" id="vendor_name"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('vendor_name') }}">
                                        @error('vendor_name')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="vendor_address">Vendor Address <span
                                                class="text-red-700">*</span></label>
                                        <input type="text" name="vendor_address" id="vendor_address"
                                            class="w-full rounded-md border-[#703273] focus:border-[#703273] focus:outline-none focus:ring-0"
                                            value="{{ old('vendor_address') }}">
                                        @error('vendor_address')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-4">
                                    <button type="submit"
                                        class="text-white px-4 rounded-lg h-10 bg-[#703273] hover:bg-[#8d3391]">Send
                                        Request</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>
</x-frontend-layout>
