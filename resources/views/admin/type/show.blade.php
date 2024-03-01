@extends('layouts.admin')

@section('content')
    <div>
        <div class="row m-5">
            <div>
                <div class="col-12 mb-5">
                    <h1>Type name: {{ $type->name }}</h1>
                </div>
            </div>

            <h4 class="m-3">Associated projects:</h4>
            @forelse ($type->projects as $project)
                <div class="col-2 m-3">
                    <div class="card" style="width: 18rem;">

                        {{-- Controlli per le immagini --}}
                        @if ($project->img !== null)
                            @if (Str::contains($project->img, 'https'))
                                <img class="card-img-top" src="{{ $project->img }}" alt="{{ $project->name }}">
                            @else
                                <img class=" card-img-top" src="{{ asset('/storage/' . $project->img) }}"
                                    alt="{{ $project->name }}">
                            @endif
                        @else
                            <div class="p-3">
                                No images
                            </div>
                        @endif

                        {{-- CARD BODY --}}
                        <div class="card-body">
                            {{-- NAME --}}
                            <h5 class="card-title">{{ $project->name }}</h5>

                            {{-- DESCRIPTION --}}
                            <p class="card-text">{{ $project->description }}</p>

                            {{-- REDIRECT TO PROJECT DETAIL PAGE --}}
                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                class="btn btn-primary">Go at the project</a>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    Nessun tipo di progetto associato.
                </div>
            @endforelse
        </div>
    </div>
@endsection
