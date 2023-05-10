@extends('dashboard.layouts.app')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> المنتجات </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <form class="form-horizontal" role="form" method="post"
                        action="{{ route('dashboard.update-comment', $comment->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container">


                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                            for="user_id">
                                            رقم المستخدم
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $comment->user_id }}" name="user_id" id="user_id"
                                                placeholder="" class="form-control" />
                                            @error('user_id')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                            for="post_id">
                                            رقم البوست
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $comment->post_id }}" name="post_id" id="post_id"
                                                placeholder="" class="form-control" />
                                            @error('post_id')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                            for="comment">
                                            التعليق </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="comment" value="{{ $comment->comment }}"
                                                id="comment" placeholder=""
                                                class="form-control" />
                                            @error('comment')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                    <i class="ft-x"></i> تراجع
                                </button>
                                <button type="submit" class="btn btn-primary" name="save">
                                    <i class="la la-check-square-o"></i> حفظ
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>




    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='../assets/js/jquery.mobile.custom.js'>" + "<" + "/script>");
    </script>
    {{-- <script src="../assets/js/bootstrap.js"></script> --}}
@endsection
