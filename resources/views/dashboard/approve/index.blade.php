@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Approve Pemesanan Kendaraan</h3>
    </div>
    @if (session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
    @endif
      <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pemesanan Kendaraan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Driver</th>
                                <th>Kendaraan</th>
                                <th>Waktu Pemesanan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->driver }}</td>
                                <td>{{ $order->kendaraan }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <form method="post" action="/dashboard/approve/{{ $order->id }}">
                                      @method('put')
                                      @csrf
                                      <select class="custom-select" name="status">
                                            <option value="{{ $order->status }}">{{ $order->status }}</option>
                                            <option value="First Approval">first approval</option>
                                      </select>
                                  </td>  
                                  <td>
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?')">Update</button>
                                  </td>
                            </tr>  
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection