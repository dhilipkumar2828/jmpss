@extends('layouts.app')
@section('title', 'Facilities - Jeeva Memorial Senior Secondary School')

@section('content')
<main class="page-shell">
    <div class="site-container">
        <section class="page-hero">
            <h1>Facilities</h1>
            <p>Facility section based on mentions from the old About and Curriculum pages. Fields without verified details are marked for update.</p>
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Facilities</span>
            </div>
        </section>
    </div>

    <x-ui.section-wrapper eyebrow="Campus" title="Learning and Student Support Infrastructure">
        <div class="ui-grid-3">
            <x-ui.card title="Labs" subtitle="Language and Computer" icon="LB">
                <p>Comfortable staff rooms, language lab and computer lab are part of the school learning setup.</p>
            </x-ui.card>

            <x-ui.card title="Library" subtitle="Resource center" icon="LY">
                <p>Library-specific details are currently not listed in legacy content. This section is ready for official updates.</p>
            </x-ui.card>

            <x-ui.card title="Sports and Play" subtitle="Campus areas" icon="SP">
                <p>Lawns and play areas are designed with student comfort and safety in mind.</p>
            </x-ui.card>

            <x-ui.card title="Transport" subtitle="Commute information" icon="TR">
                <p>Transport route and timing details can be obtained from the school office contact numbers.</p>
            </x-ui.card>

            <x-ui.card title="Safety / CCTV" subtitle="Student monitoring" icon="SF">
                <p>CCTV monitoring and trained support staff are part of student day supervision and campus care.</p>
            </x-ui.card>

            <x-ui.card title="Creative Spaces" subtitle="Arts and activities" icon="CR">
                <p>Dance room, art room and audio visual room are listed as part of school facilities for student development.</p>
            </x-ui.card>
        </div>
    </x-ui.section-wrapper>

    <x-ui.section-wrapper eyebrow="Enquiry" title="Need Facility Details?" tone="soft">
        <div class="contact-block">
            <p class="section-desc" style="margin:0;">For current class-wise facility access details, contact the school office directly.</p>
            <div style="margin-top: 1rem;">
                <x-ui.button href="{{ route('contact') }}" variant="primary">Contact School Office</x-ui.button>
            </div>
        </div>
    </x-ui.section-wrapper>
</main>
@endsection
