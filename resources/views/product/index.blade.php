@extends('layout')

@section('title', 'Product')
@section('pagetitle', 'Product List')

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
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Restock</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            
                        
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">

                                @if ($product->image)
                                    <img src=" {{ asset('storage/' . $product->image) }} " alt=" {{ $product->name }} " class="w-16 h-16 object-cover rounded-md">

                                @else
                                <div class="w-16 h-16 bg-gray-200  rounded-md flex items-center justify-center text-gray500 text-cs text-center">
                                    <p>No image</p>
                                </div>

                                @endif

                               
                            </td>

                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $product->name }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $product->category }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $product->description }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $product->stock }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $product->purchasePrice }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800"> {{ $product->salePrice }} </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <a href=" {{ route('restockIndex', $product->id) }} ">
                                    <button class="btn-add">Restock</button>
                                </a>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <form action=" {{ route('productDelete', $product->id) }} " method="POST">
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
                    {{ $products->links('vendor.pagination.simple-tailwind') }}
               </div>
                
            </div>
        </div>
    </div>


@endsection
