<?php use MapasCulturais\i; ?>
<script>
     $(document).ready(function () {
        $("#meuTextarea").on("keyup", function() {
        var texto = $(this).val(); // Obtém o valor do textarea
        console.log("Caractere digitado: " + texto.slice(-1)); // Captura o último caractere digitado
            if(texto.slice(-1) == '')
            {
                console.log('nao tem valor')
            }
        });
    });
</script>
<?php $this->applyTemplateHook('tabs','before'); ?>
<ul class="abas clearfix">
    <li class="active">
        <a href="#diligence-principal" rel="noopener noreferrer" onclick="showRegistration()"
         id="tab-main-content-diligence-principal">Ficha</a>
    </li>
    <li class="">
        <a href="#diligence-diligence" rel="noopener noreferrer" onclick="hideRegistration()" id="tab-main-content-diligence-diligence">Diligência</a>
    </li>
</ul>
<div class="tabs-content">
    <div id="diligence-principal">
        <h2>Ficha</h2>
    </div>
    <div id="diligence-diligence">
        <label>
            <strong>Diligência ao proponente</strong>
        </label>
        <div style="" class="div-diligence">
            <p style="">
                A sua Diligência ainda não foi enviada
            </p>
        </div>
        <div>
            <textarea name="" id="meuTextarea" cols="30" rows="10"
                placeholder="Escreva aqui a sua diligência"
                class="diligence-context-open"
            ></textarea>
        </div>
        <div style="" class="div-btn-send-diligence">
            <button class="btn-send-diligence">Enviar
            <i class="fas fa-paper-plane"></i>
            </button>
        </div>
        <script>
            function hideRegistration() {
                $("#registration-content-all").hide();
            }
            function showRegistration() {
                $("#registration-content-all").show();
            }
           
        </script>
    </div>
</div>
<?php $this->applyTemplateHook('tabs','after'); ?>