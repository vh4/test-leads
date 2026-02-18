<div class="">
    <div class="w-full min-w-xl">
        {{-- card login --}}
        <div class="card bg-white shadow-md rounded-lg px-12 py-6">
            <h1 class="text-2xl font-bold mb-6 text-center">Create Lead</h1>
            <form wire:submit.prevent="createLeaders" class="mt-10">
                <div class="mb-4 flex flex-col p-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input wire:model="name" type="text" id="name" name="name"
                        class="mt-2 py-1.5 px-3 block w-full border-b-2 border-gray-300 outline-none focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    {{-- error message --}}
                    @error('name')
                        <p class="text-red-500 text-sm my-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col p-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model="email" type="email" id="email" name="email"
                        class="mt-2 py-1.5 px-3 block w-full border-b-2 border-gray-300 outline-none focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    {{-- error message --}}
                    @error('email')
                        <p class="text-red-500 text-sm my-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col p-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input wire:model="phone" type="text" id="phone" name="phone"
                        class="mt-2 py-1.5 px-3 block w-full border-b-2 border-gray-300 outline-none focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    {{-- error message --}}
                    @error('phone')
                        <p class="text-red-500 text-sm my-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 flex flex-col p-4">
                    <label for="product_interest" class="block text-sm font-medium text-gray-700">Product
                        Interest</label>
                    <input wire:model="product_interest" type="text" id="product_interest" name="product_interest"
                        class="mt-2 py-1.5 px-3 block w-full border-b-2 border-gray-300 outline-none focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    {{-- error message --}}
                    @error('product_interest')
                        <p class="text-red-500 text-sm my-1">{{ $message }}</p>
                    @enderror
                </div>
        </div>
        <div class="cursor-pointer">
            <div class="mt-4 mx-4">
                <button
                    class="mb-4 flex flex-col p-4 bg-indigo-500 rounded-lg text-white hover:bg-indigo-600 transition-colors"
                    type="submit">Register</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>