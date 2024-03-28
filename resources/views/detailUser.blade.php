@extends('index')
@section ('MainContent')
    <h1>Detail User</h1>
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="nama" id="Nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="Nama_barang" id="Nama_barang" class="form-control" value="{{ $user->Nama_barang }}" readonly>
                </div>
                <div class="form-group">
                    <label for="Harga_barang" class="form-label">Harga Barang</label>
                    <input type="text" name="Harga_barang" id="Harga_barang" class="form-control" value="{{ $user->Harga_barang }}" readonly>
                </div>
                <div class="form-group">
                    <label for="foto" class="form-label">Foto</label>
                    <img src="{{asset('gambar/'.$user->foto)}}" alt="" width="1000px">

                <div class="card-footer">
                    <a href="/master_data" class="btn btn-danger">Kembali</a>
                    <!-- <a href="/master_data/edit/{{$user->id_pelanggan}}" class="btn btn-warning">Edit</a> -->
                </div>
            </form>
        </div>

    </div>
@endsection