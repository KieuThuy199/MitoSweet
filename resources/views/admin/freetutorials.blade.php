@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="row">
        <div class="col-lg-9">
            <div class="breadcrumb-admin d-inline">
                <i class="fas fa-video"></i>
                @lang('modules.dashboard.menu.freetutorial')
            </div>
            <div class="btn-group-sm btn-func d-inline">
                <button type="button" class="btn btn-dark reload">
                    <i class="fas fa-sync-alt"></i>
                </button>
                <button type="button" class="btn btn-primary" onclick="openModal()">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-danger btn-del-show">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
        <div class="col-lg-3">
            <input class="form-control d-inline" name="search" id="search" placeholder="Tìm kiếm...">
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
                    <form method="POST" action="freetutorials/add" class="change-form" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="required control-label">@lang('modules.freetutorials.name')</label>
                        <input class="form-control" name="title" required>
                        <label for="" class="required control-label">@lang('modules.freetutorials.video')</label>
                        <input class="form-control" name="video" required>
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

{{-- Xóa nhiều--}}
<div class="btn-group-sm btn-gr d-none">
    <input type="checkbox" id="checkAll">
    <button type="submit" class="btn btn-danger btn-free">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>

<div class="table-responsive">
    <table class="table table-bordered text-center"  id="data_freetutorials">
        <thead>
        <tr>
            <th scope="col" class="btn-gr d-none">#</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Video</th>
            <th scope="col">Thời gian tạo</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($freetutorial as $freetutorials)
            <tr>
                <td class="btn-gr d-none"><input type="checkbox" class="check" name="delete[]" value="{{ $freetutorials->id }}"></td>
                <td>{{ $freetutorials->title }}</td>
                <td>{{ $freetutorials->video }}</td>
                <td>{{ $freetutorials->created_at }}</td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$freetutorials->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                        <a href="{{ url('freetutorials/delete') }}/{{$freetutorials->id}}" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <span class="fas fa-trash-alt"></span>
                        </a>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$freetutorials->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('freetutorials/edit') }}/{{$freetutorials->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="required control-label">@lang('modules.freetutorials.name')</label>
                                    <input class="form-control" value="{{$freetutorials->title}}" name="title" required>
                                    <label for="" class="required control-label">@lang('modules.freetutorials.video')</label>
                                    <input class="form-control" value="{{$freetutorials->video}}" name="video" required>

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
    {{$freetutorial->links('admin.layout.pagination')}}
</div>



@endsection

@push('scripts')

    <script type="text/javascript" src="..\js\main.js"></script>
    <script type="text/javascript" src="..\js\upload.js"></script>
    {{-- <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script> --}}
@endpush
