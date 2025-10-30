@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">

                    <h2 class="text-2xl font-semibold mb-6">Шинэ ангилал нэмэх</h2>

                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">
                                    {{ __('Ангиллын нэр (Name)') }}
                                </label>
                                <input id="name"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="text" name="name" required autofocus />
                                @error('name')
                                    <ul class="text-sm text-red-600 space-y-1 mt-2">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Хадгалах') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
