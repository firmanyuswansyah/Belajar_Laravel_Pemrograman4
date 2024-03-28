@extends('index')
@section ('MainContent')
    <div class="card">
        <div class="card-header"><h1>Tambah Data</h1></div>
        <div class="card-body">
            <form action="/kirimuser" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" id="Nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="Nama_barang" id="Nama_barang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Harga_barang" class="form-label">Harga Barang</label>
                    <input type="text" name="Harga_barang" id="kelas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" name="foto" class="form-control">
`</div>
                
                <div class="card-footer">
                    <a href="/master_data" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>

    </div>
@endsection