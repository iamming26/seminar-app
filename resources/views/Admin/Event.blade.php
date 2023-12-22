@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <img src="https://dummyimage.com/1200x80/000/fff&text=Daftar Acara" class="card-img-top" alt="...">
                    <div class="card-body">
                        @include('components.alerts')
                      <div class="row d-flex justify-content-between my-0">
                        <div class="col-6">
                            <h5 class="card-title">
                                {{--  --}}
                            </h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('admin.event.create') }}" class="btn btn-sm btn-primary">Tambah Acara</a>
                        </div>
                      </div>
                      <table class="table table-stripped" id="dataTable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pembicara</th>
                            <th scope="col">Tanggal Pendaftaran</th>
                            <th scope="col">Pelaksanaan Seminar</th>
                            <th scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)                                
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->keynote_speaker }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->start)->format('d-m-Y') }} s.d. {{ \Carbon\Carbon::parse($event->end)->format('d-m-Y') }}</td>
                                <td class="text-primary fw-bold">{{ $event->date ?? '*menyusul' }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form action="{{ route('admin.event.delete', ['id'=>$event->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $event->id }}">
                                            <a type="button" href="{{ route('admin.event.show', ['id'=>$event->id]) }}" class="btn btn-sm btn-success">lihat</a>
                                            <a type="button" href="{{ route('admin.event.edit', ['id'=>$event->id]) }}" class="btn btn-sm btn-warning">edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                        </form>
                                    </div>
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