        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Agenda</title>

            
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
        </head>
        <body>


        @extends('layouts.app')
        @section('content')

        <div class="container">
            <div id="agenda">

                Agenda

            </div>
        </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#evento">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-mutes">help text</small>
                </div>

                <div class="form-group">
                    <label title="title">titulo</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
                    <small id="helpId" class="form-text text-muted">help text</small>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>

                </div>
                <div class="form-group">
                    <label for="start">start</label>
                    <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                <div class="form-group">
                    <label for="end">end</label>
                    <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div> 
            </form>
          


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

        </div>
      </div>
    </div>
  </div>

        <script>

            document.addEventListener('DOMContentLoaded', function() {
                let formulario = document.querySelector("form");




            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
            
            
        },
        dateClick:function(){
            $("#evento").modal("show");
            initialView: 'dayGridMonth'
        }       
            });
            calendar.render();
            document.getElementById("btnGuardar").addEventListener("clik",function(){
                const datos=new FormData(formulario);
                console.log(datos);
            });

            });

        </script>

        @endsection
            
        </body>
        </html>









