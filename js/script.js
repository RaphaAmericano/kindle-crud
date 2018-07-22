(function(){
    $botoes_editar = document.getElementsByClassName("btn_editar");
    $botoes_apagar = document.getElementsByClassName("btn_apagar");
    $form_editar_evento = document.getElementsByClassName("form_editar_evento")[0];
    $form_apagar_evento = document.getElementsByClassName("form_apagar_evento")[0];
    
    $campo_id_form = document.getElementsByName("agenda_edita[id]")[0];
    $campo_id_apagar_form = document.getElementsByName("apagar_evento[id]")[0];

    if($botoes_editar.length > 0 ){
        var $inputs_editar = document.querySelectorAll('form.form_editar_evento input');
        $inputs_editar = [].slice.call($inputs_editar);
        $inputs_editar.push(document.querySelector('form.form_editar_evento textarea'));
        
        for(var i = 0; i < $botoes_editar.length; i++ ){
            
            $botoes_editar[i].addEventListener("click", function(){

                var $td_pai = this.parentElement.parentElement;
                var valores_input = [];
                for(var k = 0; k < $td_pai.children.length; k++){
                    valores_input.push($td_pai.children[k].textContent);
                }

                $inputs_editar[0].placeholder = valores_input[0];
                $inputs_editar[1].value = valores_input[2].split(' ')[0];
                $inputs_editar[2].value = valores_input[2].split(' ')[1];
                $inputs_editar[6].placeholder = valores_input[1];

                var id_evento = this.value;
                $campo_id_form.value = id_evento;

                if($form_editar_evento.style.display == "none"){
                    $form_editar_evento.style.display = "block";
                } 
            });
        }
    } 
    if($botoes_apagar.length > 0 ){
        for(var i = 0; i < $botoes_apagar.length; i++ ){
            $botoes_apagar[i].addEventListener("click", function(){
                
                var id_evento = this.value;
                $campo_id_apagar_form.value = id_evento;

                if($form_apagar_evento.style.display == "none"){
                    $form_apagar_evento.style.display = "block";
                } 
            });
        }
    }
    
}());