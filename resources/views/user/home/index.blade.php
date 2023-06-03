@extends('user.layoutUser')

@section('content')
<div>
    <h1>Trang chủ user</h1>

    @include('notification.toastr')

    @foreach ($products as $item)
    {{ $item->name }} <br>
    @endforeach
    <h3>Loại</h3>
    @foreach ($services as $item)
    {{ $item->name }} <br>
    @endforeach

</div>
@endsection