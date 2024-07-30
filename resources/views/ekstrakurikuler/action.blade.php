<div class="d-flex justify-content-center gap-2 w-100">
    <a class="text-warning" href="{{ route('ekstrakurikuler.edit', $id) }}">
        <i class="fas fa-fw fa-edit"></i>
    </a>
    <form action="{{ route('ekstrakurikuler.destroy', $id) }}" method="POST" onsubmit="return confirm('yakin dihapus?')">
        @csrf
        @method('DELETE')
        <button class="text-danger border-0 p-0">
            <i class="fas fa-fw fa-trash"></i>
        </button>
    </form>
</div>
