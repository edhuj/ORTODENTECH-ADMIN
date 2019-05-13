@extends('layouts.master')
@section('content')
<div class="content">
   <!-- Full Table -->
   <div class="block block-rounded block-bordered">
      <div class="block-header block-header-default">
         <h3 class="block-title">New question</h3>
      </div>


      <form action="/questions" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="block-content block-content-full tab-content" style="min-height: 290px;">
          <div class="tab-pane active show" id="wizard-simple-step1" role="tabpanel">
            <div class="form-group">
              <label>Pregunta</label>
                <textarea class="form-control" id="question_statement" name="question_statement" rows="3" type="text"></textarea>
            </div>
            <div class="form-group">
              <label>Elige una imagen</label>
              <div>
                <input type="file"  name="image_statement">
              </div>
            </div>
            <div class="form-group">
              <label>Elige un icono</label>
              <div>
                <input type="file"  name="image_icono">
              </div>
            </div>
            <div class="form-group">
                <input class="form-control" id="question_optionA" name="question_optionA" type="text" placeholder="Option A" >
            </div>
            <div class="form-group">
                <input class="form-control" id="question_optionB" name="question_optionB" type="text" placeholder="Option B">
            </div>
            <div class="form-group">
                <input class="form-control" id="question_optionC" name="question_optionC" type="text" placeholder="Option C">
            </div>
            <div class="form-group">
                <input class="form-control" id="question_optionD" name="question_optionD" type="text" placeholder="Option D">
            </div>

            <div class="form-group">
              <label for="example-select">Categoria</label>
                <select class="form-control" id="example-select" name="category">
                    <option value="0">Please select</option>
                    <option value ="Arte & Artedesign">Arte & design</option>
                    <option value ="Negócios">Negócios</option>
                    <option value ="Educação">Educação</option>
                    <option value ="Entretenimento">Entretenimento</option>
                    <option value ="Comida e bebida">Comida e bebida</option>
                    <option value ="Jogos">Jogos</option>
                    <option value ="Geral">Geral</option>
                    <option value ="História">História</option>
                    <option value ="Literatura">Literatura</option>
                    <option value ="Cinema">Cinema</option>
                    <option value ="Música">Música</option>
                    <option value ="Natureza">Natureza</option>
                    <option value ="Ciência">Ciência</option>
                    <option value ="Esportes">Esportes</option>
                    <option value ="TV">TV</option>
                    <option value ="Tecnologia">Tecnologia</option>
                    <option value ="Mundo">Mundo</option>
                  </select>
            </div>

            <div class="form-group">
              <label class="d-block">Answer</label>
              <div class="form-check-inline">
                <input class="form-check-input" id="option1" name="radios_options" value="1" checked="" type="radio">
                <label class="form-check-label" for="option1">Option 1</label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" id="option2" name="radios_options" value="2" type="radio">
                <label class="form-check-label" for="option2">Option 2</label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" id="option3" name="radios_options" value="3" type="radio">
                <label class="form-check-label" for="option3">Option 3</label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" id="option4" name="radios_options" value="4" type="radio">
                <label class="form-check-label" for="option4">Option 4</label>
              </div>
          </div>

          <div class="form-group">
              <label >Topic</label>
              <input class="form-control" id="topic" name="topic" type="text">
          </div>

          </div>
          <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
            <div class="row">
              <div class="col-6">
                <button type="button" class="btn btn-secondary disabled" onclick="cleanForm()">
                  Reset
                </button>
              </div>
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
