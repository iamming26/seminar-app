@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('components.alerts')
                <div class="card mb-3">
                    <img src="https://dummyimage.com/1200x80/000/fff&text=Detail Dashboard" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between my-0">
                            <div class="col-6">
                                <h5 class="card-title">
                                    Acara
                                </h5>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('admin.dashboard') }}" class=""><< kembali</a>
                            </div>
                      <div class="card-body border border-2 border-primary p-1 mb-3">
                        <h3 class="text-center">{{ $event->title }} - {{ $event->keynote_speaker }} - {{ $event->date }}</h3>
                      </div>
                      <table class="table table-stripped" id="dataTable">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Waktu Mendaftar</th>
                            <th scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)                                
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin.dashboard.delete', ['id'=>$student->student_id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="event_id" value="{{ $student->event_id }}">
                                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                    </form>
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