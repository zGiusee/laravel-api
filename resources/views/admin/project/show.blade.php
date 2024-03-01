@extends('layouts.admin')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="p-5">
                    {{-- PROJECT PROPERTIES --}}
                    <div class="mb-5 d-flex align-items-center">
                        <h1 class="d-inline-block">{{ $project->name }}</h1>
                        <span class="mx-3">
                            <a class="my-red-btn" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                        </span>
                    </div>

                    <div>
                        {{-- NAME --}}
                        <p class="project-p"> Project name:
                        </p>
                        <p class="project-properties">{{ $project->name }}</p>

                        {{-- ID --}}
                        <p class="project-p"> Project id:
                        </p>
                        <p class="project-properties">
                            {{ $project->id }}
                        </p>
                    </div>

                    <div>
                        {{-- TYPE --}}
                        <p class="project-p"> Project type:
                        </p>
                        @if ($project->type_id == null)
                            <p class="project-properties">
                                Nessun tipo associato.
                            </p>
                        @else
                            <p class="project-properties">
                                {{ $project->type->name }}
                            </p>
                        @endif
                    </div>

                    <div class="mb-3">
                        {{-- TECHNOLOGIES --}}
                        <p class="project-p"> Project Technologies:
                        </p>

                        @forelse ($project->technologies as $tech)
                            <div class="my_badge d-inline-block mx-1 {{ $tech->badge_class }}">
                                {{ $tech->name }}</div>
                        @empty
                            <p class="project-properties">
                                No Technologies used...
                            </p>
                        @endforelse
                    </div>

                    {{-- DESCRIPTION --}}
                    <div>
                        <p class="project-p"> Project description:
                        </p>
                        <p class="project-properties">{{ $project->description }}</p>
                    </div>

                    {{-- REPOSITORY LINK --}}
                    <div>
                        <p class="project-p"> Project repository link:
                        </p>
                        <p class="project-properties">{{ $project->repository_link }}</p>
                    </div>

                    {{-- IMAGE --}}
                    <div>
                        <p class="project-p"> Project img link and img:
                        </p>

                        {{-- IMAGE LINK --}}
                        <p class="project-properties">{{ $project->img }}</p>

                        {{-- CONTROLLI IMAGE --}}
                        @if ($project->img !== null)
                            @if (Str::contains($project->img, 'https'))
                                <img class=" my-5" src="{{ $project->img }}" alt="{{ $project->name }}" width="300">
                            @else
                                <img class=" my-5" src="{{ asset('/storage/' . $project->img) }}"
                                    alt="{{ $project->name }}" width="300">
                            @endif
                        @else
                            <div>
                                No images
                            </div>
                        @endif
                    </div>

                    {{-- SLUG --}}
                    <div>
                        <p class="project-p"> Project slug:
                        </p>
                        <p class="project-properties">{{ $project->slug }}</p>
                    </div>

                    {{-- STARTING AND ENDING DATES --}}
                    <div>
                        <p class="d-inline-block project-p"> Project starting date:
                        </p>
                        <p class="project-properties">
                            {{ $project->date_start }}
                        </p>
                        <p class="project-p">Project ending date:
                        </p>
                        <p class="project-properties">
                            {{ $project->date_end }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- 
<th scope="row">{{ $project->id }}</th>
<td><a>{{ $project->name }}</a></td>
<td>{{ $project->description }}</td>
<td>{{ $project->repository_link }}</td>
<td>{{ $project->date_start }}</td>
<td>{{ $project->date_end }}</td>
<td>{{ $project->img }}</td>
<td>{{ $project->slug }}</td> --}}
