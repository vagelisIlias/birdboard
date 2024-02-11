<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('project.create') }}">
                        @csrf

                        <h1 class="card-head">Create a Project</h1>

                        <div class="field mt-4">
                            <label class="label" for="title">Title</label>

                            <div class="control">
                                <input type="text" 
                                class="w-full rounded-md p-2 dark:bg-gray-200 text-gray-900 dark:text-gray-900"
                                name="title" id="title" placeholder="Title">                            
                            </div>
                        </div>

                        <div class="field mt-4">
                            <label class="label" for="description">Description</label>

                            <div class="control">
                                <textarea name="description" id="description" rows="10" cols="50"
                                class="w-full rounded-md p-2 dark:bg-gray-200 text-gray-900 dark:text-gray-900"></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control flex justify-between mt-4">
                                <button type="submit" class="button">Create Project</button>
                                <a href="/projects">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
