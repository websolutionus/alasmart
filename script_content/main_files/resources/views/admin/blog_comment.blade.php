@extends('admin.master_layout')
@section('title')
<title>{{__('Blog Comment')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Blog Comment')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
              <div class="breadcrumb-item active"><a href="{{ route('admin.blog.index') }}">{{__('Blog')}}</a></div>
              <div class="breadcrumb-item">{{__('Blog Comment')}}</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">{{__('SN')}}</th>
                                    <th width="15%">{{__('Name')}}</th>
                                    <th width="15%">{{__('Email')}}</th>
                                    <th width="30%">{{__('Comment')}}</th>
                                    <th width="10%">{{__('Blog')}}</th>
                                    <th width="15%">{{__('Status')}}</th>
                                    <th width="5%">{{__('Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogComments as $index => $blogComment)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ html_decode($blogComment->name) }}</td>
                                        <td>{{ html_decode($blogComment->email) }}</td>
                                        <td>{{ html_decode($blogComment->comment) }}</td>
                                        <td> <a class="btn btn-success btn-sm" href="{{ route('blog',$blogComment->blog->slug) }}">{{__('view')}}</a></td>
                                        <td>

                                            @if($blogComment->status == 1)
                                            <a href="javascript:;" onclick="changeBlogCommentStatus({{ $blogComment->id }})">
                                                <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('Active')}}" data-off="{{__('Inactive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>

                                            @else
                                            <a href="javascript:;" onclick="changeBlogCommentStatus({{ $blogComment->id }})">
                                                <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('Active')}}" data-off="{{__('Inactive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>

                                            @endif
                                        </td>
                                        <td>

                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $blogComment->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>

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
      </div>

<script>
  "use strict";
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/blog-comment/") }}'+"/"+id)
    }
    function changeBlogCommentStatus(id){
        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/blog-comment-status/')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){


            }
        })
    }
</script>
@endsection
