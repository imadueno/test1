// jQUery ready 
$(function(){

    /* inicializar pluggin de Select2 */
    $('#Sexo, #EstadoCivil, #TipoSangre, #Complexion, #Discapacidad, #Pais, #Estado, #Municipio, #Localidad, #Colonia, #GradoEstudio').select2();

    /* Inicializar pluggin de Jquery Mask */
    // mascara para la CURP
    $('#CURP').mask('LLLLNNNNNNLLLLLLAAA', {
        'translation': {
            L: { pattern: /[A-Za-z]/ },
            N: { pattern: /[0-9]/ },
            A: { pattern: /[A-Za-z0-9]/ },
        },
        'placeholder' : "MAGI940123HRSDSR"
    });

    // mascara para el RFC
    $('#RFC').mask('LLLLNNNNNNAAA', {
        'translation': {
            L: {pattern: /[A-Za-z]/},
            N: {pattern: /[0-9]/},
            A: {pattern: /[A-Za-z0-9]/},
        },
        'placeholder' : 'MAGI940123UR4'
    });

    // solo numeros
    $('#NumeroEmpleado, #NumeroPension, #Peso, #Estatura, #CodigoPostal, #NumeroExterior').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    // inicializando air date picker
    $('#FechaNacimiento, #FechaInicio, #FechaFin').datepicker({
        language : 'es'
    });
    // Access instance of plugin
    $('#FechaNacimiento, #FechaInicio, #FechaFin').data('datepicker');

    // evento submit del formulario 
    $('#formulario_empleado').on('submit', (e) => {

        e.preventDefault();
        let aFormulario = $('#formulario_empleado').serializeArray();
        let respuesta   = cargar_ajax.run_server_ajax( 'helpers/validar_empleado.php', aFormulario );
        console.log( respuesta );
    });

    // evento on Change de input.select pais
    $('#Pais').on('change', () => {

        let nombreInput = $('#Pais').attr('name');
        let inputValue  = $('#Pais option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Estado').html( valores );

    });

     // evento on Change de input.select estado
     $('#Estado').on('change', () => {

        let nombreInput = $('#Estado').attr('name');
        let inputValue  = $('#Estado option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Municipio').html( valores );

    });

    // evento on Change de input.select municipio
    $('#Municipio').on('change', () => {

        let nombreInput = $('#Municipio').attr('name');
        let inputValue  = $('#Municipio option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Localidad').html( valores );

    });

    // evento on Change de input.select localidad
    $('#Localidad').on('change', () => {

        let nombreInput = $('#Localidad').attr('name');
        let inputValue  = $('#Localidad option:selected').val();
        valores = getHtmlOptions( { 'catalogo' : nombreInput }, inputValue );
        $('#Colonia').html( valores );

    });

    // funcion que nos retorna html de opciones dependientes del padre del domicilio
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
});