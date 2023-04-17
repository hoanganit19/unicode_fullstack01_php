# MVC

/app => Chứa controllers, models, views => Chứa code của ứng dụng

/core => Lõi của ứng dụng

Hàm thuần => Helpers

@foreach ($users as $user) => <?php foreach ($users as $user): ?>

@endforeach => <?php endforeach; ?>

@if () => <?php if (): ?>

@else => <?php else: ?>

@endif => <?php endif; ?>

@for()
@endfor

@while()

@endwhile

## Master Layout

home/index.php => View

@extends ('layouts/client')

@section('content')

<h1>Nội dung </h1>

@endsection
