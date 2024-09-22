<x-layout>
    <x-page-heading>Post a Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input name="title" label="Job Title" placeholder="Web Developer"/>
        <x-forms.input name="salary" label="Salary" placeholder="$50,000 USD"/>
        
        <x-forms.select name="location" label="Location">
            <option>On-site</option>
            <option>Remote</option>
            <option>Hybrid</option>
            <option>Other</option>
        </x-forms.select>

        <x-forms.select name="schedule" label="Job Type">
            <option>Full Time</option>
            <option>Part Time</option>
            <option>Contract</option>
            <option>Internship</option>
            <option>Apprenticeship</option>
        </x-forms.select>

        <x-forms.input name="url" label="Job URL" placeholder="www.your-site.com/this_job/this_job_id"/>
        <x-forms.checkbox name="featured" label="Feature A Job(Costs extra)" />
        <x-forms.input name="tags" label="Job Tags (comma separated)" placeholder="web development, front-end, react"/>

        <x-forms.button>Publish Job</x-forms.button>
    </x-forms.form>
</x-layout>