@extends('admin.layouts.main')
@section('container')
    @if (session()->has('checked'))
        <script>
            alert("Check in berhasil.");
        </script>
    @endif
    <div class="row my-3">
        <h3>Cek Tiket</h3>
        <form action="/admin/check" method="get">
            <div class="input-group row my-4">
                <div class="col-lg-3">
                    <input name="search" type="text" class=" form-control" placeholder="Nomor Tiket" aria-label="Nomor Tiket"
                        value="{{ request('search') }}" aria-describedby="button-addon2">
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="submit" id="">Cari</button>
                </div>
            </div>
        </form>
    </div>
    @if (request('search'))
        <div class="card mb-4 col-lg-4">
            <div class="card-body ">
                <h3 class="card-title">No Tiket: {{ $tiket->id }}</h3>
                <p>
                    <small>
                        dipesan pada: {{ $tiket->created_at }}
                    </small>
                </p>
                <table>

                    <tr>
                        <td><strong>Nama Pemesan</strong></td>
                        <td><strong>:</strong> {{ $tiket->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong>No KTP</strong></td>
                        <td><strong>:</strong> {{ $tiket->ktp }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><strong>:</strong> {{ $tiket->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong></td>
                        <td><strong>:</strong> {{ $tiket->checked === 'yes' ? 'Tidak Tersedia' : 'Tersedia' }}</td>
                    </tr>
                </table>
                <form action="/admin/checked?id={{ $tiket->id }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-end">
                        {{-- @method('PUT') --}}
                        <button class="btn btn-primary btn-sm mt-3" type="submit"
                            {{ $tiket->checked === 'yes' ? 'disabled' : '' }}>Check
                            In</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
