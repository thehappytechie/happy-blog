<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

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
                <p class="text-4xl text-center font-heading mb-2">
                    Reset Your Password
                </p>
                <p class="text-gray-500">Ensure your new password is 8 characters, contain one number and one special
                    character</p>
                <form action="{{ route('password.update') }}" method="POST" class="flex flex-col md:pt-8">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-800">Email</label>
                        <div class="mt-2">
                            <input type="email" id="email" name="email"
                                class="input__field @error('email') input__field--error @enderror"
                                value="{{ $request->email }}">
                        </div>
                        @error('email')
                        <x-validation-message> {{ $message }} </x-validation-message>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-800">Password</label>
                        <div class="mt-2">
                            <input type="password" id="password" name="password" autocomplete="confirm"
                                class="input__field @error('password') input__field--error @enderror" required>
                        </div>
                        @error('password')
                        <x-validation-message> {{ $message }} </x-validation-message>
                        @enderror
                    </div>
                    <div class="pt-4 mb-8">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-800">Confirm
                            Password</label>
                        <div class="mt-2">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                type="password" autocomplete="new-password"
                                class="input__field @error('password_confirmation') input__field--error @enderror"
                                required>
                        </div>
                        @error('password_confirmation')
                        <x-validation-message> {{ $message }} </x-validation-message>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full rounded-md px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-black shadow-md hover:text-black hover:bg-white focus:outline-none focus:ring-2">
                        <span class="w-full">
                            Change password
                        </span>
                    </button>
                </form>
                <div class="pt-8 pb-8 text-center">
                    <p>
                        Already have an account?
                        <a href="{{ route('login') }}"
                            class="font-semibold underline text-blue-800 hover:text-blue-600">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="w-1/2 shadow-2xl">
            <img class="hidden object-cover w-full h-screen md:block" src="{{ asset('images/cover.jpg') }}" />
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
