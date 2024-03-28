@extends('index')
@section ('MainContent')
    <h1>Ini Edit Data User</h1>
    <div class="card">
        <div class="card-body">
            <form action="/edituser/{{$user->id_pelanggan}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama" id="Nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="Nama_barang" id="Nama_barang" class="form-control" value="{{ $user->Nama_barang }}" required>
                </div>
                <div class="form-group">
                    <label for="Harga_barang" class="form-label">Harga Barang</label>
                    <input type="text" name="Harga_barang" id="Harga_barang" class="form-control" value="{{ $user->Harga_barang }}" required>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto</label>
                    <img src="{{asset('gambar/'.$user->foto)}}" alt="" width="100px">
                    <input type="file" class="form-control" name="foto" id="foto">

                <div class="card-footer">
                    <a href="/master_data" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>

    </div>
@endsection