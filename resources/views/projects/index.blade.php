<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <header class="flex items-end justify-between mb-3 py-4">
                        <h2 class="card-head">My Projects</h2>
                        <a href="/projects/create" class="button">Add Project</a>
                    </header>
                    <main class="lg:flex flex-wrap -mx-3 lg:p-0">
                        @forelse($projects as $project)
                            <div class="lg:w-1/3 px-3 pb-6">
                                @include('projects.card')
                            </div>
                        @empty
                            <li>No projects yet</li>
                        @endforelse
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
