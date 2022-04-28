@extends('posts.layout')

@section('content')
<br>
<table id="myTable" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>หัวข้อ</th>
                            <th>รายละเอียด</th>
                            <th width="150">วันที่เพิ่มบทความ</th>
                            <th width="150">วันที่แก้ไขบทความ</th>
                            <th width="326">เมนูการใช้งาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                <img src="{{ asset('uploads/blog/'.$item->blog_image) }}" width="100px" alt="Image">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit($item->description, 100) }}</td>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ url('show-blog/' .$item->id) }}" class="btn btn-primary">แสดงข้อมูล</a>
                                    <a href="{{ url('edit-blog/'.$item->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>
                                    <a href="{{ url('delete-blog/'.$item->id) }}" class="btn btn-danger">ลบข้อมูล</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    <script>
        $(document).ready(function () {
            $("#myTable").DataTable();
        });
    </script>

@endsection
