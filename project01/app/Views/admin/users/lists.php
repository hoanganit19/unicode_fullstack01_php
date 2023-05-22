@extends('layouts/admin.master')
@section('content')

<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <p><a href="{{route('admin.users.add')}}" class="btn btn-primary">Thêm</a></p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">
                    <input type="checkbox" />
                </th>
                <th>Tên</th>
                <th>Email</th>
                <th>Trạng thái</th>
                <th width="15%">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)
            @foreach ($users as $user)
            <tr>
                <td>
                    @if (Auth::user()->id != $user['id'])
                    <input type="checkbox" class="check-item" value="{{$user['id']}}" />
                    @endif
                </td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{!!$user['status'] == 1 ? '<span class="badge bg-success">Kích hoạt</span>': '<span
                        class="badge bg-danger">Chưa
                        kích hoạt</span>'!!}
                </td>
                <td>
                    <a href="{{route('admin.users.edit', ['id' => $user['id']])}}" class="btn btn-warning">Sửa</a>
                    @if (Auth::user()->id != $user['id'])

                    <a href="{{route('admin.users.delete', ['id' => $user['id']])}}"
                        class="btn btn-danger delete-action">Xóa</a>

                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    @include('admin/includes/delete_form')
    <div class="row">
        <div class="col-6">
            @include('admin/includes/deletes')
        </div>
        <div class="col-6">
            @include('admin/includes/pagination', ['align' => 'end'])
        </div>
    </div>
</div>
@endsection