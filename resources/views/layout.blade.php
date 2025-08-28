<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- @vite('resources/css/app.css') --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#f8fafc] h-screen flex flex-col font-sans text-[#111827]">

    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-[#1a2a80]">@yield('pagetitle')</h1>
        <div class="flex items-center gap-4">



            <div>
                <a href="{{ route('home') }}"
                    class="font-semibold text-gray-500 hover:text-gray-700 duration-200 transition">Home</a>
            </div>

            <div>
                <select id="posDropdown" class="font-semibold text-gray-500 hover:text-gray-700 duration-200 transition text-center">
                    <option value="" selected disabled>Pos</option>
                    <option value=" {{ route('pos') }} ">Transaction</option>
                </select>
            </div>

            <div>
                <select id="dropdown" class="font-semibold text-gray-500 hover:text-gray-700 duration-200 transition text-center">
                    <option value="" selected disabled>Product</option>
                    <option value=" {{ route('product') }} ">Product List</option>
                    <option value=" {{ Route('product.add') }} ">Add Product</option>
                    <option value=" {{ Route('productDeleted') }} ">Recently Deleted</option>
                    {{-- <option value="#"></option> --}}
                </select>
            </div>

            <div>
                <a href="{{ route('category') }}"
                    class="font-semibold text-gray-500 hover:text-gray-700 duration-200 transition">Add Category</a>
            </div>

            {{-- <span class="text-gray-600">Hello, User</span> --}}
            <form action=" {{ Route('logout') }} " method="POST">
                @csrf
                <button type="submit"
                    class="text-sm bg-red-500 text-white px-3 py-1 hover:bg-red-600 transition duration-200 rounded-md">Logout</button>
            </form>
        </div>
    </header>

    <main class="flex-1 p-6">
        @yield('main')
    </main>


    <script>
        document.getElementById('dropdown').addEventListener('change', function() {
            const url = this.value;
            if (url) {
                window.location.href = url;
            }
        });
    </script>

    <script>
        document.getElementById('posDropdown').addEventListener('change', function() {
            const url = this.value;
            if (url) {
                window.location.href = url;
            }
        });
    </script>




    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: @json(session('success'))
                })
            @endif

            @if (session('error'))
                Toast.fire({
                    icon: 'error',
                    title: @json(session('error'))
                })
            @endif

            @if (session('warning'))
                Toast.fire({
                    icon: 'warning',
                    title: @json(session('warning'))
                })
            @endif

            @if (session('info'))
                Toast.fire({
                    icon: 'info',
                    title: @json(session('info'))
                })
            @endif

            @if (session('question'))
                Toast.fire({
                    icon: 'question',
                    title: @json(session('question'))
                })
            @endif
        });
    </script>

</body>

</html>
