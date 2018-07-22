(function(){
    $botoes_editar = document.getElementsByClassName("btn_editar");
    $botoes_apagar = document.getElementsByClassName("btn_apagar");
    $form_editar_evento = document.getElementsByClassName("form_editar_evento")[0];
    $campo_id_form = document.getElementsByName("agenda_edita[id]")[0];
    console.log()
    if($botoes_editar.length > 0 ){
        for(var i = 0; i < $botoes_editar.length; i++ ){
            
            $botoes_editar[i].addEventListener("click", function(){
                var id_evento = this.value;
                $campo_id_form.value = id_evento;
                console.log($campo_id_form);
                if($form_editar_evento.style.display == "none"){
                    $form_editar_evento.style.display = "block";
                } 


            });
        }
        
        // $botoes_apagar.addEventListener("onclick", function(){

        // });
    } 
    
}());