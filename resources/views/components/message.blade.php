<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    // JavaScript para mostrar la alerta de éxito
    Swal.fire(
        'Éxito',
        '{{ session('success') }}',
        'success'
    );
</script>
@endif

<script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $('.btn-eliminar').on('click', function (e) {
        e.preventDefault();
        const deleteForm = $(this).closest('form');

        Swal.fire({
            title: '¿Estás seguro?',
            text: '¡Eliminará definitivamente este registro!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteForm.submit();
            } else {
                Swal.fire('Eliminación cancelada', '', 'info');
            }
        });
    });

</script>


{{-- $(document).ready(function () {
    $('#miTabla').DataTable();
}); --}}
