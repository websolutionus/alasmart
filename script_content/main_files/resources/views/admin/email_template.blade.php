@extends('admin.master_layout')
@section('title')
<title>{{__('Email Template')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Email Template')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
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
                                        <th>{{__('SN')}}</th>
                                        <th>{{__('Email Template')}}</th>
                                        <th>{{__('Subject')}}</th>
                                        <th>{{__('Action')}}</th>
                                      </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $index => $item)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ ucfirst($item->name) }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>
                                                <a  href="{{ route('admin.edit-email-template',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
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
@endsection
