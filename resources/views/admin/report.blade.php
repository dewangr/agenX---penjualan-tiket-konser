@extends('admin.layouts.main')
@section('container')
    <div class="my-4">
        <h5>Report Keluar - Masuk Tiket</h5>
        <div class="row mt-4">
            <div class="col-lg-5 mx-2">
                <h6>Unchecked</h6>
                <table class="table table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Nomor Tiket</th>
                        <th>Nama Pemesan</th>
                        <th>Email</th>

                    </tr>
                    @foreach ($uncheck as $un)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $un->number }}</td>
                            <td>{{ $un->nama }}</td>
                            <td>{{ $un->email }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {{ $uncheck->links() }}
                </div>
            </div>
            <div class="col-lg-6 ms-3">
                <h6>Checked</h6>
                <table class="table table-success">
                    <tr>
                        <th>#</th>
                        <th>Nomor Tiket</th>
                        <th>Nama Pemesan</th>
                        <th>Email</th>

                    </tr>
                    @foreach ($checked as $cek)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cek->number }}</td>
                            <td>{{ $cek->nama }}</td>
                            <td>{{ $cek->email }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {{ $checked->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
