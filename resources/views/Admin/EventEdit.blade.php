@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('components.alerts')
                <div class="card mb-3">
                    <img src="https://dummyimage.com/1200x80/000/fff&text=Edit Acara" class="card-img-top" alt="...">
                    <div class="card-body">
                        <form action="{{ route('admin.event.update', ['id'=>$event->id]) }}" method="POST" class="row g-3">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <div class="mb-3 col-md-8">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $event->title) }}" id="title">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="keynote_speaker" class="form-label">Pembicara</label>
                                <input type="text" class="form-control @error('keynote_speaker') is-invalid @enderror" name="keynote_speaker" value="{{ old('keynote_speaker', $event->keynote_speaker) }}" id="keynote_speaker">
                                @error('keynote_speaker')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $event->location) }}" id="location">
                                @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="start" class="form-label">Awal</label>
                                <input type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start', $event->start) }}" id="start">
                                @error('start')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="end" class="form-label">Sampai</label>
                                <input type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end', $event->end) }}" id="end">
                                @error('end')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="date" class="form-label">Pelaksanaan Seminar</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $event->date) }}" id="date">
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary my-4" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection