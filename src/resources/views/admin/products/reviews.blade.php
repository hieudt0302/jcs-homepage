@extends('layouts.admin') 
@section('title','Đánh Giá Sản Phẩm - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Đánh Giá Sản Phẩm
        <small>Danh Sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Đánh Giá Sản Phẩm</a></li>
        <li class="active">Danh Sách</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="form-horizontal">
        <div class="panel-group">
            <div class="panel panel-default panel-search">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="label-wrapper">
                                        <label for="created_from" class="control-label">Từ Ngày</label>
                                        <div class="ico-help" title="The creation from date for the search"><i class="fa fa-question-circle"></i></div>
                                    </div>
                                </div>
                                <div class="col-sm-8 input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="created_from" class="form-control pull-right" id="created_from" data-date-end-date="0d">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="label-wrapper">
                                        <label for="created_to" class="control-label">Đến Ngày</label>
                                        <div class="ico-help" title="The creation to date for the search"><i class="fa fa-question-circle"></i></div>
                                    </div>
                                </div>
                                <div class="col-sm-8 input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="created_to" class="form-control pull-right" id="created_to" data-date-end-date="0d">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="label-wrapper"><label class="control-label" for="SearchText" title="">Message</label>
                                        <div class="ico-help" title="Search in title and review text."><i class="fa fa-question-circle"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control text-box single-line" id="SearchText" name="SearchText" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="label-wrapper"><label class="control-label" for="SearchApprovedId" title="">Approved</label>
                                        <div class="ico-help" title="Search by a &quot;Approved&quot; property."><i class="fa fa-question-circle"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" data-val="true" data-val-number="The field Approved must be a number." id="SearchApprovedId" name="SearchApprovedId"><option selected="selected" value="0">All</option>
                                        <option value="1">Approved only</option>
                                        <option value="2">Disapproved only</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="label-wrapper"><label class="control-label" for="SearchProductId" title="">Product</label>
                                        <div class="ico-help" title="Search by a specific product."><i class="fa fa-question-circle"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" class="form-control ui-autocomplete-input" id="search-product-name" autocomplete="off">
                                    <span id="search-product-friendly-name"></span>
                                    <button type="button" id="search-product-clear" class="btn bg-gray" style="display: none; margin-top: 5px;">Clear</button>
                                    <input autocomplete="off" data-val="true" data-val-number="The field Product must be a number." id="SearchProductId" name="SearchProductId" style="display:none;" type="text" value="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" id="search-productreviews" class="btn btn-primary btn-search">
                                    <i class="fa fa-search"></i>
                                    Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="productreviews-grid">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Customer</th>
                                    <th>Review</th>
                                    <th style="text-align:center">Rating</th>
                                    <th style="text-align:center">Approved</th>
                                    <th>Created on</th>
                                    <th style="text-align:center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                <tr>
                                    <td><a href="{{url('/admin/products/')}}/1/Edit">Product Name...</a></td>
                                    <td>Customer Name</td>
                                    <td>{{$review->comment}}</td>
                                    <td style="text-align:center">{{$review->rate}}</td>
                                    <td style="text-align:center"> <i class="fa fa-check true-icon"></i> </td>
                                    <td>{{$review->created_at}}</td>
                                    <td style="text-align:center"><a class="btn btn-default" href="#"><i class="fa fa-pencil"></i>Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 

@section('scripts')
<script>
    $(function(){
        $('#created_from, #created_to').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true,
            clearBtn : true
        })
    })
</script>
@endsection