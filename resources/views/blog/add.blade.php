@extends('template.master-blog')

@section('judul','tambah-blog')

@section('isi')
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Tambah Data blog</h3>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('blog.save-blog') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="id1">id : </label>
                                    <input type="number" id="id1" name="id" class="form-control" value="{{old('id')}}" autocomplete="off" autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="auth">author :</label>
                                    <input type="text" id="auth" name="author" class="form-control" value="{{old('author')}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="title1">title :</label>
                                    <input type="text" id="title1" name="title" class="form-control" value="{{old('title')}}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="body1">body :</label>
                                    <textarea name="body" id="body1" cols="30" rows="2" autocomplete="off">{{old('body')}}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="keyword1">keyword :</label>
                                    <input type="text" id="keyword1" name="keyword" class="form-control" value="{{old('keyword')}}" autocomplete="off">
                                </div>

                                <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                <a class="btn btn-primary" href="{{ url('data-blog') }}" role="button">Kembali</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection