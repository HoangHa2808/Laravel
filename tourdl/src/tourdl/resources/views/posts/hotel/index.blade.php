@extends('layouts.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Hotel') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
                    </ol>
                </nav>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Quản lý bài viết</h6>
                                        <div class="table-responsive">
                                            <table id="dataTableExample" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tiêu đề</th>
                                                        <th>Slug</th>
                                                        <th>Hạng sao</th>
                                                        <th>Discount</th>
                                                        <th>Giới thiệu</th>
                                                        <th>Mô tả</th>
                                                        <th>Trạng thái</th>
                                                        <th>Chỉnh sửa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($hotels as $hotel)
                                                        <tr>
                                                            <td>{{ $hotel->id }}</td>
                                                            <td>{{ $hotel->title }}</td>
                                                            <td>{{ $hotel->slug }}</td>
                                                            <td>{{ $hotel->ratting }}</td>
                                                            <td>{{ $hotel->discount }}</td>
                                                            <td>{{ $hotel->short_description }}</td>
                                                            <td>{{ $hotel->description }}</td>
                                                            <td><a href={{ '/dashboard/posts/hotel' }} className='text-bold'
                                                                    type="submit">
                                                                    <div className='icon ml-5'>
                                                                        {{ $hotel->published ? 'Công khai' : 'Không công khai' }}
                                                                        {{-- <i class="fa-solid fa-check">Xuất bản</i> : <i class="fa-solid fa-xmark">Không xuất bản</i> --}}

                                                                    </div>
                                                                </a></td>
                                                            <td>
                                                                <a href={{ '/dashboard/posts/hotel/create' }}
                                                                    className='btn btn-tm mr-5' type="submit">
                                                                    <i class="fa-solid fa-pencil"></i> Thêm
                                                                </a>
                                                                <a href={{ '/dashboard/posts/hotel/update/{id}' }}
                                                                    className='btn btn-tm mr-5' type="submit">
                                                                    <i class="fa-solid fa-pencil"></i> Cập nhật
                                                                </a>
                                                                <a href="">
                                                                <form method="post" action="{{route('posts.hotel.destroy',$hotel->id)}}"
                                                                    className='btn btn-tm mr-5'
                                                                    onClick="return confirm('Bạn có muốn xoá không?')">
                                                                    @method('delete')
                                                                    @csrf<i class="fa-solid fa-trash"></i>Xoá

                                                                </form>
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

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
