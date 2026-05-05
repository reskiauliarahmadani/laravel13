<x-app>

    <x-slot:title>
        {{ $title ?? 'Data Student' }}
    </x-slot>

    <a href="{{ route('student.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    <ul class="list-group">
        @forelse ($students as $student)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                {{ $loop->iteration }}. {{ $student->nim }} - {{ $student->name }}

                <div>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                            Delete
                        </button>
                    </form>
                </div>

            </li>
        @empty
            <li class="list-group-item text-center">
                Tidak ada data
            </li>
        @endforelse
    </ul>

</x-app>
