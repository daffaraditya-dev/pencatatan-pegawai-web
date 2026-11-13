// Validasi form sisi klien untuk form create/edit pegawai
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form.validate-js');
    forms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            let valid = true;
            const requiredFields = form.querySelectorAll('[required]');

            requiredFields.forEach(function (field) {
                // Hilangkan styling error sebelumnya
                field.classList.remove('is-invalid');
                const existingError = field.parentNode.querySelector('.invalid-feedback');
                if (existingError) existingError.remove();

                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    const msg = document.createElement('div');
                    msg.className = 'invalid-feedback';
                    msg.textContent = field.placeholder || 'Kolom wajib diisi';
                    field.parentNode.appendChild(msg);
                    valid = false;
                }
            });

            // Validasi format email jika ada field email
            const emailFields = form.querySelectorAll('input[type="email"]');
            emailFields.forEach(function (field) {
                if (field.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value)) {
                    field.classList.add('is-invalid');
                    const msg = document.createElement('div');
                    msg.className = 'invalid-feedback';
                    msg.textContent = 'Format email tidak valid';
                    field.parentNode.appendChild(msg);
                    valid = false;
                }
            });

            if (!valid) {
                e.preventDefault();
            }
        });
    });

    // Hapus pegawai via AJAX (tanpa reload halaman)
    const deleteForms = document.querySelectorAll('form[data-ajax-delete]');
    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            if (!confirm('Yakin ingin menghapus data pegawai ini?')) return;

            const url = form.action;
            const token = form.querySelector('input[name="_token"]').value;

            axios.delete(url, {
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                }
            })
            .then(function (response) {
                // Hapus baris tabel yang terkait
                const row = form.closest('tr');
                if (row) {
                    row.remove();
                }
                // Tampilkan pesan sukses sederhana
                const alert = document.createElement('div');
                alert.className = 'alert alert-success alert-dismissible fade show';
                alert.innerHTML = 'Pegawai berhasil dihapus. ' +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                const container = document.querySelector('.container');
                if (container) container.insertBefore(alert, container.firstChild);
            })
            .catch(function (error) {
                alert('Gagal menghapus pegawai.');
                console.error(error);
            });
        });
    });
});
