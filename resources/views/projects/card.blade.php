<div class="card" style="max-height:200px">
    <a href="{{ $project->path() }}">
        <h3 class="px-5 py-2 text-xl mb-6 font-bold border-l-4 border-blue-500 truncate overflow-ellipsis transition hover:text-blue-400">{{ $project->title }}</h3>
    </a>
    <p class="px-5 text-gray-400">{{ Str::limit($project->description) }}</p>
</div>
