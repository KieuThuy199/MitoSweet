@extends('admin.layout.main')
@push('css')

    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

@endpush

@section('header-body')
    <div class="row" style="margin: 0;">
        <div class="breadcrumb-admin">
            <i class="far fa-newspaper"></i>
            @lang('modules.dashboard.menu.news')
        </div>
        <div class="btn-group-sm btn-func">
            <button type="button" class="btn btn-dark">
                <i class="fas fa-sync-alt"></i>
            </button>
            <button type="button" class="btn btn-primary" onclick="openModal()">
                <i class="fas fa-plus"></i>
            </button>
            <a href="{{ url('news/delete') }}" class="btn btn-danger" onclick="xacnhan()">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    </div>
    {{-- form add --}}
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>@lang('modules.button.add')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="news/add" class="change-form" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="img" name="imgnews[]" onchange="previewImg(event)" accept="image/*" multiple required><br>
                        <div class="box-preview-img"></div>
                        <label for="" class="control-label">@lang('modules.news.name')</label>
                        <input class="form-control" name="title" required>
                        <label for="" class="control-label">@lang('modules.news.summary')</label>
                        <input class="form-control" name="summary" required>
                        <label for="" class="control-label">@lang('modules.news.content')</label>
                        <textarea class="form-control" name="detail" cols="30" rows="10" required></textarea>
                        <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                        <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end add --}}
@endsection

@section('content-body')

@if(session('status'))
        <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('status') }}
        </div>
@endif

@if(session()->has('fail'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('fail') }}
    </div>
@endif
<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_news">
        <thead>
        <tr>
            <th scope="col">Chọn</th>
            <th scope="col">Tên tin tức</th>
            <th scope="col">Tóm tắt</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($news as $news)
            <tr>
                <td><input type="checkbox" name="delete[]" value="{{ $news->id }}"></td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->summary }}</td>
                <td>{{ $news->detail }}</td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$news->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                        <a href="{{ url('news/delete') }}/{{$news->id}}" class="btn btn-primary" onclick="xacnhan()">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$news->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('news/edit') }}/{{$news->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="imgnews[]" onchange="previewImg(event)" multiple><br>
                                    <div class="box-preview-img"></div>
                                    <div class="preview-img"><img src="{{$news->img}}"></div>
                                    <label for="" class="control-label">@lang('modules.news.name')</label>
                                    <input class="form-control" value="{{$news->title}}" name="title" required>
                                    <label for="" class="control-label">@lang('modules.news.summary')</label>
                                    <input class="form-control" value="{{$news->summary}}" name="summary" required>
                                    <label for="" class="control-label">@lang('modules.news.content')</label>
                                    <textarea class="form-control" name="detail" cols="30" rows="10" required>{{$news->detail}}</textarea>
                                    <button class="btn-change">@lang('modules.changeinfor.confirm')</button>
                                    <button class="btn-back" data-dismiss="modal">@lang('modules.back')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end edit --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')

    <script type="text/javascript" src="..\js\main.js"></script>

@endpush
