$(function(){

    // document ready
    const jsonFile = document.querySelector('#jsonfile');
    if(typeof jsonFile.innerHTML == "string" && jsonFile.innerHTML.length > 50 ){
        const jsonFinal = JSON.parse(jsonFile.innerHTML);

        console.log(jsonFinal);

        let generales   = jsonFinal.generales;
        let adicionales = jsonFinal.adicionales;
        let domicilio   = jsonFinal.domicilio;
        let estudio     = jsonFinal.estudios;

        console.log(estudio);

        // agregar campos a apartado generales
        strGenerales  = nuevoCampo('Apellido Paterno', generales.ApellidoPaterno );
        strGenerales += nuevoCampo('Apellido Materno', generales.ApellidoMaterno );
        strGenerales += nuevoCampo('Nombre', generales.Nombre );
        strGenerales += nuevoCampo('Sexo', generales.Sexo );
        strGenerales += nuevoCampo('Fecha de Nacimiento', generales.FechaNacimiento );
        strGenerales += nuevoCampo('Numero de Empleado', generales.NumeroEmpleado );
        strGenerales += nuevoCampo('Numero de Pension', generales.NumeroPension );
        $('#generales').append( strGenerales );

        // agregar campos adicionales 
        strAdicional  = nuevoCampo('CURP', adicionales.CURP.toUpperCase() );
        strAdicional += nuevoCampo('RFC', adicionales.RFC.toUpperCase() );
        strAdicional += nuevoCampo('Estado Civil', adicionales.EstadoCivil );
        strAdicional += nuevoCampo('Tipo de Sangre', adicionales.TipoSangre );
        strAdicional += nuevoCampo('Estatura', adicionales.Estatura );
        strAdicional += nuevoCampo('Peso', adicionales.Peso );
        strAdicional += nuevoCampo('Complexion', adicionales.Complexion );
        strAdicional += nuevoCampo('Discapacidad', adicionales.Discapacidad );
        $('#adicionales').append( strAdicional );

        strDomicilio  = nuevoCampo('Pais', domicilio.Pais );
        strDomicilio += nuevoCampo('Localidad', domicilio.Estado );
        strDomicilio += nuevoCampo('Colonia', domicilio.CodigoPostal );
        strDomicilio += nuevoCampo('TipoVialidad', domicilio.TipoVialidad );
        strDomicilio += nuevoCampo('NombreVialidad', domicilio.NombreVialidad );
        strDomicilio += nuevoCampo('NumeroExterior', domicilio.NumeroExterior );
        strDomicilio += nuevoCampo('NumeroInterior', domicilio.NumeroInterior );
        $('#domicilio').append( strDomicilio );

        let newRow = '';
        for(let f = 0; f < estudio.length; f++){
            newRow += '<tr><td>' + estudio[f].Escuela.toUpperCase() + '</td>';
            newRow += '<td>' + estudio[f].GradoEstudio + '</td>';
            newRow += '<td>' + estudio[f].FechaInicio + '</td>';
            newRow += '<td>' + estudio[f].FechaFin + '</td></tr>';
        }

        $('#estudios').append(newRow);
        
        // let generales = nuevoCampo( jsonFinal.generales );
    }


    function nuevoCampo( nombre, valor ){
        let output = '';
        output = '<div class="flex-item"><p class="mr-1">' + nombre + '</p>';
        output += '<p><strong>' + valor + '</strong></p></div>';
        return output;
    }

    function nuevoCampoEscuela( item ){
        let output = '';
        output += '<tr><td>'+ item.Escuela +'</td><td>'+ item.GradoEstudio +'</td>';
        output += '<td>'+ item.FechaInicio +'</td><td>'+ item.FechaFin +'</td></tr>';
        return output;
    }
});