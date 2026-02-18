<div class="w-full">
    <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Table of Leads</h3>
            <p class="text-slate-500">Table of Leads.</p>
        </div>
        <div class="ml-3">
            <div class="w-full max-w-sm min-w-[200px] relative">
                <div class="relative">
                    <input wire:model.live="search"
                        class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                        placeholder="Search for invoice..." />
                    <button class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                            stroke="currentColor" class="w-8 h-8 text-slate-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @session('success')
        <div class="bg-green-500 text-white p-4 rounded mb-3 mt-1">
            {{ session('success') }}
        </div>
    @endsession
    <div
        class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
        <div class="w-full flex justify-end items-center mb-3 mt-1 pl-3">
            <a href="/create-leads" class="">
                <div class="cursor-pointer">
                    <div
                        class="mb-4 flex flex-col p-4 bg-indigo-500 rounded-lg text-white hover:bg-indigo-600 transition-colors">
                        <button type="submit" class="btn btn-primary">Create Lead</button>
                    </div>
                </div>
            </a>
        </div>
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Name
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Email
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Phone
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Product Interest
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Score
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Status
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Follow Up
                        </p>
                    </th>
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Deal
                        </p>
                    </th>
                    {{-- delete --}}
                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                        <p class="block text-sm font-normal leading-none text-slate-500">
                            Delete
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="block font-semibold text-sm text-slate-800">{{ $lead->name }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-sm text-slate-500">{{ $lead->email }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-sm text-slate-500">{{ $lead->phone }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-sm text-slate-500">{{ $lead->product_interest }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-sm text-slate-500">{{ $lead->score }}</p>
                        </td>
                        {{-- new blue, procession yellow, closed green --}}
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p class="text-sm text-slate-500"
                                style="color: {{ $lead->status == 'New' ? 'blue' : ($lead->status == 'Processing' ? 'orange' : 'green') }}">
                                {{ $lead->status }}
                            </p>
                        </td>
                        {{-- follow --}}
                        {{-- if score 100, nothing button --}}
                        @if ($lead->score == 100)
                            <td class="p-4 border-b border-slate-200 py-5">
                                <p class="text-sm text-slate-500">-</p>
                            </td>
                        @else
                            <td class="p-4 border-b border-slate-200 py-5">
                                {{-- tailwind button --}}
                                <button wire:click="followUp({{ $lead->id }})"
                                    class="px-4 py-2 bg-blue-500 text-white rounded">Follow Up</button>
                            </td>
                        @endif
                        {{-- deal --}}
                        @if ($lead->score == 100)
                            <td class="p-4 border-b border-slate-200 py-5">
                                <p class="text-sm text-slate-500">-</p>
                            </td>
                        @else
                            <td class="p-4 border-b border-slate-200 py-5">
                                {{-- deal with score min >= 20 --}}
                                @if ($lead->score >= 20)
                                    <button wire:click="deal({{ $lead->id }})"
                                        class="px-4 py-2 bg-green-500 text-white rounded">Deal</button>
                                @else
                                    <div>-</div>
                                @endif
                            </td>
                        @endif
                        {{-- delete --}}
                        <td class="p-4 border-b border-slate-200 py-5">
                            <button wire:click="delete({{ $lead->id }})"
                                class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>