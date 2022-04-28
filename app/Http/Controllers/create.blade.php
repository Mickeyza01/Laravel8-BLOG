@extends('posts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br>
            <h2>เพิ่มบทความ</h2>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
@csrf
        <div class="row">
            <div class="col-md-12">
                <div class="from-group">
                    <strong>หัวข้อ:</strong>
                    <input type="text" name="title" class="form-control" placeholder="กรอกหัวข้อ">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>รายละเอียด:</strong>
                    <textarea class="form-control" style="height: 150px" name="description"  placeholder="กรอกรายละเอียด"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>รูปภาพ:</strong>
                    <input type="file" name="image" class="form-control" placeholder="เลือกรูปภาพ">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success my-3">ยืนยัน</button>
            </div>
        </div>
    </form>
@endsection

