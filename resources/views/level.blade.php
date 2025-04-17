<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Level Pengguna</title>

    <!-- jQuery & Validation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
</head>
<body>

    <h1>Data Level Pengguna</h1>

    <!-- ✅ FORM TAMBAH LEVEL -->
    <h3>Tambah Level Baru</h3>
    <form id="formLevel">
        @csrf
        <label>Kode Level:</label><br>
        <input type="text" name="level_kode" required><br><br>

        <label>Nama Level:</label><br>
        <input type="text" name="level_nama" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <div id="alert"></div>

    <hr>

    <!-- ✅ TABEL DATA LEVEL -->
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode Level</th>
            <th>Nama Level</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->level_id }}</td>
            <td>{{ $d->level_kode }}</td>
            <td>{{ $d->level_nama }}</td>
        </tr>
        @endforeach
    </table>

    <!-- ✅ SCRIPT AJAX -->
    <script>
    $(document).ready(function () {
        $('#formLevel').validate({
            rules: {
                level_kode: {
                    required: true,
                    minlength: 2
                },
                level_nama: {
                    required: true,
                    minlength: 3
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: "{{ route('level.store') }}",
                    method: "POST",
                    data: $(form).serialize(),
                    success: function (res) {
                        $('#alert').html('<p style="color: green;">Data berhasil disimpan!</p>');
                        form.reset();
                        setTimeout(() => location.reload(), 1000);
                    },
                    error: function () {
                        $('#alert').html('<p style="color: red;">Gagal menyimpan data.</p>');
                    }
                });
            }
        });
    });
    </script>

</body>
</html>
