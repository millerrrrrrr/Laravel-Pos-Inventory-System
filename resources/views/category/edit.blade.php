@extends('layout')

@section('title', 'Category')
@section('pagetitle', 'Edit Category')

@section('main')



    <div class=" h-[20%]">

        <div class="flex justify-center items-center">

            <div class="bg-white p-6 rounded-2xl shadow-md w-md border border-[#e5e7eb]">



                <form action=" {{ route('category.update', $category->id )}}  " method="POST">

                    @csrf

                    @method('PUT')

                    <div class="mb-4">
                        <label for="category" class="block text-[#3b38a0]  font-medium">Edit Category</label>
                        <input type="category" name="category" id="category" autofocus
                            class="w-full px-4 py-2 mt-1 border border-[#e5e7eb] rounded-md focus:outline-none focus:ring-2 focus:ring-[#3B38A0]" value="{{ $category->category }}">
                        @if ($errors->has('category'))
                            <span class="text-red-500">
                                {{ $errors->first('category') }}
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
