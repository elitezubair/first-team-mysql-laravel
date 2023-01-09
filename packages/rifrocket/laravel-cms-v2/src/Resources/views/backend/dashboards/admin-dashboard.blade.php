@extends('LbsViews::backend.layouts.admin-master-layout')
@section('page_title','dashboard')
@section('content')


<div class="card">
    <div class="card-header">
      <h3 class="card-title">Title</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <form action="{{route('uploaded-files.test')}}" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div class="form-group">
          @include('LbsViews::utility.utility-media-uploader',['name'=>'photo','datatype'=>'image','multiple'=>false, 'preview'=>true, 'old_media'=>null])
          </div>
          <div class="form-group">
            @include('LbsViews::utility.utility-media-uploader',['name'=>'myphoto','datatype'=>'image','multiple'=>true, 'preview'=>true, 'old_media'=>null])
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
        </div>
        <!-- /.card-body -->

        {{-- @include('LbsViews::livewire.authorization.partials.create-authorization-livewire') --}}

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

@endsection
