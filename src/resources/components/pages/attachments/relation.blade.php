<x-blocks-title>
    <i class="fa-solid fa-paperclip"></i> Bijlage(n)
</x-blocks-title>

<div class="grid grid-cols-4 gap-x-2" id="attachments">
    @foreach($attachments as $attachment)
        <x-block-small handle="handleAttachment cursor-move">
            <x-input-text label="hidden" class="sortingAttachment" name="sortAttachment[{{ $attachment->id }}]" :value="$attachment->sort" />

            <img onclick="window.location.href = '{{ asset('img/settings/attachment/' . $attachment->src) }}';" style="object-fit:contain; margin:0 auto; height:200px; width:200px;" src="{{ asset($attachment->thumbnailsmall) }}" />
            <div class="text-center mt-2">
                <div>{{ $attachment->name }}</div>
                <div class="text-xs text-slate-700">Toegevoegd op {{ $attachment->created_at }}</div>
            </div>
            <x-blocks-button :url="route('attachments.destroy', $attachment)" color="red" :bottom="true">
                Verwijderen
            </x-blocks-button>
        </x-block-small>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    window.addEventListener("load", (event) => {
        var el = document.getElementById('attachments')

        var sortable = new Sortable(el, 
        {
            handle: '.handleAttachment',
            onEnd: function (evt) 
            {
                var sort_array = []
                var i = 0
                Array.from(document.getElementsByClassName("sortingAttachment")).forEach(
                    function(element, index, array) 
                    {
                        sort_array.push({
                            'id': parseInt(element.name.replace('sortAttachment[', '').replace(']', '')),
                            'value': parseInt(i),
                        })
                        i++
                    }
                );

                console.log(sort_array)

                jQuery.ajax({
                    url: "{{ route('api.sort.set') }}",
                    method: 'post',
                    data: 
                    {
                        arr: sort_array,
                        table: 'attachments',

                    },
                    success: function(result) 
                    {
                    }
                })
            }
        })
    })
</script>