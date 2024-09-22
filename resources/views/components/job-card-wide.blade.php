@props(['job'])

<div class="p-4 bg-white/5 rounded-xl flex gap-x-6 cursor-pointer transform transition-transform 
            hover:scale-110 duration-700 border border-transparent hover:border-blue-800 group">
    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>
    
    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-500">{{ $job->employer->name }}</a>
        <h3 class="text-xl font-semibold mt-3 tracking-wider group-hover:text-blue-800">{{ $job->title }}</h3>
        <p class="text-sm text-gray-600 mt-auto">{{ $job->location }} - From {{ $job->salary }}</p>
    </div>

    
    <div class="space-x-1">
        @foreach ($job->tags as $tag)
            <x-tag :tag="$tag"/>
        @endforeach
    </div>
    

</div>