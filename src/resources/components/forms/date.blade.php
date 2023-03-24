<label class='mt-4 block font-medium text-sm text-gray-700'>
    {{ $label }}
</label>

<input id="datepicker-{{ $name }}" class="datepicker-{{ $name }} block mt-1 w-full shadow-sm border-slate-300 focus:border-slate-300 focus:ring focus:ring-slate-200 focus:ring-opacity-50" type="text" id="{{ $name }}" name="{{ $name }}" value="{{ $value != '' ? $value : old($name) }}" />

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

<script type="text/javascript"> 
    $( ".datepicker-{{ $name }}" ).datepicker({
        showWeek: true,
        firstDay:1,
        dateFormat: 'yy-mm-dd'
    });
</script>