<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Knowledge Base') }}
        </h2>
    </x-slot>
<form method="POST" action="{{ route("kb.update", ['id'=>$kb->id]) }}">
    @csrf
    <table>
    <tr><td>Topic</td><td><input type="text" name="topic" value="{{ $kb->topic}}"></td></tr>
    <tr><td>Description</td><td><input type="text" name="description" value="{{ $kb->description}}"></td></tr>
    <tr><td>Body</td><td><textarea name="body">"{{ $kb->body }}"</textarea></td></tr>
    </table>
    <input type="submit" value="Save">
</form>
</x-app-layout>