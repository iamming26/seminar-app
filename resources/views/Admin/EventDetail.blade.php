@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card" style="">
                <img src="https://dummyimage.com/400x100/000/fff&text={{ $event->title }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title text-center text-primary">{{ $event->title }}</h3>
                </div>
                <div class="card-body">
                    <h5>Deskripsi:</h5>
                    <p>{!! $event->description !!}</p>
                    <h5 class="mt-2">Pembicara:</h5>
                    <p>{{ $event->keynote_speaker }}</p>
                    <h5 class="mt-2">Periode Pendaftaran:</h5>
                    <p>{{ \Carbon\Carbon::parse($event->start)->format('d-m-Y') }} s.d. {{ \Carbon\Carbon::parse($event->end)->format('d-m-Y') }}</p>
                    <h5 class="mt-2">Pelaksanaan Seminar:</h5>
                    <p>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') ?? '*menyusul' }}</p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.event') }}" class="text-center"><< kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
