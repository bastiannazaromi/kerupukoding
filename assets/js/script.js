let flash_success = $('.flash-sukses').data('flashdata');
let flash_error = $('.flash-error').data('flashdata');

if (flash_success) {
    Swal.fire({
        title: 'Sukses',
        text: flash_success,
        icon: 'success'
    });
}

if (flash_error) {
    Swal.fire({
        title: 'Sorry !!',
        text: flash_error,
        icon: 'warning'
    });
}

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();

    let href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Data karyawan akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus !'
    }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
    })
});