<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                Preview: <span class="text-indigo-500">{{ $resume->title }}</span>
            </h2>
            <div class="flex space-x-3">
                <a href="{{ route('resumes.edit', $resume) }}" class="px-5 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-full font-medium hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Edit
                </a>
                <a href="{{ route('resumes.pdf', $resume) }}" class="px-6 py-2 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-full font-medium shadow hover:shadow-lg transition-transform transform hover:-translate-y-1 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Download PDF
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Simulated A4 Paper Layout -->
            <div class="bg-white text-gray-900 overflow-hidden rounded-sm lg:rounded-md p-10 sm:p-16 shadow-2xl min-h-[1056px] relative">
                <div class="absolute top-0 left-0 w-full h-2 bg-indigo-600"></div>
                
                <div class="text-center border-b-2 border-gray-200 pb-8 mb-8">
                    <h1 class="text-4xl sm:text-5xl font-extrabold uppercase tracking-tight text-gray-900">{{ $resume->full_name ?: 'Your Name Here' }}</h1>
                    <div class="mt-4 flex flex-wrap justify-center gap-4 text-sm font-medium text-gray-600">
                        @if($resume->email)
                            <span class="flex items-center"><svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ $resume->email }}</span>
                        @endif
                        @if($resume->phone)
                            <span class="flex items-center"><svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> {{ $resume->phone }}</span>
                        @endif
                        @if($resume->address)
                            <span class="flex items-center"><svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $resume->address }}</span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-10">
                    @if($resume->summary)
                    <section>
                        <h2 class="text-xl font-bold uppercase tracking-widest text-indigo-700 mb-4 flex items-center">
                            <span class="w-8 border-t border-indigo-700 mr-2"></span> Summary
                        </h2>
                        <p class="text-gray-700 leading-relaxed text-justify">{{ $resume->summary }}</p>
                    </section>
                    @endif

                    @if($resume->skills && !empty(array_filter($resume->skills)))
                    <section>
                        <h2 class="text-xl font-bold uppercase tracking-widest text-indigo-700 mb-4 flex items-center">
                            <span class="w-8 border-t border-indigo-700 mr-2"></span> Core Competencies
                        </h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($resume->skills as $skill)
                                @if($skill)
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-md font-medium border border-gray-200">
                                    {{ $skill }}
                                </span>
                                @endif
                            @endforeach
                        </div>
                    </section>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
