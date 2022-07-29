@extends('layout.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Subject Manager</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= BASE_URL . 'admin-dashboard'?>">Home</a></li>
            <li class="breadcrumb-item active">Subject Manager</li>
            <li class="breadcrumb-item active">Add Subject</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<form action="<?= BASE_URL . 'mon-hoc/tao-moi'?>" method="post" enctype="multipart/form-data">
    <div class="form-outline">
       <div>
        <label class="form-label" for="form12">Subject Name</label>
        <input type="text" id="form12" class="form-control" name="name"/>
      </div>
      <div>
        <label class="form-label" for="form12">Image</label>
        <input type="file" id="form12" class="form-control" name="img"/>
      </div>
      <div class=" text-lg-start mt-4 pt-2">
        <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Save">
      </div>
    </div>
</form>
@endsection 