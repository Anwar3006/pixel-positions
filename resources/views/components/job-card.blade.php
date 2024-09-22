@props(['job'])

<div class="p-4 bg-white/5 rounded-xl flex flex-col items-center border border-transparent hover:border-blue-800 group">
    <a href="{{ $job->url }}">
        <div class="self-start text-sm">{{ $job->employer->name }}</div>

        <div class="py-8 text-center">
            <h3 class="group-hover:text-indigo-800 text-xl font-bold">{{ $job->title }}</h3>
            <p class="text-sm mt-4">{{ $job->location }} - From {{ $job->salary }}</p>
        </div>

        <div class="flex items-center justify-between mt-auto w-full">
            <div class="space-x-1">
                @foreach ($job->tags as $tag)
                    <x-tag size="small" :tag="$tag"/>
                @endforeach
            </div>
            <x-employer-logo :employer="$job->employer" :width="42" />
        </div>

    </a>
</div>