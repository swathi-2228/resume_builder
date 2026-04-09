<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight gradient-text">
            {{ __('Create New Resume') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="glass dark:glass sm:rounded-3xl p-8 shadow-2xl">
                
                @if ($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('resumes.store') }}" method="POST" class="space-y-8" x-data="{
                    skills: [''],
                    addSkill() { this.skills.push('') },
                    removeSkill(index) { this.skills.splice(index, 1) }
                }">
                    @csrf
                    
                    <div>
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Basic Info</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Resume Title</label>
                                <input type="text" name="title" required class="glass-input w-full" placeholder="e.g. Full Stack Developer">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                                <input type="text" name="full_name" class="glass-input w-full" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                <input type="email" name="email" class="glass-input w-full" placeholder="john@example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Phone</label>
                                <input type="text" name="phone" class="glass-input w-full" placeholder="+1 234 567 8900">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Address</label>
                        <input type="text" name="address" class="glass-input w-full" placeholder="123 Main St, City, Country">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Professional Summary</label>
                        <textarea name="summary" rows="4" class="glass-input w-full" placeholder="A brief summary of your professional background..."></textarea>
                    </div>

                    <div>
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">Skills</h3>
                        <template x-for="(skill, index) in skills" :key="index">
                            <div class="flex items-center mb-3 group">
                                <input type="text" x-model="skills[index]" :name="`skills[]`" class="glass-input w-full md:w-1/2" placeholder="e.g. JavaScript, PHP, Leadership">
                                <button type="button" @click="removeSkill(index)" class="ml-3 text-red-500 hover:text-red-700 bg-red-100 p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="addSkill()" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400">+ Add Skill</button>
                    </div>

                    <!-- To keep things manageable, we will use text areas for raw JSON/structured text for Education/Experience, 
                         or simple Alpine components like above. For the sake of this demo, we'll keep it simple array inputs like skills but for textareas to allow pasting descriptions. -->
                    
                    <div class="flex justify-end pt-6 border-t border-gray-200 dark:border-gray-700">
                        <x-primary-button class="px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 transform hover:scale-105 transition-all text-lg shadow-lg">
                            {{ __('Save Resume') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
