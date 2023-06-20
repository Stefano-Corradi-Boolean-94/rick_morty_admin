
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $char->id }}">
   Elimina
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modal{{ $char->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Confermi l'eliminazione del carattere: "{{ $char->name }}" ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form
                class="d-inline"
                action="{{ route('admin.characters.destroy', $char) }}"
                method="POST"
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Elimina</button>
        </form>
        </div>
      </div>
    </div>
  </div>
