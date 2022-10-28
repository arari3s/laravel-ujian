<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Question Bank &raquo; Create Question
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('dashboard.questionbank.store') }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Soal
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="question" value="{{ old('question') }}"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jawaban 1
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="answer[]" value="{{ old('answer[]') }}"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                            <div class="flex items-center mt-4">
                                <input id="is_checked0" name="is_checked[]" type="checkbox" value="1"
                                    {{ old('is_checked[]') ? 'checked="checked"' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="is_checked0"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jawaban
                                    Benar</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jawaban 2
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="answer[]" value="{{ old('answer[]') }}"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                            <div class="flex items-center mt-4">
                                <input id="is_checked1" name="is_checked[]" type="checkbox" value="1"
                                    {{ old('is_checked[]') ? 'checked="checked"' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="is_checked1"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jawaban
                                    Benar</label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit"
                                class="bg-teal-500 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded shadow-lg">Simpan</button>

                            <a href="{{ route('dashboard.questionbank.index') }}"
                                class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 ml-3 rounded shadow-lg">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('question');
    </script> --}}

</x-app-layout>
