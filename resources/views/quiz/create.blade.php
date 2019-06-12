@extends('layouts.master')
@section('content')
<div class="content">
   <!-- Full Table -->
   <div class="block block-rounded block-bordered">
      <div class="block-header block-header-default">
         <h3 class="block-title">New quiz</h3>
      </div>

      <div class="col-lg-8">
         <p class="text-muted">
            Here goes important information, news, post, health recomendations, etc.
         </p>
      </div>
      <form action="/posts" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="block-content block-content-full tab-content" style="min-height: 290px;">
          <div class="tab-pane active show" id="wizard-simple-step1" role="tabpanel">
            <div class="form-group">
              <label for="example-select">Selecciona la categoria</label>
              <select class="form-control" id="example-select" name="example-select">
                  <option value="0">Please select</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label>Topic</label>
                <input class="form-control" id="post_title" name="post_title" type="text" autocomplete="off"></input>
            </div>

            <div class="col-lg-8">
            <div class="form-group row items-push mb-0">
              <div class="col-md-2">
                <div class="custom-control custom-block custom-control-primary mb-1">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-block1" name="example-rd-custom-block">
                  <label class="custom-control-label" for="example-rd-custom-block1">
                  <span class="d-block font-w400 text-center my-3">
                      <img src="/uploads/arte_design00.png" alt="">
                    </span>
                  </label>
                  <span class="custom-block-indicator">
                    <i class="fa fa-check"></i>
                  </span>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="custom-control custom-block custom-control-primary mb-1">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-block2" name="example-rd-custom-block">
                  <label class="custom-control-label" for="example-rd-custom-block2">
                    <span class="d-block font-w400 text-center my-3">
                      <img src="/uploads/arte_design01.png" alt="">
                    </span>
                  </label>
                  <span class="custom-block-indicator">
                    <i class="fa fa-check"></i>
                  </span>
                </div>
              </div>
              <div class="col-md-2">
                <div class="custom-control custom-block custom-control-primary mb-1">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-block3" name="example-rd-custom-block">
                  <label class="custom-control-label" for="example-rd-custom-block3">
                    <span class="d-block font-w400 text-center my-3">
                      <img src="/uploads/arte_design02.png" alt="">
                    </span>
                  </label>
                  <span class="custom-block-indicator">
                    <i class="fa fa-check"></i>
                  </span>
                </div>
              </div>
              <div class="col-md-2">
                <div class="custom-control custom-block custom-control-primary mb-1">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-block4" name="example-rd-custom-block">
                  <label class="custom-control-label" for="example-rd-custom-block4">
                    <span class="d-block font-w400 text-center my-3">
                      <img src="/uploads/arte_design03.png" alt="">
                    </span>
                  </label>
                  <span class="custom-block-indicator">
                    <i class="fa fa-check"></i>
                  </span>
                </div>
              </div>
              <div class="col-md-2">
                <div class="custom-control custom-block custom-control-primary mb-1">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-block5" name="example-rd-custom-block">
                  <label class="custom-control-label" for="example-rd-custom-block5">
                    <span class="d-block font-w400 text-center my-3">
                      <img src="/uploads/arte_design04.png" alt="">
                    </span>
                  </label>
                  <span class="custom-block-indicator">
                    <i class="fa fa-check"></i>
                  </span>
                </div>
              </div>
            </div>
            </div>

            <div class="form-group">
                <label >Content</label>
                <textarea class="form-control" id="post_content" name="post_content" type="text" rows=3></textarea>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" class="form-control" name="post_photo"/>
            </div>

          </div>


          </div>
          <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
            <div class="row">

              <div class="col-6 text-right">
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>
              </div>
            </div>
          </div>
      </form>
   </div>
</div>

<script type="text/javascript">
  function cleanForm(){
    console.log("Limpiando el formulario")
    document.getElementById("question_statement").value="";
    document.getElementById("question_optionA").value="";
    document.getElementById("question_optionB").value="";
    document.getElementById("question_optionC").value="";
    document.getElementById("question_optionD").value="";
    document.getElementById("question_optionE").value="";
  };

</script>
<!-- END Page Container -->
@endsection
