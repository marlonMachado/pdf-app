<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



    </head>
    <body class="antialiased">
        <div class="container">
            <h1>GESTION PDF</h1>
          </div>
          @if(session('status'))
            <div >
              <h2 style="color:rgb(255, 5, 5)">  {{session('status')}}</h2>
            </div>
           @endif 
         
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <form action="{{route('index.savePdf')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="container">
                <div class="input-field inline container">
                    <div class="form-group">
                        <input name="urlPdf" type="file" class="validate">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <input type="submit" value="cargar archivo">
                    </div>
                </div>
            </div>
        </form>
        <div class="container">
            <table class="table table-striped">    
                <thead>
                  <tr>
                      <th>seleccion</th>
                      <th>id</th>
                      <th>nombre documento</th>
                      <th>acciones</th>
                  </tr>
                </thead>
                @foreach($pdf as $pdf)
                <tbody>
                    <tr>
                       <td><input class="form-check-input" type="checkbox" value="{{asset("/$pdf->name")}}" id="{{$pdf->id}}" ></td>
                        <td>{{$pdf->id}}</td>
                        <td>{{$pdf->name}}</td>
                        <td style="width: 400px">  
                            <form method="POST" action="{{route('delete',$pdf->id)}}" id="formularioEliminar" >
                                @csrf
                                @method('delete')     
                                <button class="btn btn-outline-danger btn-sm float-right" type="submit" name="action">
                                    <a href="{{route('delete',$pdf->id)}}"><i class="material-icons right">delete</i> </a>    
                                </button>                   
                            </form>
                            <button class="btn btn-outline-primary d-inline p-2" type="submit" name="action" style=" display: inline-block;" >
                                <a href="{{route('edit',$pdf->id)}}"><i class="material-icons left">edit</i></a>   
                            </button>
                          <a   target="_blank" href="{{asset("/$pdf->name")}}">PDF</a>
                            
                        </td>
                    </tr>
                </tbody>
                @endforeach
              </table>
        </div>
        <button type="button" id="botton">visualizar multiples pdf</button>
    </body>
</html>
<script>
    var boton =document.getElementById('botton');
    var lista =document.getElementById('list');
    var check =document.querySelectorAll('.form-check-input');
    boton.addEventListener('click',function(){
     check.forEach((e)=>{
            if (e.checked==true) {
                console.log(check.length);
                console.log('epa hp'+ e.value);
                vet= window.open(e.value, '_blank' );
            }else{
                alert ("debe seleccionar documentos que desee ver");  
            }
        }); 
    }

    );  
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
