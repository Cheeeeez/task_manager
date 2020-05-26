<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<a href="{{route('customers.create')}}">Thêm</a>
<table border="1">
    <thead>
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $index => $customer)
        <tr>
            <td>{{++$index}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->email}}</td>
            <td>
                <a href="#">Sửa</a> | <a href="#">Xóa</a&
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
