@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">

            {{-- PROJECTS CREATION FORM --}}
            <div class="col-12">
                <div class="my-3">
                    <form class="my-form" action="{{ route('admin.projects.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="container">
                            <div class="row">

                                {{-- PROJECT NAME --}}
                                <div class="col-12 my-3 ">
                                    <label for="name">Project name:</label>
                                    <input required max="150" type="text" name="name" id="name"
                                        placeholder="Name" value="{{ old('name') }}">
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
                                            <option value="{{ $type->id }}" @selected($type->id == old('type_id'))>
                                                {{ $type->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                {{-- PROJECT TECNOLOGIES --}}
                                <div class="col-12 my-3 checkbox">
                                    <label for="">Technologies:</label>
                                    @foreach ($technologies as $tech)
                                        <input type="checkbox" name="technology[]" id="technology-{{ $tech->id }}"
                                            value="{{ $tech->id }}" @checked(is_array(old('technology')) && in_array($tech->id, old('technology')))>
                                        <div for=""
                                            class="badge_container {{ $tech->badge_class }} my_badge text-white">
                                            {{ $tech->name }}</div>
                                    @endforeach

                                </div>

                                {{-- REPOSITORY LINK --}}
                                <div class="col-12 my-3">
                                    <label for="repository_link">Repository link:</label>
                                    <input required type="text" name="repository_link" id="repository_link"
                                        placeholder="Repository link" value="{{ old('repository_link') }}">
                                    @error('repository_link')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- PROJECT IMAGE LINK --}}
                                <div class="col-12 my-3">
                                    <label for="img">Project image link:</label>
                                    <input type="file" accept="image/*" name="img" id="img"
                                        placeholder="Image link" value="{{ old('img') }}">
                                    @error('img')
                                        <div class="my-error-msg">WARNING: {{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- PROJECT DESCRIPTION --}}
                                <div class="col-6 my-3">
                                    <label for="description">Project Description:</label>
                                    <textarea required name="description" id="description" cols="60" rows="10">{{ old('description') }}</textarea>
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
                                            value="{{ old('date_start') }}">
                                        @error('date_start')
                                            <div class="my-error-msg">WARNING: {{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ENDING DATE --}}
                                    <div>
                                        <label for="date_end">Ending date:</label>
                                        <input type="date" name="date_end" id="date_end" value="{{ old('date_end') }}">
                                    </div>
                                </div>

                                <div class="col-12 my-3">
                                    <button class="my-red-btn" type="submit">Create</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
