@extends('layout')

@section('title', 'Product')
@section('pagetitle', 'Product Restock')

@section('main')



    <div class=" h-[20%]">

        <div class="flex justify-center items-center">

            <div class="bg-white p-6 rounded-2xl shadow-md w-md border border-[#e5e7eb]">



                <form action=" {{ route('productRestock', $products->id) }} " method="POST">

                    @csrf

                    @method('PATCH')

                    <div class="mb-4">
                        <label for="stock" class="block text-[#3b38a0]  font-medium">Add Stock</label>
                        <input type="category" name="stock" id="stock" autofocus
                            class="w-full px-4 py-2 mt-1 border border-[#e5e7eb] rounded-md focus:outline-none focus:ring-2 focus:ring-[#3B38A0]" >
                        @if ($errors->has('stock'))
                            <span class="text-red-500">
                                {{ $errors->first('stock') }}
                            </span>
                        @endif
                    </div>



                    <div class="flex items-center justify-between mb-4 text-blue-800">

                        <button type="submit"
                            class="w-full bg-[#3b38a0] hover:bg-[#7a85c1] text-white py-2 rounded-md  transition duration-200 font-medium">
                            Add
                        </button>


                    </div>

                </form>



            </div>

        </div>

    </div>
  



@endsection
