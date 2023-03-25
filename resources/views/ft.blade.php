@extends('layouts.app')

@section('content')
<div class="h-screen text-center text-3xl bg-[#1D4A8B]">
    <ul class="space-y-8 pt-10">
        <li>
            <form method="POST" action="{{ route('upload_training') }}" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="rounded-lg bg-blue-500 w-auto h-16">Upload Training</button>
                <input type="file" name="training" id="training" class="text-base">
            </form>
        </li>
        <li>
            <a href="{{ route('list_files') }}" class="rounded-lg bg-blue-500 w-auto h-16">list_files</a>
        </li>
        <li>
            <form method="POST" action="{{ route('delete_file') }}">
                @csrf
                <button type="submit" class="rounded-lg bg-blue-500 w-auto h-16">Delete File</button>
                <input type="text" name="text" id="text" class="text-base">
            </form>
        </li>
        <li>
            <form method="POST" action="{{ route('download_file') }}">
                @csrf
                <button type="submit" class="rounded-lg bg-blue-500 w-auto h-16">Download File</button>
                <input type="text" name="text" id="text" class="text-base">
            </form>
        </li>
        <li>
            <form method="POST" action="{{ route('create_ft') }}">
                @csrf
                <button type="submit" class="rounded-lg bg-blue-500 w-auto h-16">Download File</button>
                <input type="text" name="training_file" id="training_file" class="text-base" placeholder="training_file" required>
                <input type="text" name="model" id="model" class="text-base" placeholder="model" required>
                <input type="text" name="suffix" id="suffix" class="text-base" placeholder="fine-tuning name" required>
            </form>
        </li>
        <li>
            <a href="{{ route('list_ft') }}" class="rounded-lg bg-blue-500 w-auto h-16">list_ft</a>
        </li>
        <li>
            <form method="POST" action="{{ route('try_ft') }}">
                @csrf
                <button type="submit" class="rounded-lg bg-blue-500 w-auto h-16">Try Fine Tune Model</button>
                <input type="text" name="text" id="text" class="text-base" placeholder="prompt" required>
                <input type="text" name="model" id="model" class="text-base" placeholder="model" required>
            </form>
        </li>
        <li>
            <a href="{{ route('compare_gpt') }}">compare_gpt</a>
        </li>
    </ul>
</div>
@endsection