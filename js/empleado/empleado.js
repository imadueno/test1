// jQUery ready 
$(function(){

    // =========================================================================
    // variables que usaremos 
    // =========================================================================
    let arrayEstudiosEmpleado = [];

    if( arrayEstudiosEmpleado.length < 1 ){
        $('#tabla-estudio').append('<tr><td class="estudiosTablePlaceholder" colspan="5">No se han agregado datos</td></tr>');
    }

    // =========================================================================
    // inicializar pluggin de Select2
    // =========================================================================
    $('#Sexo, #EstadoCivil, #TipoSangre, #Complexion, #Discapacidad, #Pais, #Estado, #Municipio, #Localidad, #Colonia, #GradoEstudio').select2();
    
    // =========================================================================
    // mascara para la CURP
    // =========================================================================
    $('#CURP').mask('LLLLNNNNNNLLLLLLAAA', {
        'translation': {
            L: { pattern: /[A-Za-z]/ },
            N: { pattern: /[0-9]/ },
            A: { pattern: /[A-Za-z0-9]/ },
        },
        'placeholder' : "MAGI940123HRSDSR"
    });

    // =========================================================================
    // mascara para el RFC
    // =========================================================================
    $('#RFC').mask('LLLLNNNNNNAAA', {
        'translation': {
            L: {pattern: /[A-Za-z]/},
            N: {pattern: /[0-9]/},
            A: {pattern: /[A-Za-z0-9]/},
        },
        'placeholder' : 'MAGI940123UR4'
    });

    // =========================================================================
    // Cargar imagen preview cuando se carga una imagen en input.file
    // =========================================================================
    $('#Fotografia').on('change', function(){
        readURL(this);  
    });

    // =========================================================================
    // Función para cargar imagen preview
    // =========================================================================
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#imagen-placeholder').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
        }
      }

    // =========================================================================
    // validacion de solo numeros - inputs
    // =========================================================================
    $('#NumeroEmpleado, #NumeroPension, #Peso, #Estatura, #CodigoPostal, #NumeroExterior').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    // =========================================================================
    // inicializando air date picker
    // =========================================================================
    $('#FechaNacimiento, #FechaInicio, #FechaFin').datepicker({
        language : 'es'
    });

    // =========================================================================
    // Access instance of plugin - date picker
    // =========================================================================
    $('#FechaNacimiento, #FechaInicio, #FechaFin').data('datepicker');

    // =========================================================================
    // FINALIZAR registro - Boton registrar empleado
    // =========================================================================
    $('#formulario_empleado').on('submit', (e) => {

        e.preventDefault();
        let aFormulario = $('#formulario_empleado').serializeArray();
        let oFormulario = cargar_ajax.array_to_obj( aFormulario );

        if( arrayEstudiosEmpleado.length == 0){

            // si no hay ningun grado de estudios registrado
            customAlert('warning', 'Ops..!', 'Debe agregar por lo menos un grado de estudios valido.');
        }else{

            // generamos los parametros a enviar por ajax
            let oParams = {
                'empleado' : oFormulario,
                'estudios' : arrayEstudiosEmpleado
            }
            let oRespuesta = cargar_ajax.run_server_ajax( 'helpers/validar_empleado.php', oParams );
            console.log(oRespuesta);

            if( oRespuesta.error ){
                customAlert( 'danger', 'Oops..!', 'Algo salió mal. Verifica la información de empleado' );
            }else{

                // se creo empleado correctamente
                customAlert( 'success', oRespuesta.mensaje, 'Se registró expediente de empleado N.' + oRespuesta.NombreArchivo );
                setTimeout(function(){

                    window.location(base_url);

                }, 5000);
            }
        }
        
    });

    // =========================================================================
    // evento on Change de input.select pais
    // =========================================================================
    $('#Pais').on('change', () => {

        let nombreInput = $('#Pais').attr('name');
        let inputValue  = $('#Pais option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Estado').html( valores );

    });

    // =========================================================================
     // evento on Change de input.select estado
     // =========================================================================
     $('#Estado').on('change', () => {

        let nombreInput = $('#Estado').attr('name');
        let inputValue  = $('#Estado option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Municipio').html( valores );

    });

    // =========================================================================
    // evento on Change de input.select municipio
    // =========================================================================
    $('#Municipio').on('change', () => {

        let nombreInput = $('#Municipio').attr('name');
        let inputValue  = $('#Municipio option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Localidad').html( valores );

    });

    // =========================================================================
    // evento on Change de input.select localidad
    // =========================================================================
    $('#Localidad').on('change', () => {

        let nombreInput = $('#Localidad').attr('name');
        let inputValue  = $('#Localidad option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Colonia').html( valores );

    });

    // =========================================================================
    // Proceso de validación para sección de Estudios en el formulario
    // =========================================================================
    $('#agregarEstudio').on('click', function(){

        // Tomamos los datos y los validamos
        const Escuela      = $('#Escuela').val();
        const GradoEstudio = $('#GradoEstudio').val();
        const FechaInicio  = $('#FechaInicio').val();
        const FechaFin     = $('#FechaFin').val();

        let oParams = {
            'Escuela': Escuela,
            'GradoEstudio': GradoEstudio,
            'FechaInicio': FechaInicio,
            'FechaFin': FechaFin
        }

        oResult = cargar_ajax.run_server_ajax( 'helpers/validar_estudios.php', { 'parametros' :  oParams } );
        console.log( oResult );

        // arrojamos los mensajes de error
        if( oResult.error ){

            let errorResult = '';
            oResult.errores.forEach(function(error){ errorResult += error.mensaje + '<br>' });
            oResult.errores.forEach(function(input){ $("#" + input.campo ).addClass('input-error'); });
            setTimeout(function(){ 
                oResult.errores.forEach(function(input){ $("#" + input.campo ).removeClass('input-error'); });
            }, 3000);
            customAlert( 'error', 'Algo salió mal', errorResult );

        }else{

            // repintar la tabla cada vez y si esta vacia pintar el mensaje donde no hay ningun dato
            arrayEstudiosEmpleado.push( oParams );

            let table = $('#tabla-estudio');
            table.find("tbody tr").remove();
            arrayEstudiosEmpleado.forEach(function(estudio, index){

                htmlOutput = '<tr><td>'+estudio.Escuela+'</td><td>'+estudio.GradoEstudio+'</td>';
                htmlOutput += '<td>'+estudio.FechaInicio+'</td><td>'+estudio.FechaFin+'</td><td>';
                htmlOutput += '<span class="btn btn-danger btn-xs borrar" data-index="'+index+'">X</span></td><tr>';
                table.append( htmlOutput );
            });

            // limpiar campos 
            $('#Escuela').val('');
            $('#GradoEstudio').val('');
            $('#FechaInicio').val('');
            $('#FechaFin').val('');
        }

    });

    // =========================================================================
    // funcion que nos retorna html de opciones dependientes del padre del domicilio
    // =========================================================================
    $("[data-index]").on('click', function(){
        console.log('ok');
    });

    // =========================================================================
    // funcion que nos retorna html de opciones dependientes del padre del domicilio
    // =========================================================================
    function getHtmlOptions( oParams, inputValue ){

        let oResult = cargar_ajax.run_server_ajax( 'helpers/domicilio.php', oParams );

        const final = oResult.catalogo.filter(function(registro){
            if( registro[oResult.filtro] == inputValue ){
                return true;
            }
        });

        let htmlOutput = '<option selected="true" disabled="true">Seleccione...</option>';
        final.forEach(function(value){
            htmlOutput += '<option value="' + value.Id + '">' + value.Descripcion + '</option>';
        });
        return htmlOutput;
    }

    // =========================================================================
    // sweet alert personalizable
    // =========================================================================
    function customAlert( tipo = 'success', titulo = null, texto = null ){
        Swal.fire({
            icon: tipo,
            title: titulo,
            html: texto,
            timer: 2000
        })
    }



});