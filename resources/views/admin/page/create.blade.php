@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">

                    <h2 class="text-2xl font-semibold mb-6">Шинэ хуудас нэмэх</h2>

                    <form method="POST" action="{{ route('admin.book.pages.store', ['id'=>$book->id]) }} " enctype="multipart/form-data">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label for="page_number" class="block font-medium text-sm text-gray-700">
                                    {{ __('Хуудасны дугаар') }}
                                </label>
                                <input id="page_number"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="number" name="page_number" value="{{ old('page_number') }}" />
                                @error('page_number')
                                    <ul class="text-sm text-red-600 space-y-1 mt-2">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                            <div>
                                <label for="page_content" class="block font-medium text-sm text-gray-700">
                                    {{ __('Хуудас') }}
                                </label>
                                <input id="page_content" name="page_content" type="file"
                                    class="block w-full text-sm text-gray-500 mt-1
                                           file:mr-4 file:py-2 file:px-4
                                           file:rounded-lg file:border-0
                                           file:text-sm file:font-semibold
                                           file:bg-indigo-50 file:text-indigo-700
                                           hover:file:bg-indigo-100
                                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                                           border border-gray-300 rounded-lg p-2
                                    " />
                                @error('page_content')
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
