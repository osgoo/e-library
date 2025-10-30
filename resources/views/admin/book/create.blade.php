@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">

                    <h2 class="text-2xl font-semibold mb-6">Шинэ ном нэмэх</h2>

                    <form method="POST" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="title" class="block font-medium text-sm text-gray-700">
                                    {{ __('Номын нэр (Title)') }}
                                </label>
                                <input id="title"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="text" name="title" value="{{ old('title') }}" autofocus />
                                @error('title')
                                    <ul class="text-sm text-red-600 space-y-1 mt-2">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>

                            <div>
                                <label for="author" class="block font-medium text-sm text-gray-700">
                                    {{ __('Зохиогч (Author)') }}
                                </label>
                                <input id="author"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="text" name="author" value="{{ old('author') }}"  />
                                @error('author')
                                    <ul class="text-sm text-red-600 space-y-1 mt-2">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>

                            <div>
                                <label for="category_id" class="block font-medium text-sm text-gray-700">
                                    {{ __('Ангилал') }}
                                </label>
                                <select id="category_id" name="category_id"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">-- Сонгоно уу --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <ul class="text-sm text-red-600 space-y-1 mt-2">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>

                            <div>
                                <label for="published_year" class="block font-medium text-sm text-gray-700">
                                    {{ __('Хэвлэгдсэн он (Published Year)') }}
                                </label>
                                <input id="published_year"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="number" name="published_year" value="{{ old('published_year') }}" />
                                @error('published_year')
                                    <ul class="text-sm text-red-600 space-y-1 mt-2">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="description" class="block font-medium text-sm text-gray-700">
                                    {{ __('Товч тайлбар (Description)') }}
                                </label>
                                <textarea id="description" name="description" rows="4"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                                @error('description')
                                    <ul class="text-sm text-red-600 space-y-1 mt-2">
                                        <li>{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="cover" class="block font-medium text-sm text-gray-700">
                                    {{ __('Номын хавтас (Cover)') }}
                                </label>
                                <input id="cover" name="cover" type="file"
                                    class="block w-full text-sm text-gray-500 mt-1
                                           file:mr-4 file:py-2 file:px-4
                                           file:rounded-lg file:border-0
                                           file:text-sm file:font-semibold
                                           file:bg-indigo-50 file:text-indigo-700
                                           hover:file:bg-indigo-100
                                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                                           border border-gray-300 rounded-lg p-2
                                    " />
                                @error('cover')
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
