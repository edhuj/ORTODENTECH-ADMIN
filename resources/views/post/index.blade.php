@extends('layouts.master')
@section('content')
<div class="content">
    <!-- Full Table -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">All posts</h3>
            <div class="block-options">
                <a href="/posts/create">
                  <button type="button" class="btn btn-sm btn-primary">
                      <i class="fa fa-plus">New post</i>
                  </button>
                </a>
            </div>
        </div>
        <div class="block-content">
          <div class="row">
            @foreach($posts as $post)
            <div class="col-md-6">
               <div class="block block-rounded block-bordered">
                  <div class="block-header block-header-default">
                     <h3 class="block-title">{{$post->title}} <small>Subtitle</small></h3>
                     <div class="block-options">
                       <button type="button" class="btn-block-option">
                         <i class="far fa-fw fa-trash-alt"></i>
                       </button>
                       <button type="button" class="btn-block-option">
                         <i class="fa fa-fw fa-pencil-alt"></i>
                       </button>
                       <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle">
                         <i class="si si-arrow-up"></i>
                       </button>
                     </div>
                  </div>

                  <div class="block-content">
                    <div class="col-md-12 animated">
                      <div class="options-container">
                        <img class="img-fluid options-item" src="/uploads/{{$post->filename}}" alt="">
                      </div>
                    </div>
                     <p>{{$post->content}}</p>
                  </div>
               </div>
            </div>
            @endforeach
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
