<section class="section" id="contato">
    <div class="container">

        <h1>Fale Conosco</h1>
        
        <div class="row">
            <div class="col-md-12">
                <?php
                $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if (!empty($Contato) && $Contato['SendFormContato']):
                    unset($Contato['SendFormContato']);

                    $Contato['Assunto'] = MAILASSUNTO;
                    $Contato['DestinoNome'] = MAILNAME;
                    $Contato['DestinoEmail'] = MAILDESTINO;
                    $SendMail = new Email;
                    $SendMail->Enviar($Contato);
                    if ($SendMail->getError()):
                        WSErro($SendMail->getError()[0], $SendMail->getError()[1]);
                    endif;
                endif;
                ?>
                <form name="SendFormContato" action="#contato" method="post">
                    <div class="form-group">
                        <label class="control-label" >Nome (obrigatório)</label>
                        <input class="form-control" placeholder="Digite seu nome"
                               type="text" title="Informe seu nome" name="RemetenteNome" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Email (obrigatório)</label>
                        <input class="form-control" placeholder="Digite seu email"
                               type="email" title="Informe seu e-mail" name="RemetenteEmail" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Assunto</label>
                        <input type="email" class="form-control" name="Assunto" placeholder="Assunto da mensagem">
                    </div>
                    <div class="form-group">
                        <label class="control-label" >Mensagem</label>
                        <textarea class="form-control" placeholder="Digite sua mensagem" 
                                  title="Envie sua mensagem" name="Mensagem" required rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-block btn-info" name="SendFormContato" value="enviar">ENVIAR MENSAGEM</button>
                </form>            
            </div>
        </div>
    </div>
</section>