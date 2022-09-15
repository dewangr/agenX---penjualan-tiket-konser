@extends('layouts.main')

@section('container')
    <div class="col-lg-6 shadow mx-auto my-5 p-3 border-rounded">
        <div class="row text-center">
            <h4>Lengkapi Data Diri Pemesan</h4>
        </div>
        <div class="row mt-3">
            <form action="{{ route('tickets.store') }}" method="POST">
                @csrf
                {{-- <div class="form-floating mb-2">
                    <input type="hidden" class=" hidden form-control" id="tiket" placeholder="tiket">
                </div> --}}
                <div class="form-floating mb-2">
                    <input required type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                    <label for="nama">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-2">
                    <input required type="text" class="form-control" id="ktp" name="ktp" placeholder="KTP">
                    <label for="ktp">No KTP</label>
                </div>
                <div class="form-floating mb-2">
                    <input required type="email" class="form-control" id="email" name="email"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

                <button class="btn btn-primary" type="submit">Pesan</button>
            </form>
        </div>
    </div>
@endsection
