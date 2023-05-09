@extends('layouts.master')
@push('plugin-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href=""> --}}
@endpush
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Feedback') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Mã bài viết</th>
                                                        <th>Mã người dùng</th>
                                                        <th>Tên người dùng</th>
                                                        <th>Phản hồi</th>
                                                        <th>Chỉnh sửa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($feedbacks as $feedback)
                                                        <tr>
                                                            <th>{{ $feedback->id }}</th>
                                                            <td>{{ $feedback->id }}</td>

                                                            <td><a href={{ '/dashboard/feedback/edit/{id}' }}
                                                                    className='text-bold'>
                                                                    {{ $feedback->user_id }}
                                                                </a></td>
                                                            <td>{{ $feedback->user_name }}</td>
                                                            <td>{{ $feedback->feedback }}</td>

                                                            <td>
                                                                <a href="" action="route('feedback.delete')"
                                                                    className='btn btn-tm mr-5'
                                                                    onClick="return confirm('Bạn có muốn xoá không?')">
                                                                    <i class="fa-solid fa-trash"></i> Xoá
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
