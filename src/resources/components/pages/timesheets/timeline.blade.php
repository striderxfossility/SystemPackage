<div class="ml-64 mr-64 pb-24 mt-24 hidden md:block">
    <div class="h-14 w-full bg-red-300 relative rounded" id="full">
        @for ($i = 0; $i <= 23; $i++)
            <div id="clock-{{ $i }}" style="position:absolute; top:-15px; transform: rotate(-70deg); transform-origin: top left;">{{ $i }}:00</div>
            <div id="clockB-{{ $i }}" class="h-14 absolute border border-teal-300"></div>
        @endfor

        @if(\Auth::user() != null)
            @php($getter = \App\Models\Timesheet::where('user_id', auth()->user()->id)->where('date', $date)->get())
        @else
            @php($getter = \App\Models\Timesheet::where('tegelzetter_id', \Auth::guard('tegelzetter')->user()->id)->where('date', $date)->get())
        @endif

        @foreach ($getter as $time)
            <div id="time-{{ $time->id }}" class="absolute h-14" style="width:{{ $time->blocks }}px; left:10px; background-color:rgba(34, 197, 94, 0.5);"></div>
        @endforeach
    </div>
</div>

@if(\Auth::user() != null)
    @if(auth()->user()->email == 'jelle@weerstandnatuursteen.nl')   
        <x-timesheets-table :timesheets="\App\Models\Timesheet::where('date', $date)->orderBy('from')->get()" />
    @else
        <x-timesheets-table :timesheets="\App\Models\Timesheet::where('user_id', auth()->user()->id)->where('date', $date)->orderBy('from')->get()" />
    @endif
@else
    <x-timesheets-table :timesheets="\App\Models\Timesheet::where('tegelzetter_id', \Auth::guard('tegelzetter')->user()->id)->where('date', $date)->orderBy('from')->get()" />
@endif


@if(\Auth::user() != null)
    @php($getter = \App\Models\Timesheet::where('user_id', auth()->user()->id)->where('date', $date)->get())
@else
    @php($getter = \App\Models\Timesheet::where('tegelzetter_id', \Auth::guard('tegelzetter')->user()->id)->where('date', $date)->get())
@endif

<script>
    var pixels = document.getElementById('full').clientWidth
    var block = pixels / 95

    

    @foreach ($getter as $time)
        document.getElementById('time-{{ $time->id }}').style.width = {{ $time->blocks }} * block + 'px';
        document.getElementById('time-{{ $time->id }}').style.left = {{ $time->padding / 15 }} * block + 'px';
    @endforeach

    @for ($i = 0; $i <= 23; $i++)
        document.getElementById('clock-{{ $i }}').style.left = {{ $i * 60 / 15 }} * block - 10 + 'px';
        document.getElementById('clockB-{{ $i }}').style.left = {{ $i * 60 / 15 }} * block - 1 + 'px';
    @endfor
</script>