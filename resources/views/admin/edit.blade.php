@extends('admin.layouts.main')
@section('container')
    <div class="row my-3">
        <h3 class="my-2 mb-4">Edit Detail Pesanan</h3>
        <div class="ms-3 col-5">
            <form action="/admin/{{ $ticket->id }}/update" method="post">
                @csrf
                <div class="mb-1 row">
                    <label for="id" class="col-sm-4 col-form-label" name="id"> Nomor Tiket</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" id="id" value="{{ $ticket->id }}">
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="created_at" class="col-sm-4 col-form-label" name="created_at"> Tanggal Pesan</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" id="created_at"
                            value="{{ $ticket->created_at }}">
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama Pemesan</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" id="nama"
                            @error('nama') is-invalid
                        @enderror
                            value="{{ old('nama', $ticket->nama) }}">
                    </div>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-1 row">
                    <label for="ktp" class="col-sm-4 col-form-label">No KTP</label>
                    <div class="col-sm-8">
                        <input type="text" name="ktp" class="form-control"
                            @error('ktp')
                            is-invalid
                        @enderror
                            id="ktp" value="{{ old('ktp', $ticket->ktp) }}">
                    </div>
                    @error('ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-1 row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control"
                            @error('email') is-invalid
                        @enderror id="email"
                            value="{{ old('email', $ticket->email) }}">
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-1 row">
                    <label for="checked" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="checked" name="checked"
                            value="{{ $ticket->checked === 'yes' ? 'Tidak Tersedia' : 'Tersedia' }}">
                    </div>
                </div>
                @method('put')
                <div class="d-flex justify-content-end mt-2 ">
                    <a href="/admin" class="btn btn-sm btn-warning px-3  py-1">Cancel</a>
                    <button class="btn btn-primary btn-sm px-3 py-1 ms-2" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
