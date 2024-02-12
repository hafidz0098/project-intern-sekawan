@extends('dashboard.layouts.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Pemesanan Baru</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                </div>
        @endif
        <form method="POST" action="/dashboard/order">
            @csrf
            <div class="mb-3">
                <label for="kendaraan" class="form-label">Kendaraan</label>
                <select class="custom-select" name="kendaraan">
                    @foreach ($kendaraans as $kendaraan)
                    @if (old('kendaraan_id') == $kendaraan->id)
                        <option value="{{ $kendaraan->merk }}" selected>{{ $kendaraan->merk }} - {{ $kendaraan->jenis }}</option>
                    @else
                        <option value="{{ $kendaraan->merk }}">{{ $kendaraan->merk }} - {{ $kendaraan->jenis }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="driver" class="form-label">Driver</label>
                <select class="custom-select" name="driver">
                    @foreach ($drivers as $driver)
                    @if (old('driver_id') == $driver->id)
                        <option value="{{ $driver->name }}" selected>{{ $driver->name }}</option>
                    @else
                        <option value="{{ $driver->name }}">{{ $driver->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="approver" class="form-label">Approver</label>
                <select class="custom-select" name="approver">
                    @foreach ($users as $user)
                    @if (old('user_id') == $user->id)
                        <option value="{{ $user->name }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</div>
@endsection