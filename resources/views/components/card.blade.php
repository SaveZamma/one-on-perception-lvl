@props(['custom' => "defaultValue", 'dynamic' => false])

<div @class(['dynamicClass' => $dynamic, 'card', $custom])>
    {{ $slot }}
    <a {{ $attributes }}>View</a>
</div>