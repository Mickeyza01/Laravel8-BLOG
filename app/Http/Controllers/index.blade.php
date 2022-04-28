@extends('posts.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">

<tr>
    <th>ลำดับ</th>
    <th>รูปภาพ</th>
    <th>หัวข้อ</th>
    <th>รายละเอียด</th>
    <th width="150">วันที่เพิ่มบทความ</th>
    <th width="150">วันที่แก้ไขบทความ</th>
    <th width="326">เมนูการใช้งาน</th>
</tr>

@foreach ($data as $key =>$value)
    <tr>
        <td>{{ ++$i }} </td>
        <td><img src="/uploads/{{ $value->image }}" width="100px"></td>
        <td>{{ $value->title }}</td>
        <td>{{ Str::limit($value->description, 100) }}</td>
        <td>{{ $value->created_at->format('d-m-Y') }}</td>
        <td>{{ $value->updated_at->format('d-m-Y') }}</td>
        <td>
            <form action="{{ route('posts.destroy',  $value->id) }}" method="post">
            <a href="{{ route('posts.show', $value->id) }}" class="btn btn-primary">แสดงข้อมูล</a>
            <a href="{{ route('posts.edit', $value->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>
            @csrf
            <a href="{{url('delete-post/' .$value->id) }}" class="btn btn-danger">ลบข้อมูล</a>
        </form>
        </td>
    </tr>

@endforeach

</table>

    
    {!! $data->links() !!}
@endsection

