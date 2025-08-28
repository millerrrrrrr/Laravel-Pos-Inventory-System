@extends('layout')

@section('title', 'Home')
@section('pagetitle', 'Dashboard')

@section('main')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        {{-- Example Card  --}}

        <div class="bg-white p-6 rounded-2xl shadow-md border border-[#e5e7eb]">
            <h2 class="text-lg font-semibold text-[#3b38a0] ">Date Started Learning Laravel</h2>
            <p class="text-[#7a85c1 mt-2]">July 17, 2025</p>

        </div>

        <div class="bg-white p-6 rounded-2xl shadow-md border border-[#e5e7eb]">
            <h2 class="text-lg font-semibold text-[#3b38a0] ">Greetings</h2>
            <p class="text-[#7a85c1 mt-2]">Hello, {{ Auth::user()->username }}</p>

        </div>



    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 ">

        <div class="mt-8 bg-white p-6 rounded-2xl shadow-md w-xl border border-[#e5e7eb]">
            <h2 class="text-lg font-bold text-[#1a2a80] mb-4">Restock Notify</h2>
            <div class="mt-8 ">
                <table class="min-w-auto text-sm text-left text-[#111827] border border-[#e5e7eb]">
                    <thead class="bg-[#3b38a0] text-white text-center">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Remaining Stock</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($restockNotify as $item)
                            <tr
                                class="border-b border-[#e5e7eb] hover:bg-[#f1f5f9] transition text-center font-semibold uppercase">
                                <td class="px-6 py-4 "> {{ $item->name }} </td>
                                <td class="px-6 py-4 "> {{ $item->category }} </td>
                                <td class="px-6 py-4 "> {{ $item->stock }} </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        <div class="mt-8 bg-white p-6 rounded-2xl shadow-md w-xl border border-[#e5e7eb]">
            <h2 class="text-lg font-bold text-[#1a2a80] mb-4">Out of Stock</h2>
            <div class="mt-8 ">
                <table class="min-w-auto text-sm text-left text-[#111827] border border-[#e5e7eb]">
                    <thead class="bg-[#3b38a0] text-white text-center">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Remaining Stock</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($outOfStock as $out)
                            <tr
                                class="border-b border-[#e5e7eb] hover:bg-[#f1f5f9] transition text-center font-semibold uppercase">
                                <td class="px-6 py-4 "> {{ $out->name }} </td>
                                <td class="px-6 py-4 "> {{ $out->category }} </td>
                                <td class="px-6 py-4 "> {{ $out->stock }} </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>


    </div>







@endsection
