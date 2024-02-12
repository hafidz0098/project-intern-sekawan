@extends('dashboard.layouts.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Pemesanan</h1>
</div>
<div class="row">
    <div class="col-lg-8">
        @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                </div>
        @endif
        <form method="POST" action="/dashboard/order/{{ $order->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kendaraan" class="form-label">Kendaraan</label>
                <select class="custom-select" name="kendaraan">
                    @foreach ($kendaraans as $kendaraan)
                        <option value="{{ $kendaraan->id }}" {{ old('kendaraan', $order->kendaraan_id) == $kendaraan->id ? 'selected' : '' }}>
                            {{ $kendaraan->merk }} - {{ $kendaraan->jenis }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="driver" class="form-label">Driver</label>
                <select class="custom-select" name="driver">
                    @foreach ($drivers as $driver)
                        <option value="{{ $driver->id }}" {{ old('driver', $order->driver_id) == $driver->id ? 'selected' : '' }}>
                            {{ $driver->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="approver" class="form-label">Approver</label>
                <select class="custom-select" name="approver">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('approver', $order->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
</div>
@endsection
