/**
 * Created by lilsa on 04/05/2017.
 */
$(document).ready(function () {
    $('#frmAdd').validate({
        rules:{
            mNombres:{
                required:true
            },
            mApellido:{
                required:true
            },
            mCañaPic:{
                required:true
            },
            mDni:{
                required:true
            },
            datepicker:{
                required:true
            }
        },
        messages:{
            mNombres:{
                required:"Nombres es Obligatorio."
            },
            mApellido:{
                required:"Apellido es Obligatorio."
            },
            mDni:{
                required:"El documento de Identidad es Obligatorio."
            },
            datepicker:{
                required:"Fecha de Nacimiento es Obligatorio."
            },
            mRendimiento:{
                required:"Rendimiento es requerido."
            }
        }
    });
});