<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Question Bank &raquo; #{{ $questionbank->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href={{ route('dashboard.questionbank.index') }}
                    class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded shadow-lg">
                    Kembali
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Soal</th>
                                <td class="border px-6 py-4">
                                    {!! $questionbank->question !!}
                                </td>
                            </tr>

                            @foreach ($questionbank->answer as $answer)
                                <tr>
                                    <th class="border px-6 py-4">
                                        <div
                                            class="@if ($answer->is_checked === 1) bg-green-400 p-2 text-white rounded-xl @endif justify-center mx-auto text-xs font-extrabold">
                                            {{ $answer->is_checked === 1 ? 'Correct' : 'Wrong' }}
                                        </div>
                                    </th>
                                    <td class="border px-6 py-4">
                                        {!! $answer->answer !!}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
