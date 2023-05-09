@extends('layouts.master')
@push('plugin-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Category') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    {{-- form --}}
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-12">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Thêm danh mục</h5>
                                </div>
            
                                <div class="card-body">
                                    <form method="POST" action="{{ route('category.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Tên danh mục</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                class="@error('name') is-invalid @enderror" placeholder="Tin tức" />
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                class="@error('slug') is-invalid @enderror" placeholder="tin-tuc" />
                                            @error('slug')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="description">Mô tả</label>
                                            <input type="text" id="description" class="form-control" name="description"
                                                placeholder="Mô tả danh mục" />
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="checkbox" id="show_on_menu"
                                                    value="true" />
                                                <label class="form-check-label" for="inlineCheckbox1">Xuất bản</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        {{-- <button type="submit" class="btn btn-primary">Cancel</button> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>
@endsection
