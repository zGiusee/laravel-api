@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            @include('admin.partials.dashboard_nav')

            {{-- TYPES TABLE --}}
            <div class="col-12">
                <div class="py-3">
                    <table class="table my-table-styles my-mt-80 text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th>Included in N'Projects</th>
                                <th scope="col">Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    {{-- TABLE PROPERTIES --}}
                                    <th scope="row">{{ $type->id }}</th>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->slug }}</td>
                                    <td>{{ count($type->projects) }}
                                    </td>

                                    {{-- TOOLS --}}
                                    <td>

                                        {{-- REDIRECT TO DETAIL PAGE --}}
                                        <a href="{{ route('admin.types.show', ['type' => $type->slug]) }}">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>

                                        {{-- REDIRECT TO MODIFY PAGE --}}
                                        <a href="{{ route('admin.types.edit', ['type' => $type->slug]) }}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>

                                        {{-- REDIRECT TO DELETE MODAL --}}
                                        <button class="my_delete_button" data-bs-toggle="modal"
                                            data-bs-target="#delete_type_modal" type="button"
                                            data-slug="{{ $type->slug }}" data-name="{{ $type->name }}"
                                            data-type="types">
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
        @include('admin..type.partials.delete_type_modal')
    </div>
@endsection
