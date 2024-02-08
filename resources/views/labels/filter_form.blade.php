@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Label Filter Form</h1>
        <form action="{{ route('labels.generate') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="page_size" class="block text-gray-700 text-sm font-bold mb-2">Page Size:</label>
                <select name="page_size" id="page_size" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{ old('page_size') }}">
                    <option value="A4" {{ old('page_size') == 'A4' ? 'selected' : '' }}>A4</option>
                    <option value="Letter" {{ old('page_size') == 'Letter' ? 'selected' : '' }}>Letter</option>
                </select>
                @error('page_size')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="labels_width" class="block text-gray-700 text-sm font-bold mb-2">Labels Width:</label>
                <input type="number" name="labels_width" id="labels_width" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('labels_width') }}">
                @error('labels_width')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="labels_height" class="block text-gray-700 text-sm font-bold mb-2">Labels Height:</label>
                <input type="number" name="labels_height" id="labels_height" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('labels_height') }}">
                @error('labels_height')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="orientation" class="block text-gray-700 text-sm font-bold mb-2">Orientation:</label>
                <select name="orientation" id="orientation" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{ old('orientation') }}">
                    <option value="Portrait" {{ old('orientation') == 'Portrait' ? 'selected' : '' }}>Portrait</option>
                    <option value="Landscape" {{ old('orientation') == 'Landscape' ? 'selected' : '' }}>Landscape</option>
                </select>
                @error('orientation')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="apply_range" id="apply_range" class="form-checkbox" {{ old('apply_range') ? 'checked' : '' }}>
                <label for="apply_range" class="inline-flex items-center ml-2">Apply Range</label>
                @error('apply_range')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center space-x-2">
                <div>
                    <label for="start_position" class="block text-gray-700 text-sm font-bold mb-2">Start Position:</label>
                    <input type="number" name="start_position" id="start_position" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="1" value="{{ old('start_position') }}">
                    @error('start_position')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="end_position" class="block text-gray-700 text-sm font-bold mb-2">End Position:</label>
                    <input type="number" name="end_position" id="end_position" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="5" value="{{ old('end_position') }}">
                    @error('end_position')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Generate PDF</button>
            </div>
        </form>
    </div>
</div>
@endsection
