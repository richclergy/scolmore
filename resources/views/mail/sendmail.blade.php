@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-center font-bold mb-4">SENDING RATE LIMITED EMAILS</h1>
            @if (session()->has('status'))            
                <div class="bg-red-500 p-4 rounded-lg mb-6 mt-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('sendmail') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="fullname" class="sr-only">Sender Fullname:</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter Your Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('fullname') border-red-500 @enderror"  value="{{ old('fullname') }}">
                    @error('fullname')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="receipient" class="sr-only">Receiver:</label>
                    <input type="email" name="receipient" id="receipient" placeholder="Enter Receipient Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('receipient') border-red-500 @enderror" value="{{ old('receipient') }}">
                    @error('receipient')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="fullname" class="sr-only">Message:</label>
                    <textarea name="message" id="message" rows="4" placeholder="Enter Your Message" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Send Mail</button>
                </div>
            </form>
        </div>
    </div>
@endsection