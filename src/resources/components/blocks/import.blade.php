<x-layout-blocks-title>
    <i class="fa-solid fa-tags"></i> importeren
</x-layout-blocks-title>
<div class="w-auto text-center mb-10">
    <x-layout-forms-main method="post" action="{{ $action }}" :errors="isset($errors) ? $errors : null">
        <x-input-attachment />
        <x-input-submit name="Importeren" :full="true" />
    </x-layout-forms-main>
</div>