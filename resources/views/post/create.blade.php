@extends('layouts.master')
@section('content')
<div class="content">
   <!-- Full Table -->
   <div class="block block-rounded block-bordered">
      <div class="block-header block-header-default">
         <h3 class="block-title">New post</h3>
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
              <label>Title</label>
                <input class="form-control" id="post_title" name="post_title" type="text"></input>
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
