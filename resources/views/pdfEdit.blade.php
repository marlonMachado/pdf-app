<!DOCTYPE html>
  <html lang="en">
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <body>
      <div class="container">
        <h1>Editar pdf</h1>
      </div>
<div class="container">
    <form action="{{route('update',$pdfSel)}}" method="POST"  class="container">
      @method('put')
      @csrf
      <div class="container">
        <div class="form-group">
          <label for="exampleInputEmail1">Id Pdf</label>
          <input  name="idPdf_edit" type="number" class="form-control "  value="{{$pdfSel->id}}" readonly>
          <small id="emailHelp" class="form-text text-muted">.</small>
        </div>
          

          <div class="form-group">
            <label for="exampleInputEmail1">nombre pdf</label>
            <input  name="namePdf_edit" type="text" class="form-control"  value="{{$pdfSel->name}}">
            <small id="emailHelp" class="form-text text-muted">Edite el nombre de el pdf.</small>
          </div>
          
          <div  class="mx-auto" style="width: 200px;">
            <button class="btn btn-primary" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
         
      </div>
    </form>
  </div>
    </body>
  </html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
