@extends('layouts.admin')
@section('title','Post - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Post
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/posts')}}">back to post list</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Post</a></li>
        <li class="active">Create</li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- PRODUCTS EDIT -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">General Info</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/posts/create')}}" method="post">
                                {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="label-wrapper"><label class="control-label" for="title" title="">Title</label>
                                                    <div class="ico-help" title="The title of the post."><i class="fa fa-question-circle"></i></div></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-required">
                                                        <input class="form-control text-box single-line valid" id="title" name="title" type="text" value="">
                                                        <div class="input-group-btn">
                                                            <span class="required">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="label-wrapper"><label class="control-label" for="Published" title="">Published</label><div class="ico-help" title="Check to publish this post (visible in store). Uncheck to unpublish (post not available in store)."><i class="fa fa-question-circle"></i></div></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('published', 1 , true , array('class' => 'check-box')) }}
                                                            Published
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="label-wrapper"><label class="control-label" for="slug" title="">Slug</label>
                                                        <div class="ico-help" title="Slug of post"><i class="fa fa-question-circle"></i></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text">
                                                </div>
                                            </div>                                           
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="label-wrapper"><label class="control-label" for="category" title="">Category</label><div class="ico-help" title="The category of the post."><i class="fa fa-question-circle"></i></div></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as  $category)
                                                        <option value="{{$category->id}}">{{$category->translation->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div class="label-wrapper"><label class="control-label" for="slug" title="">Ảnh đại diện</label>
                                                        <div class="ico-help" title="Slug of post"><i class="fa fa-question-circle"></i></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input class="single-line valid" type="file" name="img"/>
                                                    <span class="text-danger">{{ $errors->first('img') }}</span>                                                        
                                                </div>
                                            </div>                                             
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Create New</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- CONTENT TAB -->
                        <!-- <div class="tab-pane" id="content">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="name" title="">Translate</label><div class="ico-help" title="The language of the content."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="language_id" class="form-control">
                                                    @foreach($languages as  $language)
                                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="title_translate" title="">Title</label>
                                                <div class="ico-help" title="The name of the post."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-required">
                                                    <input class="form-control text-box single-line valid" id="title_translate" name="title_translate" type="text" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="excerpt_translate" title="">Excerpt</label>
                                                <div class="ico-help" title="The excerpt of the post."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea id="excerpt_translate" class="form-control" name="excerpt_translate" rows="3"  placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="content_translate" title="">Specs</label>
                                                <div class="ico-help" title="The content of the post."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea id="content_translate" class="form-control" name="content_translate" rows="3"  placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="description_translate" title="">Description</label>
                                                <div class="ico-help" title="The description of the post."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea id="description_translate" class="form-control" name="description_translate" rows="3"  placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection


@section('scripts')
<script>
  $(function () {
    $('#special_price_start_date, #special_price_end_date').datepicker({
        format : 'yyyy-mm-dd',
        autoclose : true,
        clearBtn : true
    })
   

    $('#special_price_start_date').datepicker().on('changeDate', function(e) {
       
    });

    $('#special_price_end_date').datepicker().on('changeDate', function(e) {
      
    });

    $('.select2').select2();
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace('excerpt-editor');
    // CKEDITOR.replace('content-editor');
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
  })
</script>
@endsection