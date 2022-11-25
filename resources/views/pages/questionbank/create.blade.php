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
                    {{-- soal --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Soal
                                <span class="text-red-500">*</span></label>
                            <textarea name="question" type="text" name="question" value="{{ old('question') }}"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                cols="30" rows="10">
                            </textarea>
                        </div>
                    </div>

                    {{-- jawaban 1 --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jawaban 1
                                <span class="text-red-500">*</span></label>

                            <input type="hidden" value="0" name="answers[0][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                            <input type="checkbox" value="1" name="answers[0][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">

                            <label for="is_checked" class="ml-2 text-sm font-medium text-gray-900">Jawaban Benar
                            </label>

                            <span class="min-w-full mx-auto px-5">
                                <textarea name="answers[0][answer]"
                                    class="mt-1 text-xs block w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    cols="30" rows="10">
                                </textarea>
                            </span>
                        </div>
                    </div>

                    {{-- jawaban 2 --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jawaban 2
                                <span class="text-red-500">*</span></label>

                            <input type="hidden" value="0" name="answers[1][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                            <input type="checkbox" value="1" name="answers[1][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">

                            <label for="is_checked" class="ml-2 text-sm font-medium text-gray-900 ">Jawaban Benar
                            </label>

                            <span class="min-w-full mx-auto px-5">
                                <textarea name="answers[1][answer]"
                                    class="mt-1 text-xs block w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    cols="30" rows="10">
                                </textarea>
                            </span>
                        </div>
                    </div>

                    {{-- jawaban 3 --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jawaban 3
                                <span class="text-red-500">*</span></label>

                            <input type="hidden" value="0" name="answers[2][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                            <input type="checkbox" value="1" name="answers[2][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">

                            <label for="is_checked" class="ml-2 text-sm font-medium text-gray-900 ">Jawaban Benar
                            </label>

                            <span class="min-w-full mx-auto px-5">
                                <textarea name="answers[2][answer]"
                                    class="mt-1 text-xs block w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    cols="30" rows="10">
                                </textarea>
                            </span>
                        </div>
                    </div>

                    {{-- jawaban 4 --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jawaban 4
                                <span class="text-red-500">*</span></label>

                            <input type="hidden" value="0" name="answers[3][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                            <input type="checkbox" value="1" name="answers[3][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">

                            <label for="is_checked" class="ml-2 text-sm font-medium text-gray-900 ">Jawaban Benar
                            </label>

                            <span class="min-w-full mx-auto px-5">
                                <textarea name="answers[3][answer]"
                                    class="mt-1 text-xs block w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    cols="30" rows="10">
                                </textarea>
                            </span>
                        </div>
                    </div>

                    {{-- jawaban 5 --}}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jawaban 5
                                <span class="text-red-500">*</span></label>

                            <input type="hidden" value="0" name="answers[4][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                            <input type="checkbox" value="1" name="answers[4][is_checked]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">

                            <label for="is_checked" class="ml-2 text-sm font-medium text-gray-900 ">Jawaban Benar
                            </label>

                            <span class="min-w-full mx-auto px-5">
                                <textarea name="answers[4][answer]"
                                    class="mt-1 text-xs block w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    cols="30" rows="10">
                                </textarea>
                            </span>
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

    <script src="{{ url('https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('question', {
            filebrowserUploadUrl: "{{ route('dashboard.questionbank.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('answers[0][answer]', {
            filebrowserUploadUrl: "{{ route('dashboard.questionbank.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('answers[1][answer]', {
            filebrowserUploadUrl: "{{ route('dashboard.questionbank.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('answers[2][answer]', {
            filebrowserUploadUrl: "{{ route('dashboard.questionbank.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('answers[3][answer]', {
            filebrowserUploadUrl: "{{ route('dashboard.questionbank.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('answers[4][answer]', {
            filebrowserUploadUrl: "{{ route('dashboard.questionbank.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        $(document).ready(function() {
            $('body').on('submit', '#submitform', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    type: POST,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        alert(data.msg);
                    }
                })
            });
        })
    </script>

</x-app-layout>
