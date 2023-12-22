@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('components.alerts')
                <div class="card mb-3">
                    <img src="https://dummyimage.com/1200x80/000/fff&text=Dashboard Admin" class="card-img-top" alt="...">
                    <div class="card-body">
                      <table class="table table-stripped" id="dataTable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pembicara</th>
                            <th scope="col">Pelaksanaan Seminar</th>
                            <th scope="col">Jumlah Pendaftar</th>
                            <th scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)                                
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->keynote_speaker }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->total }}</td>
                                <td>
                                    <a href="{{ route('admin.dashboard.detail', ['id'=>$event->id]) }}" class="btn btn-sm btn-success">lihat pendaftar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection