var cargar_ajax = {

    run_server_ajax: function(_url, _data = null){

        var json_result = $.ajax({
            url: base_url + _url,
            dataType: "json",
            method: "post",
            async: false,
            type: 'post',
            data: _data, 
            done: function(response) {
                return response;
            }
        }).responseJSON;
        return json_result;
    },

    array_to_obj: function(datos){
        
        var returnArray = {};
        for(var i = 0; i < datos.length; i++){
            returnArray[datos[i]['name']] = datos[i]['value']
        }
        return returnArray;
    }
}