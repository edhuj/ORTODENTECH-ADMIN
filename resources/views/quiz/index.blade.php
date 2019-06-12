@extends('layouts.master')
@section('content')
<div class="content">
    <!-- Full Table -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">All questions</h3>
            <div class="block-options">
                <a href="/questions/create">
                  <button type="button" class="btn btn-sm btn-primary">
                      <i class="fa fa-plus">New question</i>
                  </button>
                </a>

            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Question</th>
                            <th style="width: 20%;">Categoria</th>
                            <th style="width: 20%;">Topic</th>
                            <th style="width: 10%;">Option A</th>
                            <th style="width: 10%;">Option B</th>
                            <th style="width: 10%;">Option C</th>
                            <th style="width: 10%;">Option D</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                          <tr>
                              <td class="font-w600">
                                  <a href="/questions/{{$question->id}}">{{$question->statement}}</a>
                              </td>
                              <td>{{$question->category}}</td>
                              <td>{{$question->topic}}</td>
                              <td>{{$question->option1}}</td>
                              <td>{{$question->option2}}</td>
                              <td>{{$question->option3}}</td>
                              <td>{{$question->option4}}</td>
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
