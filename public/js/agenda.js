document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("form");

    console.log(formulario)

    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        initialView: 'dayGridMonth', // Mueve esta línea aquí para definir la vista inicial
        events:"http://127.0.0.1:8000/evento/mostrar" ,
        dateClick: function(info) {
            formulario.reset();

            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;

            $("#evento").modal("show");
        },


        eventClick: function (info) {

          var evento = info.event;
          console.log(evento);
    
          document.getElementById("btnModificar").addEventListener("click"), function () {
    
            const datos = new FormData(formulario)
            axios.post("http://127.0.0.1:8000/evento/editar/" + info.event.id).
              then(
                (respuesta) => {
    
                  formulario.id.value = respuesta.data.id;
                  formulario.title.value = respuesta.data.title;
                  formulario.descripcion.value = respuesta.data.descripcion;
                  formulario.start.value = respuesta.data.start;
                  formulario.end.value = respuesta.data.end;
    
                  $("#evento").modal("show");
                }
              ).catch(
                error => {
                  if (error.response) {
                    console.log(error.response.data);
                  }
                }
              )
          }
        }
      });

    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click"), function() {

        const datos = new FormData(formulario)

        axios.post("http://127.0.0.1:8000/evento/agregar", datos).
        then(
            (respuesta) => {
                calendar.refetchEvents();
                // console.log(respuesta)
                $("#evento").modal("hide");
            }
        ).catch(
            error => {
                if(error.response) {
                    console.log(error.response.data);
                }
            }
        )
       }
    });