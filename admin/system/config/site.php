<div class="content form_create">    

    <article>

        <header>
            <h1>Configurações:</h1>
        </header>

        <?php
        $config = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($config) && $config['SendPostForm']):

            $config['site_cover'] = ( $_FILES['site_cover']['tmp_name'] ? $_FILES['site_cover'] : 'null');

            require '_models/AdminSite.class.php';
            $cadastra = new AdminSite();
            $cadastra->ExeDefault($config);

            if ($cadastra->getError()):
                WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
            endif;

        else:
            $WsSiteConfig = new WsSiteConfig;
            $WsSiteConfig->Execute()->findAll();
            if ($WsSiteConfig->Execute()->getResult()):
                $config = (array) $WsSiteConfig->Execute()->getResult()[0];
            endif;
        endif;
        ?>

        <form name="PostForm" action="" method="Post" enctype="multipart/form-data">

            <label class="label">
                <span class="field">Enviar Logo:</span>
                <input type="file" name="site_cover" class="max"/>
            </label>

            <label class="label">
                <span class="field">Nome do Site:</span>
                <input type="text" name="site_title" value="<?php if (isset($config['site_title'])) echo $config['site_title']; ?>" placeholder="Nome do Site"/>
            </label>

            <label class="label">
                <span class="field">Descrição:</span>
                <textarea class="js_editor" name="site_content" rows="10"><?php if (isset($config['site_content'])) echo htmlspecialchars($config['site_content']); ?></textarea>
            </label>
            
            <div class="label_line">

                <label class="label_small">
                    <span class="field">Template:</span>
                    <select>
                        <option value="null">Selecione um template</option>
                        <option value="default" <?= ($config['site_template'] == 'default' ? 'selected' : '') ?>>Default</option>
                    </select>
                </label>

            </div><!--/line-->

            <input type="submit" class="btn blue" value="Salvar" name="SendPostForm" />
            <a href="painel.php" class="btn default" >VOLTAR</a>
        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->