<label class='mt-4 block font-medium text-sm text-gray-700'>
    {{ $label }}
</label>

@if($value != '')
    <img class="text-center" src="{{ asset('img/' . \Jelle\Strider\ImageService::get($value) ) }}" />
@endif

<div style="height: 160px; padding:2px; border-color:rgb(209 213 219); border-width:1px;" class="dropzone dropzone-{{ $name }} w-full h-20 text-xs border-gray-200 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    <input type="file" name="{{ $name }}" id="{{ $name }}" style="opacity: 0; position: absolute;">
</div>

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script type="text/javascript">
Dropzone.autoDiscover = false;
    var dropzone = new Dropzone('.dropzone-{{ $name }}', {
        autoProcessQueue: false,
        autoDiscover: false,
        uploadMultiple: false,
        acceptedFiles: ".jpeg,.jpg,.png,.pdf, .xlsx",
        paramName: '{{ $name }}',
        url: "/ajax_file_upload_handler/",
    });

    dropzone.on("addedfile", file => {
        document.querySelector(".dz-progress").style.opacity = 0;
        const dataTransfer = new DataTransfer()
        dataTransfer.items.add(file)
        document.getElementById('{{ $name }}').files = dataTransfer.files
    })
</script>