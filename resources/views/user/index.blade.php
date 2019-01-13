@extends('layouts.master')
@section('content')
<div class="content">
    <!-- Full Table -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">All users</h3>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Name</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 10%;">City</th>
                            <th style="width: 10%;">Age</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                          <tr>

                              <td class="font-w600">
                                  <a href="be_pages_generic_profile.html">{{$user->name}}</a>
                              </td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->city}}</td>
                              <td>{{$user->birthday}}</td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                          <i class="fa fa-pencil-alt"></i>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Full Table -->

</div>

</main>
<!-- END Main Container -->



</div>
<!-- END Page Container -->
@endsection
