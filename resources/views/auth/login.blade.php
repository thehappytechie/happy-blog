<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Prata&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')

</head>

<body>

    <div class="flex flex-wrap w-full">
        <div class="flex flex-col w-full md:w-1/2">
            <div class="flex justify-center pt-12 md:justify-start md:pl-12 md:-mb-24">
                <a href="#" class="p-4 text-xl font-bold text-white bg-black">
                    Design.
                </a>
            </div>
            <div class="flex flex-col justify-center px-8 pt-8 my-auto md:justify-start md:pt-0 md:px-24 lg:px-32">
                <p class="font-serif text-4xl text-center font-extrabold mb-2">
                    Welcome.
                </p>
                <p class="text-gray-500 text-center"> Are you a new user? <a href="{{ route('register') }}"
                        class="font-semibold underline text-blue-800 hover:text-blue-600">
                        Create an account
                    </a>
                </p>
                <form action="{{ route('login') }}" method="POST" class="flex flex-col md:pt-8">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-800">Email</label>
                        <div class="mt-2">
                            <input type="email" id="email" name="email"
                                class="input__field @error('email') input__field--error @enderror" required>
                        </div>
                        @error('email')
                        <x-validation-message> {{ $message }} </x-validation-message>
                        @enderror
                    </div>
                    <div class="pt-4 mb-4">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-800">Password</label>
                        <div class="mt-2">
                            <input type="password" id="password" name="password" autocomplete="current-password"
                                class="input__field @error('password') input__field--error @enderror" required>
                        </div>
                        @error('password')
                        <x-validation-message> {{ $message }} </x-validation-message>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-600">Remember
                                me</label>
                        </div>

                        <div class="text-sm">
                            <a href="{{ url('forgot-password') }}"
                                class="font-medium underline text-blue-800 hover:text-blue-600">Forgot
                                your password?</a>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full rounded-md px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-black shadow-md hover:text-black hover:bg-white focus:outline-none focus:ring-2">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        <div class="w-1/2 shadow-xl">
            <img class="hidden object-cover w-full h-screen md:block" src="{{ asset('images/hero.jpg') }}" />
        </div>
    </div>

</body>

</html>
