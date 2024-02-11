<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header class="flex items-end justify-between mb-3 py-4">
                        <p class="text-lg text-gray-400">
                            <a href="/projects" class="link-gray">My Projects</a> / {{ $project->title }}</p>
                        <a href="/projects/create" class="button">Add Project</a>
                    </header>
                    <main>
                        <div class="lg:flex -mx-3 ">
                            <div class="lg:w-2/3 px-3">
                                <div class="mb-8">
                                    <h2 class="text-lg text-gray-400 mb-3">Tasks</h2>
                                    {{-- tasks --}}
                                    <div class="card p-4 mb-3 last:mb-0">
                                        Lorem ipsum...
                                    </div>
                                    <div class="card p-4 mb-3 last:mb-0">
                                        Lorem ipsum...
                                    </div>
                                    <div class="card p-4 mb-3 last:mb-0">
                                        Lorem ipsum...
                                    </div>
                                    <div class="card p-4 mb-3 last:mb-0">
                                        Lorem ipsum...
                                    </div>
                                </div>
                                <div class="mb-8">
                                    <h2 class="text-lg text-gray-400 mb-3">General Notes</h2>
                                    {{-- notes --}}
                                    <form action="">
                                        <label for="notes" class="sr-only"></label>
                                        <textarea id="notes" name="notes" rows="5" class="card p-4 w-full" placeholder="Lorem impsum dolor sit amet..."></textarea>
                                    </form>
                                </div>
                            </div>
                            <div class="lg:w-1/3 px-3">
                               @include('projects.card')
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
