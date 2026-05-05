<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('student.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

        </div>
        <label for="nim" class="form-label">Nim</label>
        <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
            value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <a href="{{ route('student.index') }}" class="btn btn-seccess me-1">Cancel</a>
        <button type="sumbit" class="btn btn-primary">Sumbit</button>
    </form>
</x-app>
