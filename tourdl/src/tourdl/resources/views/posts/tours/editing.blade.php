@extends('layouts.master')
@push('plugin-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tours') }}
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
                                    <h5 class="mb-0">Thêm bài viết du lịch</h5>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('posts.tours.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Tiêu đề</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                class="@error('title') is-invalid @enderror" placeholder="" />
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                class="@error('slug') is-invalid @enderror" placeholder="" />
                                            @error('slug')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="times">Lịch trình</label>
                                            <input type="text" class="form-control" id="times" name="times"
                                                class="@error('times') is-invalid @enderror" placeholder="" />
                                            @error('times')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="schedule">Khởi hành</label>
                                            <input type="text" class="form-control" id="schedule" name="schedule"
                                                class="@error('schedule') is-invalid @enderror" placeholder="" />
                                            @error('schedule')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="time_down">Thời gian còn lại</label>
                                            <input type="text" id="time_down" class="form-control" name="time_down"
                                                placeholder="" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="price">Giá</label>
                                            <input type="text" id="price" class="form-control" name="price"
                                                placeholder="" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="discount">Giảm giá</label>
                                            <input type="text" id="discount" class="form-control" name="discount"
                                                placeholder="" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="place">Chỗ trống</label>
                                            <input type="text" id="place" class="form-control" name="place"
                                                placeholder="" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="short_description">Giới thiệu</label>
                                            <input type="text" id="short_description" class="form-control"
                                                name="short_description" placeholder="Mô tả khách sạn" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="description">Mô tả</label>
                                            <input type="text" id="description" class="form-control"
                                                name="description" placeholder="Mô tả khách sạn" />
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="checkbox" id="published"
                                                    value="true" />
                                                <label class="form-check-label" for="inlineCheckbox1">Công khai</label>
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
        </div>
    </x-app-layout>
@endsection
