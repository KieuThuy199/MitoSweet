@extends('admin.layout.main')
{{-- @push('css')
@endpush --}}

@section('header-body')
    <div class="breadcrumb-admin d-inline">
        <i class="fas fa-tv"></i>
        @lang('modules.dashboard.menu.web')
    </div>
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
    <table class="table table-bordered text-center"  id="data_web">
        <thead>
        <tr>
            <th scope="col">Tên gọi tắt</th>
            <th scope="col">Tên trang</th>
            <th scope="col">Chức năng</th>
        </tr>
        </thead>
        <tbody id="search-body">
            @foreach ($page as $pages)
            <tr>
                <td class="btn-gr d-none"><input type="checkbox" class="check" name="delete[]" value="{{ $pages->id }}"></td>
                <td>{{ $pages->nick }}</td>
                <td>{{ $pages->title }}</td>
                <td>
                    <div class="btn-group-sm btn-func">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$pages->id}}">
                            <span class="fas fa-edit"></span>
                        </button>
                    </div>
                </td>
                {{-- form edit --}}
                <div class="modal fade" id="editModal{{$pages->id}}">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>@lang('modules.button.edit')</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="pages/edit/{{$pages->id}}" class="change-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="required control-label">@lang('modules.levels.name')</label>
                                    <input class="form-control" value="{{$pages->title}}" name="title" required>

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
    {{$page->links('admin.layout.pagination')}}
</div>



@endsection

@push('scripts')

    <script type="text/javascript" src="..\js\main.js"></script>
    <script type="text/javascript" src="..\js\upload.js"></script>
@endpush
