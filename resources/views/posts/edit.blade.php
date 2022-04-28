@extends('posts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    
                    <h4>แก้ไขบทความ
                        <a href="{{ url('blog') }}" class="btn btn-danger float-end">ย้อนกลับ</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ url('update-blog/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf    
                        @method('PUT')

                        <div class="form-group mb-3">
                            <strong>หัวข้อ</strong>
                            <input type="text" name="title" value="{{$blog->title}}" class="form-control" placeholder="กรอกหัวข้อ">
                        </div>

                        <div class="form-group mb-3">
                            <strong>รายละเอียด</strong>
                            <input type="text" name="description" value="{{$blog->description}}" class="form-control" placeholder="กรอกรายละเอียด">
                        </div>

                        <div class="form-group mb-3">
                            <strong>รูปภาพ</strong>
                            <input type="file" name="blog_image" value="{{$blog->title}}" class="form-control">
                            <img src="{{ asset('uploads/blog/'.$blog->blog_image) }}" width="100px" alt="Image">

                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection