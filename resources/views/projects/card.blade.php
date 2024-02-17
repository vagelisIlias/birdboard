<div class="card">
    <a href="{{ $project->path() }}">
        <h3 class="px-5 py-2 text-xl mb-6 
        font-bold border-l-4 border-blue-400 truncate 
        overflow-ellipsis transition hover:text-blue-500"
        >
        {{ $project->title }}
        </h3>
    </a>
    <p class="px-5 text-gray-500">{{ Str::limit($project->description, 100) }}</p>
</div>
