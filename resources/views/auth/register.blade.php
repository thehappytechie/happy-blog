@extends('layouts.section')

@section('content')

<div class="flex flex-wrap w-full">
    <div class="flex flex-col w-full md:w-1/2">
        <div class="flex justify-center pt-12 md:justify-start md:pl-12 md:-mb-24">
            <a href="#" class="p-4 text-xl font-bold text-white bg-black">
                Design.
            </a>
        </div>
        <div class="flex flex-col justify-center px-8 pt-8 my-auto md:justify-start md:pt-0 md:px-24 lg:px-32">
            <p class="text-4xl text-center font-extrabold mb-2">
                Sign Up
            </p>
            <p class="text-gray-500 text-center"> Create an account or <a href="{{ route('login') }}"
                    class="font-semibold underline text-blue-800 hover:text-blue-600">
                    Login
                </a>
            </p>
            <form action="{{ route('register') }}" method="POST" class="flex flex-col md:pt-8">
                @csrf
                <div>
                    <x-input-field type="name" name="name" value="{{ old('name') }}" label="Full name" />
                </div>
                <div class="mt-4">
                    <x-input-field type="email" name="email" value="{{ old('email') }}" label="Email" />
                </div>
                <div class="mt-4">
                    <x-input-field type="password" name="password" autocomplete="password" label="Password" />
                </div>
                <div class="mt-4">
                    <x-input-field type="password" name="password_confirmation" autocomplete="new-password"
                        label="Confirm password" />
                </div>
                <p class="text-sm mb-8 text-gray-500 mt-4">By creating an account, you agree to our <a href="http://"
                        class="font-medium underline text-blue-800 hover:text-blue-600">Terms</a> and have read and
                    acknowledge the <a href="http://" class="font-medium underline text-blue-800 hover:text-blue-600">
                        Global Privacy Statement</a>.</p>
                <button type="submit"
                    class="w-full rounded-md px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-black shadow-md hover:text-black hover:bg-white focus:outline-none focus:ring-2">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <div class="w-1/2 shadow-2xl">
        <img class="hidden object-cover w-full h-screen md:block" src="{{ asset('images/cover.jpg') }}" />
    </div>
</div>

@endsection
