<x-app-layout>
    <div class="note-container py-14">
        <a href="{{ route('note.create') }}" class="new-btn-container">New Side Note</a>
        <div class="notes">
            @foreach ($notes as $note)
                <div class="note">
                    <div class="body">
                        {{ Str::words($note->note, 50) }}
                    </div>
                    <div class="note-buttons">
                        <a href="{{ route('note.edit', $note->id) }}" class="new-btn-container">Edit</a>
                        <a href="{{ route('note.show', $note->id) }}" class="new-btn-container">View</a>
                        <form action="{{route('note.destroy',$note)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="note-delete-button">Delete</button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
        {{ $notes->links() }}
    </div>
</x-app-layout>
