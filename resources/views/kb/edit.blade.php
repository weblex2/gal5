<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Knowledge Base') }}
        </h2>
    </x-slot>
<form method="POST" action="{{ route("kb.update", ['id'=>$kb->id]) }}">
    @csrf
    <input type="text" name="topic" value="{{ $kb->topic}}">
    <input type="text" name="description" value="{{ $kb->description}}">
    <textarea name="body">"{{ $kb->body }}"</textarea>
    <input type="submit" value="Save">
</form>
</x-app-layout>