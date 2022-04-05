@extends('layout.app')
@section('content')
<div class="container-fluid">
    <div class="video-block section-padding">
       <div class="row">
          <div class="col-md-12">
             <div class="main-title">
                <div class="btn-group float-right right-action">
                   <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                   </a>
                   <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                   </div>
                </div>
                <h6>Read book</h6>
             </div>
          </div>
          <div class="col-md-12">
             
             <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
             </div>
             <div class="alert alert-secondary" role="alert">
                A simple secondary alert—check it out!
             </div>
             <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
             </div>
             <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
             </div>
             <div class="alert alert-warning" role="alert">
                A simple warning alert—check it out!
             </div>
             <div class="alert alert-info" role="alert">
                A simple info alert—check it out!
             </div>
             <div class="alert alert-light" role="alert">
                A simple light alert—check it out!
             </div>
             <div class="alert alert-dark mb-0" role="alert">
                A simple dark alert—check it out!
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- /.container-fluid -->
 @endsection