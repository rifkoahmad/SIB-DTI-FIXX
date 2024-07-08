<!-- delete.blade.php -->
<div class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="modalDeleteLabel">Delete Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategoriberita.destroy', $item->id) }}" id="formDelete" method="POST">
                    @csrf
                    @method('delete')
                    <div class="mb-3">
                        <p id="modalDeleteText">Apa Kamu Ingin Menghapus Kategori ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalDelete = document.getElementById('modalDelete');
        modalDelete.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nama = button.getAttribute('data-nama');

            var form = document.getElementById('formDelete');
            form.action = '/kategoriberita/' + id;

            var modalText = document.getElementById('modalDeleteText');
            modalText.textContent = 'Apa Kamu Ingin Menghapus Kategori ' + nama + '?';
        });
    });
</script>
