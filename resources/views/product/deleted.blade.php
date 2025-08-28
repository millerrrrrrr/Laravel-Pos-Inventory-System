@extends('layout')

@section('title', 'Product')
@section('pagetitle', 'Deleted Products')

@section('main')
    <div class=" bg-white p-6 rounded-2xl shadow-md border border-[#e5e7eb]">
        <div class="container mx-auto px-4 py-8">
       

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-900 ">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Image</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Category</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Description</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Stock</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Purchase Price</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Sale Price</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Deleted at</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Restore</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deleted as $del)
                            
                        
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">

                                @if ($del->image)
                                    <img src=" {{ asset('storage/' . $del->image) }} " alt=" {{ $del->name }} " class="w-16 h-16 object-cover rounded-md">

                                @else
                                <div class="w-16 h-16 bg-gray-200  rounded-md flex items-center justify-center text-gray500 text-cs text-center">
                                    <p>No image</p>
                                </div>

                                @endif

                               
                            </td>

                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $del->name }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $del->category }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $del->description }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $del->stock }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $del->purchasePrice }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $del->salePrice }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $del->deleted_at }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <form action=" {{ route('productRestore', $del->id) }} " method="POST">
                                    @csrf
                                    <button class="btn-edit">Restore</button>
                                </form>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <form action=" {{ route('productForceDelete', $del->id) }} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               <div class="mt-4">
                    {{ $deleted->links('vendor.pagination.simple-tailwind') }}
               </div>
                
            </div>
        </div>
    </div>


@endsection
