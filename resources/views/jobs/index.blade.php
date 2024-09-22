<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h2 class="font-bold text-4xl tracking-wide">Let's find your next job</h2>
            {{-- <form action="" class="mt-6">
                <input type="text" placeholder="Web Developer..." class="rounded-xl bg-white/5 border border-white/10 py-4 px-5 focus:outline-none w-full max-w-xl" >
            </form> --}}

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input type="text" name="q" :label="false" placeholder="Web Developer..." />
            </x-forms.form>
        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>
            
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach ($featuredJobs as $job)
                <x-job-card :job="$job" />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-2">
                @foreach ($tags as $tag)
                    <x-tag :tag="$tag"/>
                @endforeach
            </div>
        </section>
        
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6  space-y-6">
                @foreach ($jobs as $job)
                    <x-job-card-wide :job="$job"/>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>