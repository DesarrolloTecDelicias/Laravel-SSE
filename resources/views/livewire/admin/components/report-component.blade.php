<div>
    <x-header :title="'Reporte '. $title" />

    <div class="py-4">
        @switch($survey)
            @case(1)  <livewire:tables.admin.report.survey-one-table /> @break
            @case(2)  <livewire:tables.admin.report.survey-two-table /> @break
            @case(3)  <livewire:tables.admin.report.survey-three-table /> @break
            @case(4)  <livewire:tables.admin.report.survey-four-table /> @break
            @case(5)  <livewire:tables.admin.report.survey-five-table /> @break
            @case(6)  <livewire:tables.admin.report.survey-six-table /> @break
            @case(7)  <livewire:tables.admin.report.survey-seven-table /> @break
            @case(8)  <livewire:tables.admin.report.survey-one-company-table /> @break
            @case(9)  <livewire:tables.admin.report.survey-two-company-table /> @break
            @case(10) <livewire:tables.admin.report.survey-three-company-table /> @break
        @endswitch
    </div>
</div>