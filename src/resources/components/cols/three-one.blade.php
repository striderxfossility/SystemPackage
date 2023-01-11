@php($count = 0)

@if(isset($col_2))
    @php($count = $count + 1)
@endif

@if(isset($col_3))
    @php($count = $count + 1)
@endif

@if(isset($col_4))
    @php($count = $count + 1)
@endif

@if(isset($col_5))
    @php($count = $count + 1)
@endif

<div class="md:row-span-1 md:row-span-2 md:row-span-3"></div>

<div class="md:grid md:grid-cols-4 md:gap-10 mt-10">
    @if(isset($col_2))
        <x-layout-block class="md:col-span-3">
            {!! $col_2 !!}
        </x-layout-block>
    @endif

    @if(isset($col_1))
        <x-layout-block class="md:row-span-{{ $count }} bg-red">
            {!! $col_1 !!}
        </x-layout-block>
    @endif

    @if(isset($col_3))
        <x-layout-block class="md:col-span-3">
            {!! $col_3 !!}
        </x-layout-block>
    @endif

    @if(isset($col_4))
        <x-layout-block class="md:col-span-3">
            {!! $col_4 !!}
        </x-layout-block>
    @endif

    @if(isset($col_5))
        <x-layout-block class="md:col-span-3">
            {!! $col_5 !!}
        </x-layout-block>
    @endif
</div>