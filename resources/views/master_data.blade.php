@extends('index')

@section('MainContent')
    <h1>Ini Halaman Master Data</h1>
    <a href="/tambahuser" class="btn btn-success">+ Tambah Data</a><br></br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->id_pelanggan }}</td>
                    <td>{{ $item->Nama_barang }}</td>
                    <td>{{ $item->Harga_barang }}</td>
                    <td><img src="{{asset('gambar/'.$item->foto)}}" alt="" width="50px"></td>
                    <td>
                      <a href="/user/detail/{{$item->id_pelanggan}}" class="btn btn-primary">Lihat</a>
                      <a href="/user/edit/{{$item->id_pelanggan}}" class="btn btn-warning">Edit</a>
                      <form action="/user/delete/{{$item->id_pelanggan}}" method="post"  class="d-inline">
                        @csrf
                        @method('delete')
                        <button action="submit" class="btn btn-danger">Delete</button>
                    </form>
                      {{-- <a href="/user/delete{{$item->id_pelanggan}}" class="btn btn-danger">Delete</a> --}}

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection