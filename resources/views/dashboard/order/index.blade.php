@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="h3">Pemesanan Kendaraan</h3>
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
              <a href="/dashboard/order/create" class="btn btn-primary mb-3">Tambah Pemesanan Baru</a>
              <a href="/dashboard/order/create" class="btn btn-success mb-3">Export ke Excel</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Driver</th>
                                <th>Kendaraan</th>
                                <th>status</th>
                                <th>Waktu Pemesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->driver }}</td>
                                <td>{{ $order->kendaraan }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td align="center">
                                    {{-- <a href="/dashboard/order/{{ $order->id }}/edit" class=" btn btn-sm btn-warning btn-bordred"><i class="fa fa-edit" title="Edit"></i></a> --}}
                                    <form action="/dashboard/order/{{ $order->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                      <button class="btn btn-sm btn-danger btn-bordred" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" title="Delete"></i></button>
                                    </form>
                                </td>  
                            </tr>  
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection