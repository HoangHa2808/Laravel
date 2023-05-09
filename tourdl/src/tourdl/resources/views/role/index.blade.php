@php
$title = "Quản Lý Role";
@endphp
@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <form method="post" action="{{ route('role.create') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Role Name: </label>
                <input type="number" name="id" >
                <input type="text" name="name" class="form-control" placeholder="Enter name" >
            </div>
            <div class="form-group">
                <button class="btn btn-success">Save Data</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <table class="table mb-0 table-hover align-middle text-nowrap">
            <thead>
                <tr>
                    <th class="border-top-0">No</th>
                    <th class="border-top-0">Role Name</th>
                    <th class="border-top-0" style="width: 100px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('role.index') }}?id={{ $role->id }}"><button class="btn btn-warning">Edit</button></a>
                            <button class="btn btn-danger" onclick="deleteItem({{ $role->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    function deleteItem(id) {
        var option = confirm('Are you sure to delete this item')
        if(!option) return

        $.post('{{ route('role.destroy') }}', {
            '_token': '{{ csrf_token() }}',
            'id': id
        }, function(data) {
            location.reload()
        })
    }
</script>
@stop
