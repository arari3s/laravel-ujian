<div class="bg-white rounded-lg shadow-lg p-5 md:p-20 mx-2">

    <!-- Start of quiz box -->
    @if ($quizInProgress)
        <div class="px-4 -py-3 sm:px-6 ">
            <div class="flex max-w-auto justify-between">
                <h1 class="text-sm leading-6 font-medium text-gray-900">
                    <span class="text-gray-400 font-extrabold p-1">User</span>
                    <span
                        class="font-bold p-2 leading-loose bg-blue-500 text-white rounded-lg">{{ Auth::user()->name }}</span>
                </h1>

                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    <span class="text-gray-400 font-extrabold p-1">Quiz Progress </span>
                    <span
                        class="font-bold p-3 leading-loose bg-blue-500 text-white rounded-full">{{ $count . '/' . $quizSize }}</span>
                </p>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-6">
            <form wire:submit.prevent>
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 mb-2 font-medium text-gray-900">
                        <span class="mr-2 font-extrabold"> {{ $count }}</span> {{ $currentQuestion->question }}
                    </h3>
                    @foreach ($currentQuestion->questionbank->answer as $a)
                        <label for="question-{{ $a->id }}">
                            <div
                                class="max-w-auto px-3 py-3 m-3 text-gray-800 rounded-lg border-2 border-gray-300 text-sm ">
                                <span class="mr-2 font-extrabold"><input id="question-{{ $a->id }}"
                                        value="{{ $a->id . ',' . $a->is_checked }}" wire:model="userAnswered"
                                        type="checkbox"> </span>{!! $a->answer !!}
                            </div>
                        </label>
                    @endforeach
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if ($count < $quizSize)
                        <button wire:click="nextQuestion" type="submit"
                            @if ($isDisabled) disabled='disabled' @endif
                            class="m-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            {{ __('Next Question') }}
                        </button>
                    @else
                        <button wire:click="nextQuestion" type="submit"
                            @if ($isDisabled) disabled='disabled' @endif
                            class="m-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            {{ __('Show Results') }}
                        </button>
                    @endif
                </div>
            </form>
        </div>
    @endif
    <!-- end of quiz box -->

    @if ($showResult)
        <section class="text-gray-600 body-font">
            <div class="bg-white border-2 border-gray-300 shadow overflow-hidden sm:rounded-lg">
                <div class="container px-5 py-5 mx-auto">
                    <div class="text-center mb-5 justify-center">
                        <h1 class=" sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4">Quiz
                            Result</h1>
                        <p class="text-md mt-10"> Dear <span class="font-extrabold text-blue-600 mr-2">
                                {{ Auth::user()->name . '!' }} </span> You have secured <a
                                class="bg-green-300 px-2 mx-2 hover:green-400 rounded-lg underline"
                                href="{{ route('userQuizDetails', $quizid) }}">Show quiz details</a></p>
                        <progress class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto"
                            id="quiz-{{ $quizid }}" value="{{ $quizPecentage }}" max="100">
                            {{ $quizPecentage }} </progress> <span> {{ $quizPecentage }}% </span>
                    </div>
                    <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                <svg fill=" none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4"
                                    viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                    <path d="M22 4L12 14.01l-3-3"></path>
                                </svg>
                                <span class="title-font font-medium mr-5 text-purple-700">Correct Answers</span><span
                                    class="title-font font-medium">{{ $currectQuizAnswers }}</span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4"
                                    viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                    <path d="M22 4L12 14.01l-3-3"></path>
                                </svg>
                                <span class="title-font font-medium mr-5 text-purple-700">Total Questions</span><span
                                    class="title-font font-medium">{{ $totalQuizQuestions }}</span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4"
                                    viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                    <path d="M22 4L12 14.01l-3-3"></path>
                                </svg>
                                <span class="title-font font-medium mr-5 text-purple-700">Percentage Scored</span><span
                                    class="title-font font-medium">{{ $quizPecentage . '%' }}</span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4"
                                    viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                    <path d="M22 4L12 14.01l-3-3"></path>
                                </svg>
                                <span class="title-font font-medium mr-5 text-purple-700">Quiz Status</span><span
                                    class="title-font font-medium">{{ $quizPecentage > 70 ? 'Pass' : 'Fail' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto min-w-full p-2 md:flex m-2 justify-between">
                        <a href="{{ route('userQuizDetails', $quizid) }}"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">See
                            Quizzes Details</a>
                        <a href="{{ route('userQuizHome') }}"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">See
                            All Your Quizzes</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($setupQuiz)
        <section class="text-gray-600 mx-auto body-font">
            <div class="container px-5 py-2 mx-auto">
                <div class="flex flex-wrap -m-4">

                    <div class="p-4 md:w-1/2 w-full">
                        <form wire:submit.prevent="startQuiz">
                            @csrf
                            <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Take a Quiz</h2>

                            <div class="relative mx-full mb-4">
                                <select name="question" id="questions_id" wire:model="questionId"
                                    class="block w-full mt-1 rounded-md bg-gray-100 border-2 border-gray-500 focus:bg-white focus:ring-0">
                                    @if ($question->isEmpty())
                                        <option value="">No Quiz Course Available Yet</option>
                                    @else
                                        <option value="">Select a Quiz Course</option>
                                        @foreach ($question as $q)
                                            @if ($q->course_count > 0)
                                                <option value="{{ $q->id }}">{{ $q->course->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @error('questionId')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="relative mb-4">
                                <select name="quiz_size" id="quiz_size" wire:model="quizSize"
                                    class="max-w-full block w-full mt-1 rounded-md bg-gray-100 border-2 border-gray-500 focus:bg-white focus:ring-0">
                                    @for ($i = 1; $i <= 50; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('quizSize')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="block w-full text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Start
                                Quiz</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
