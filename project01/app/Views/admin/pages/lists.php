@extends('layouts/admin.master')
@section('content')

<div class="py-3">
    <h1>{{$pageTitle}}</h1>
    {{message($msg)}}
    <p><a href="{{route('admin.pages.add')}}" class="btn btn-primary">Thêm</a></p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">
                    <input type="checkbox" />
                </th>
                <th>Tiêu đề</th>
                <th>Link</th>
                <th width="15%">Thời gian</th>
                <th width="15%">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if ($pages)
            @foreach ($pages as $page)
            <tr>
                <td>
                    <input type="checkbox" class="check-item" value="{{$page['id']}}" />
                </td>
                <td>{{$page['title']}}</td>
                <td>
                    <a target="_blank" href="{{route('client.page', ['slug' => $page['slug']])}}"
                        class="badge bg-success text-white" href="#">
                        Link
                    </a>
                </td>
                <td>
                    {{
                        Carbon::parse($page['created_at'])->format('d/m/Y H:i:s')
                    }}
                </td>
                <td>
                    <a href="{{route('admin.pages.edit', ['id' => $page['id']])}}" class="btn btn-warning">Sửa</a>
                    <a href="{{route('admin.pages.delete', ['id' => $page['id']])}}"
                        class="btn btn-danger delete-action">Xóa</a>
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