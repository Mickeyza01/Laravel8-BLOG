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
                    <h4>
                        <a href="{{ url('blog') }}" class="btn btn-danger float-end">ย้อนกลับ</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                    
                    <form action="{{ url('update-blog/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf    
                        @method('PUT')

                        <div class="form-group mb-3">
                            <strong>บทความที่ :</strong>
                            {{ $blog->title }} <br>
                            <strong>สร้างวันที่ : </strong> <label>{{ $blog->created_at->format('d-m-Y') }}</label> <br>
                            <strong>อัพเดทล่าสุด : </strong> <label>{{ $blog->updated_at->format('d-m-Y') }}</label>
                        </div>

                        

                        <div class="form-group mb-3">
                            <strong>รายละเอียด :</strong>
                            {{ $blog->description }}
                        </div>

                        <div class="form-group mb-3">
                            <strong>รูปภาพ</strong>
                            <br>
                            <img src="{{ asset('uploads/blog/'.$blog->blog_image) }}" width="300px" alt="Image">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection