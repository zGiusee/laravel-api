@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            @include('admin.partials.dashboard_nav')

            {{-- PROJECTS TABLE --}}
            <div class="col-12">
                <div class="py-3">
                    <table class="table my-table-styles my-mt-80">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ending Date</th>
                                <th scope="col">Type</th>
                                <th class="tech-th" scope="col">Technologies</th>
                                {{-- <th scope="col">Slug</th> --}}
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    {{-- TABLE PROPERTIES --}}
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ Str::limit($project->repository_link, 30, '...') }}</td>
                                    <td>{{ $project->date_start }}</td>
                                    <td>{{ $project->date_end }}</td>
                                    <td>{{ $project->type != null ? $project->type->name : 'Nessun tipo associato' }}</td>
                                    <td>
                                        @forelse ($project->technologies as $tech)
                                            <div class="my_badge m-1 d-inline-block {{ $tech->badge_class }}">
                                                {{ $tech->name }}</div>
                                        @empty
                                            No Technologies used...
                                        @endforelse
                                    </td>

                                    {{-- TOOLS --}}
                                    <td>
                                        {{-- REDIRECT TO DETAIL PAGE --}}
                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>

                                        {{-- REDIRECT TO MODIFY PAGE --}}
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>

                                        {{-- DELETE BUTTON
                                        <form class="d-inline-block"
                                            action="{{ route('admin.projects.destroy', ['project' => $project['slug']]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="my_delete_button" type="submit">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form> --}}
                                        <button class="my_delete_button" data-bs-toggle="modal"
                                            data-bs-target="#delete_modal" type="button" data-slug="{{ $project->slug }}"
                                            data-name="{{ $project->name }}" data-type="projects">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('admin.partials.delete_modal')
    </div>
@endsection
