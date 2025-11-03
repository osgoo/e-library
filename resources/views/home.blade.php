@extends('layouts.app')

@section('content')
    <div x-data="{
            showModal: false,
            selectedItem: null,
            contentSlider: null,
            showSliderView: false,

            openModal(item) {
                this.selectedItem = item;
                this.showModal = true;
                this.showSliderView = false;
            },

            openSliderView() {
                this.showSliderView = true;
                this.$nextTick(() => {
                    if (this.contentSlider) {
                        this.contentSlider.destroy(true, true);
                    }
                    this.contentSlider = new Swiper('.content-slider', {
                        pagination: {
                            el: '.content-slider-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.content-slider-next',
                            prevEl: '.content-slider-prev',
                        },
                    });
                });
            },

            closeModal() {
                this.showModal = false;
                this.showSliderView = false;
                if (this.contentSlider) {
                    this.contentSlider.destroy(true, true);
                    this.contentSlider = null;
                }
            }
         }"
         @keydown.escape.window="closeModal()">

        <section class="mb-8">
            <div class="flex justify-between">
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Шинээр нэмэгдсэн</h3>
                <a href="{{ route('books') }}" class="inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">
                    Бүгдийг харах
                </a>
            </div>
            <div class="swiper book-slider relative pb-8">
                <div class="swiper-wrapper">
                    @foreach ($books as $book)
                        <div class="swiper-slide group">
                            <div class="relative cursor-pointer"
                                 @click="openModal({{ Js::from($book) }})"
                            >
                                <div class="bg-white dark:bg-gray-700 rounded-lg p-4 transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-600 shadow h-full">
                                        <div class="relative pt-[140%] mb-3">
                                            <img class="block w-full h-full absolute inset-0 object-cover rounded shadow-sm"
                                                src="{{ $book->cover ? Storage::url($book->cover) : 'https://via.placeholder.com/150x210/CCCCCC/969696?text=Book' }}"
                                                alt="{{ $book->title }}">
                                        </div>
                                        <div class="text-sm text-gray-900 dark:text-white font-semibold truncate mb-1">
                                            {{ $book->title }}
                                        </div>
                                        <div class="relative truncate">
                                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $book->author }}</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination book-slider-pagination absolute left-0 w-full"></div>
                <div class="swiper-button-prev book-slider-prev"></div>
                <div class="swiper-button-next book-slider-next"></div>
            </div>
        </section>

        <section class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Ангилал</h3>

            <div class="swiper category-slider relative pb-8">
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('category.filter', ['category_id' => $category->id]) }}" class="block bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold rounded-lg p-4 h-24 flex items-center justify-center text-center transition duration-300">
                                <span class="text-lg">{{ $category->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination category-slider-pagination mt-6 absolute bottom-0 left-0 w-full"></div>
                <div class="swiper-button-prev category-slider-prev"></div>
                <div class="swiper-button-next category-slider-next"></div>

                <div class="swiper-button-prev category-slider-prev text-gray-600 dark:text-gray-400 opacity-50 hover:opacity-100 after:text-lg -left-2"></div>
                <div class="swiper-button-next category-slider-next text-gray-600 dark:text-gray-400 opacity-50 hover:opacity-100 after:text-lg -right-2"></div>
            </div>
        </section>

        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 backdrop-blur-sm"
             style="display: none;"
             x-cloak
             @click.self="closeModal()"
             >

            <div x-show="showModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-3xl m-4 max-h-[90vh] flex flex-col overflow-hidden"
                 @click.outside="closeModal()"
                 >

                <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700 flex-shrink-0">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="selectedItem ? selectedItem.title : 'Дэлгэрэнгүй'"></h2>
                    <button type="button" @click="closeModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>

                <div class="p-6 overflow-y-auto flex-1" x-show="selectedItem">

                    <div x-show="!showSliderView" class="flex flex-col md:flex-row gap-6">
                        <div class="w-full md:w-1/3 flex-shrink-0">
                            <img :src="selectedItem ? (selectedItem.cover ? '/storage/' + selectedItem.cover : 'https://via.placeholder.com/150x210/CCCCCC/969696?text=No+Cover') : ''"
                                 :alt="selectedItem ? selectedItem.title : ''"
                                 class="w-full h-auto object-cover rounded shadow-md">
                        </div>
                        <div class="flex-1">
                            <p class="text-md text-gray-600 dark:text-gray-400 mb-4">
                                <span x-text="selectedItem ? selectedItem.author : ''"></span>
                                <span x-show="selectedItem && selectedItem.published_year" class="ml-2 text-sm text-gray-500">(<span x-text="selectedItem ? selectedItem.published_year : ''"></span> он)</span>
                            </p>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mt-6 mb-2">Товч агуулга</h3>
                            <div class="prose prose-sm dark:prose-invert max-w-none text-gray-700 dark:text-gray-300"
                                 x-html="selectedItem ? (selectedItem.description ? selectedItem.description.replace(/\n/g, '<br>') : 'Тайлбар байхгүй.') : ''">
                            </div>
                        </div>
                    </div>

                    <div x-show="showSliderView" style="display: none;">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="swiper content-slider relative pb-8 w-full">
                                <div class="swiper-wrapper">
                                    <template x-if="selectedItem && selectedItem.pages && selectedItem.pages.length > 0">
                                        <template x-for="page in selectedItem.pages" :key="page.id">
                                            <div class="swiper-slide group">
                                                <div class="bg-white dark:bg-gray-700 rounded-lg p-4 shadow h-full">
                                                    <div class="relative pt-[140%] mb-3">
                                                        <img class="block w-full h-full absolute inset-0 object-contain rounded shadow-sm"
                                                             :src="page.page_content_url"
                                                             :alt="page.page_number">
                                                    </div>
                                                    <div class="text-center text-sm text-gray-900 dark:text-white font-semibold truncate mb-1"
                                                         x-text="'Хуудас: ' + page.page_number">
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </template>
                                    <template x-if="selectedItem && (!selectedItem.pages || selectedItem.pages.length === 0)">
                                        <div class="swiper-slide">
                                            <p class="text-center text-gray-500 dark:text-gray-400 p-8">
                                                Энэ номд хуудас нэмэгдээгүй байна.
                                            </p>
                                        </div>
                                    </template>
                                </div>
                                <div class="swiper-pagination content-slider-pagination absolute left-0 w-full"></div>
                                <div class="swiper-button-prev content-slider-prev"></div>
                                <div class="swiper-button-next content-slider-next"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex items-center justify-end p-4 border-t border-gray-200 dark:border-gray-700 flex-shrink-0 space-x-2">

                    <button type="button" @click="openSliderView()" x-show="!showSliderView"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">
                        Номыг унших
                    </button>

                    <button type="button" @click="showSliderView = false" x-show="showSliderView" style="display: none;"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-300 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 text-sm">
                        Буцах
                    </button>

                    <button type="button" @click="closeModal()"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-300 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500 text-sm">
                        Хаах
                    </button>
                </div>

            </div>
        </div>

    </div>
@endsection
