<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- @vite('resources/css/app.css') --}}


    @vite(['resources/css/app.css', 'resources/js/app.js'])





</head>

<body class="bg-[#f2f2f2]">

    {{-- @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @elseif(session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif --}}


    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-bold text-center text-[#154d71] mb-6">Login</h2>

            <form action=" {{ route('loginPost') }} " method="POST">
                @csrf

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-[#333333]">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 block w-full px-4 py-3 border border-[#154d71] rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1c6ea4]"
                        placeholder="Enter your email" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-[#333333]">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-4 py-3 border border-[#154d71] rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1c6ea4]"
                        placeholder="Enter your password" required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="w-full py-3 bg-[#154d71] text-white font-semibold rounded-lg shadow-md hover:bg-[#1c6ea4] transition duration-200 focus:outline-none focus:ring-2 focus:ring-[#1c6ea4]">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>

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
