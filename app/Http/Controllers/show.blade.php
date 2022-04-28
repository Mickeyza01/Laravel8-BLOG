@extends('posts.layout')

@section('content')
    
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>บทความ</h2>
        </div>
        <strong>สร้างวันที่ {{ $post->created_at->format('d-m-Y') }} แก้ไขวันที่ {{ $post->updated_at->format('d-m-Y') }}</strong>
    </div>

    <div class="row">
        <div class="card p-3">
            <div class="card-title">
                <strong>หัวข้อ:</strong>
                {{ $post->title }}
            </div>
            <div class="card-title">
                <strong>รายละเอียด:</strong>
                {{ $post->description }}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>รูป</strong>
                <br>
                <img src="/uploads/{{ $post->image }}" width="300px">
            </div>
        </div>
        </div>
    </div>
    <a href="{{ route('posts.index') }}" class="btn btn-primary my-3">ย้อนกลับ</a>
@endsection
