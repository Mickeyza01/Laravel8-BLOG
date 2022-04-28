@extends('posts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>เพิ่มบทความ
                        <a href="{{ url('blog') }}" class="btn btn-danger float-end">ย้อนกลับ</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ url('add-blog') }}" method="POST" enctype="multipart/form-data">
                        @csrf    

                        <div class="form-group mb-3">
                            <label for="">หัวข้อ</label>
                            <input type="text" name="title" class="form-control" placeholder="กรอกหัวข้อ">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">รายละเอียด</label>
                            <input type="text" name="description" class="form-control" placeholder="กรอกรายละเอียด">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">รูปภาพ</label>
                            <input type="file" name="blog_image" class="form-control">
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