@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">

            {{-- PROJECTS CREATION FORM --}}
            <div class="col-12">
                <div class="my-3">
                    <form class="my-form" enctype="multipart/form-data"
                        action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="container">
                            <div class="row">

                                {{-- PROJECT NAME --}}
                                <div class="col-12 my-3 ">
                                    <label for="name">Project name:</label>
                                    <input required max="150" type="text" name="name" id="name"
                                        placeholder="Name" value="{{ $project->name }}">
                                    @error('name')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- PROJECT TYPE --}}
                                <div class="col-12 my-3">
                                    <label for="type_id">Type:</label>
                                    <select name="type_id" id="type_id">

                                        <option value="" selected> Seleziona un tipo</option>

                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" @selected($type->id == old('type_id', $project->type ? $project->type->id : ''))>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                {{-- PROJECT TECNOLOGIES --}}
                                <div class="col-12 my-3 checkbox">
                                    <label for="">Technologies:</label>

                                    @foreach ($technologies as $tech)
                                        <input type="checkbox" name="technology[]" id="technology-{{ $tech->id }}"
                                            value="{{ $tech->id }}"
                                            {{ $project->technologies->contains($tech->id) ? 'checked' : '' }}>
                                        <div for=""
                                            class="badge_container {{ $tech->badge_class }} my_badge text-white">
                                            {{ $tech->name }}</div>
                                    @endforeach
                                </div>

                                {{-- REPOSITORY LINK --}}
                                <div class="col-12 my-3">
                                    <label for="repository_link">Repository link:</label>
                                    <input required type="text" name="repository_link" id="repository_link"
                                        placeholder="Repository link" value="{{ $project->repository_link }}">
                                    @error('repository_link')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- PROJECT IMAGE LINK --}}
                                <div class="col-12 my-3">
                                    <label for="img">Project image link and img:</label>
                                    <input accept="image/*" type="file" name="img" id="img"
                                        placeholder="Image link" value="{{ $project->img }}">
                                    <img class=" my-5" src="{{ asset('/storage/' . $project->img) }}" alt=""
                                        width="300">
                                    @error('img')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- PROJECT DESCRIPTION --}}
                                <div class="col-6 my-3">
                                    <label for="description">Project Description:</label>
                                    <textarea required name="description" id="description" cols="60" rows="10">{{ $project->description }}</textarea>
                                    @error('description')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                </div>


                                {{-- DATES --}}
                                <div class="col-3 my-3">

                                    {{-- STARTING DATE --}}
                                    <div class="mb-3">
                                        <label for="date_start">Starting date:</label>
                                        <input required type="date" name="date_start" id="date_start"
                                            value="{{ $project->date_start }}">
                                        @error('date_start')
                                            <div class="my-error-msg">WARNING: {{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ENDING DATE --}}
                                    <div>
                                        <label for="date_end">Ending date:</label>
                                        <input type="date" name="date_end" id="date_end"
                                            value="{{ $project->date_end }}">
                                    </div>
                                </div>

                                <div class="col-12 my-3">
                                    <button class="my-red-btn" type="submit">Save</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
