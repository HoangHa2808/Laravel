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
                {{ __('Category') }}
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
                                                        <th>Tên danh mục</th>
                                                        <th>Slug</th>
                                                        <th>Mô tả</th>
                                                        <th>Trạng thái</th>
                                                        <th>Chỉnh sửa</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $count = 1;
                                                @endphp

                                                <tbody>
                                                    @foreach ($categories as $cat)
                                                        <tr>
                                                            <th>{{$cat->id}}</th>
                                                            <td><a href={{ '/dashboard/category/edit/{id}' }}
                                                                    className='text-bold'>
                                                                    {{ $cat->name }}
                                                                </a></td>
                                                            <td>{{ $cat->slug }}</td>
                                                            <td>{{ $cat->description }}</td>
                                                            {{-- <td>{{$cat->show_on_menu== true ? 'Xuất bản' : 'Không xuất bản'}}</td> --}}
                                                            <td><a href={{ '/dashboard/category/' }} className='text-bold'
                                                                    type="submit">
                                                                    <div className='icon ml-5'>
                                                                        {{ $cat->show_on_menu ? 'Xuất bản' : 'Không xuất bản' }}
                                                                        {{-- <i class="fa-solid fa-check">Xuất bản</i> : <i class="fa-solid fa-xmark">Không xuất bản</i> --}}

                                                                    </div>
                                                                </a></td>
                                                            <td>
                                                                <a href={{ '/dashboard/category/create' }}
                                                                    className='btn btn-tm mr-5' type="submit">
                                                                    <i class="fa-solid fa-pencil"></i> Thêm
                                                                </a>
                                                                <a href={{ '/dashboard/category/update/{id}' }}
                                                                    className='btn btn-tm mr-5' type="submit">
                                                                    <i class="fa-solid fa-pencil"></i> Cập nhật
                                                                </a>
                                                                <a href="" action="route('category.delete')"
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
