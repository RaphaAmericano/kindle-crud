(function(){
    $botoes_editar = document.getElementsByClassName("btn_editar");
    $botoes_apagar = document.getElementsByClassName("btn_apagar");
    $form_editar_evento = document.getElementsByClassName("form_editar_evento")[0];
    $form_apagar_evento = document.getElementsByClassName("form_apagar_evento")[0];
    
    
    $campo_id_form = document.getElementsByName("agenda_edita[id]")[0];
    $campo_id_apagar_form = document.getElementsByName("apagar_evento[id]")[0];

    //Botões Editar
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
    //Botões apagar
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
    // Formulario cadastro
    $form_cadastro_usuario = document.getElementsByTagName('form')[0];
    $form_cadastro_usuario.addEventListener('submit', function(e){
        var nome = $form_cadastro_usuario.getElementsByTagName('input')[0].value;
        var email = $form_cadastro_usuario.getElementsByTagName('input')[1].value;
        var telefone = $form_cadastro_usuario.getElementsByTagName('input')[2].value;
        var descricao = $form_cadastro_usuario.getElementsByTagName('textarea')[0].value;

        if(nome == ""){
            e.preventDefault();    
            alert("Nome Invalido");
        }

        if(descricao == ""){
            e.preventDefault();    
            alert("Descricao Invalida");
        }

        if(validar_email(email) == false ){
            e.preventDefault();    
            alert("Email Invalido");
        }

        if(telefone == "" || telefone.match(/[a-z]/i) || telefone.match(/[!@#$%^&*(),.?":{}|<>]/g) ){
            e.preventDefault();    
            alert("Telefone invalido");
        }

    }); 

    //validacao de novo evento
    $form_novo_evento = document.getElementsByClassName("form_novo_evento")[0];
    $form_novo_evento.addEventListener('submit', function(e){
        var nome = $form_novo_evento.getElementsByTagName('input')[0].value;
        var dia = $form_novo_evento.getElementsByTagName('input')[1].value;
        var horario = $form_novo_evento.getElementsByTagName('input')[2].value;
        var descricao = $form_novo_evento.getElementsByTagName('textarea')[0].value;

        if(nome == ""){
            e.preventDefault();    
            alert("Nome Invalido");
        }

        if(descricao == ""){
            e.preventDefault();    
            alert("Descricao Invalida");
        }

        if(dia == ""){
            e.preventDefault();    
            alert("Dia é obrigatório");
        }

        if(horario == ""){
            e.preventDefault();    
            alert("Horário obrigatório");
        }
    });

    //funcoes de validacao
    function validar_email(valor){
        var re = /^([A-Za-z0-9_\-.+])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,})$/;
        return re.test(String(valor).toLowerCase());
    }


}());