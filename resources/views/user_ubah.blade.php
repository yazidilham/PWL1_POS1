<body>
    <h1>Form Tambah Data User</h1>
    <a href="{{ route('/user') }}">Kembali</a>
    <form method="post" action="{{ route('/user/tambah_simpan') }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <label>Username</label>
        <input type="text" name="username" value="{{ $data->username}}">
        <br>
        
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $data->nama}}">
        <br>
        
        <label>Level ID</label>
        <input type="number" name="level_id" value="{{ $data->level_id }}">
        <br>
        
        <input type="submit" class="btn btn-success" value="ubah">
    </form>
</body>
