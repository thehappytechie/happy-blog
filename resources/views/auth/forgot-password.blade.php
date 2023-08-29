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
            <p class="text-4xl text-center font-heading mb-2">
                Forgot Password
            </p>
            <p class="text-gray-500">Please enter your email and we’ll send you a recovery link to reset your password
            </p>
            <form action="{{ route('password.request') }}" method="POST" class="flex flex-col md:pt-8">
                @csrf
                <div class="mb-8">
                    <x-input-field type="email" name="email" label="Email" />
                </div>
                <button type="submit"
                    class="w-full rounded-md px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-black shadow-md hover:text-black hover:bg-white focus:outline-none focus:ring-2">
                    <span class="w-full"> Submit </span>
                </button>
            </form>
            <div class="pt-8 pb-8 text-center">
                <p class="text-gray-500">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold underline text-blue-800 hover:text-blue-600">
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

@endsection
