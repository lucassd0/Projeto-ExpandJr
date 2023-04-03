<?php

//Registra o novo menu Informações ExpandJr no painel
add_action( 'admin_menu', 'expandjr_menu');
function expandjr_menu() {
    add_menu_page(
        'Informações da Expand Jr.',
        'Informações da Expand Jr.',
        'manage_options',
        'informacoes-expandjr',
        'expandjr_menu_pagina',
        'dashicons-info-outline',
        -4
    );
}

function expandjr_menu_pagina() {
    ?>
    <div>
        <h1>Cadastrar Informações da Expand Jr.</h1>
        <form action="options.php" method='POST'>
            <?php
            settings_errors();
            settings_fields('expandjr_settings');
            do_settings_sections('informacoes-expandjr');
            submit_button();
            ?>  
        </form>
    </div>
    <?php
}

add_action('admin_menu', 'expandjr_secao');
function expandjr_secao() {
    add_settings_section(
        'expandjr_secao',
        'Cadastro das informações da empresa',
        'expandjr_campos_secao_detalhes',
        'informacoes-expandjr',
        'expandjr_secao'
    );


    add_settings_field(
        'zap_cadastro_telefone',
        'Whatsapp:',
        'zap_cadastro_telefone',
        'informacoes-expandjr',
        'expandjr_secao'
    );
    register_setting(
        'expandjr_settings',
        'zap_cadastro_telefone',
        'verifica_zap'
    );


    add_settings_field(
        'expandjr_telefone',
        'Telefone',
        'expandjr_telefone',
        'informacoes-expandjr',
        'expandjr_secao'
    ); 
    register_setting(
        'expandjr_settings',
        'expandjr_telefone',
        'verifica_telefone'
    );


    add_settings_field(
        'enjr_cadastro_endereco',
        'Endereço:',
        'enjr_cadastro_endereco',
        'informacoes-expandjr',
        'expandjr_secao'
    );
    register_setting(
        'expandjr_settings',
        'enjr_cadastro_endereco',
        'verifica_endereço'
    );

    
    add_settings_field(
        'emjr_cadastro_email',
        'E-mail:',
        'emjr_cadastro_email',
        'informacoes-expandjr',
        'expandjr_secao'
    );
    register_setting(
        'expandjr_settings',
        'emjr_cadastro_email',
        'verifica_email'
    );


    add_settings_field(
        'expandjr_instagram',
        'Link do instagram',
        'expandjr_instagram',
        'informacoes-expandjr',
        'expandjr_secao'
    ); 
    register_setting(
        'expandjr_settings',
        'expandjr_instagram',
        'verifica_instagram'
    );


    add_settings_field(
        'expandjr_linkedin',
        'Link do linkedin',
        'expandjr_linkedin',
        'informacoes-expandjr',
        'expandjr_secao'
    ); 
    register_setting(
        'expandjr_settings',
        'expandjr_linkedin',
        'verifica_linkedin'
    );
}

function expandjr_campos_secao_detalhes() {
    ?>
    <p>Insira os dados da empresa:</p>
    <?php
}

function zap_cadastro_telefone() {
    ?>
     <input type="text"
     name="zap_cadastro_telefone"
     id="zap_cadastro_telefone" 
     value="<?php echo esc_attr(get_option('zap_cadastro_telefone')); ?>"
     required>
    <?php
}

function expandjr_telefone() {
    ?>
    <input type="text" name='expandjr_telefone' id='expandjr_telefone' value='<?php echo esc_attr(get_option('expandjr_telefone')); ?>' >
    <?php
}

function enjr_cadastro_endereco() {
    ?>
    <input type="text"
     name="enjr_cadastro_endereco"
     id="enjr_cadastro_endereco" 
     value="<?php echo esc_attr(get_option('enjr_cadastro_endereco')); ?>"
     required>
    <?php
}

function emjr_cadastro_email() {
    ?>
     <input type="text"
     name="emjr_cadastro_email"
     id="emjr_cadastro_email" 
     value="<?php echo esc_attr(get_option('emjr_cadastro_email')); ?>"
     required>
    <?php
}

function expandjr_instagram() {
    ?>
    <input type="text" name='expandjr_instagram' id='expandjr_instagram' value='<?php echo esc_attr(get_option('expandjr_instagram')); ?>' >
    <?php
}

function expandjr_linkedin() {
    ?>
    <input type="text" name='expandjr_linkedin' id='expandjr_linkedin' value='<?php echo esc_attr(get_option('expandjr_linkedin')); ?>' >
    <?php
}


function verifica_zap($zap) {
    if(empty($zap)){
        $zap = get_option('zap_cadastro_telefone');
        add_settings_error(
            'zap_cadastro_mensagem_de_erro',
            'zap_cadastro_erro_email',
            'O campo Whatsapp não pode ser vazio',
            'error'
        );
    }
    return $zap;
}

function verifica_endereco($endereco)
{
    if(empty($endereco)){
        $endereco = get_option('enjr_cadastro_endereco');
        add_settings_error(
            'enjr_cadastro_mensagem_de_erro',
            'enjr_cadastro_erro_endereco',
            'O campo Endereço não pode ser vazio',
            'error'
        );
    }
    return $endereco;
}

function verifica_email($email)
{
    if(empty($email)){
        $email = get_option('emjr_cadastro_email');
        add_settings_error(
            'emjr_cadastro_mensagem_de_erro',
            'emjr_cadastro_erro_endereco',
            'O campo E-mail não pode ser vazio',
            'error'
        );
    }
    return $email;
}

/* function verifica_telefone($telefone) {
    if(empty($telefone)) {
        $telefone = get_option('expandjr_telefone');
        add_settings_error(
            'expandjr_mensagem_de_erro',  
            'expandjr_erro_telefone',  
            'O campo telefone não pode ser vazio',
            'error'
        );
    };

    return $telefone;
}

function verifica_instagram($instagram) {
    if(empty($instagram)) {
        $instagram = get_option('expandjr_instagram');
        add_settings_error(
            'expandjr_mensagem_de_erro',  
            'expandjr_erro_instagram',  
            'O campo Link do instagram não pode ser vazio',
            'error'
        );
    };

    return $instagram;
}

function verifica_linkedin($linkedin) {
    if(empty($linkedin)) {
        $linkedin = get_option('expandjr_linkedin');
        add_settings_error(
            'expandjr_mensagem_de_erro',  
            'expandjr_erro_linkedin',  
            'O campo Link do linkedin não pode ser vazio',
            'error'
        );
    };

    return $linkedin;
}

function verifica_email($email) {
    if(empty($email)) {
        $email = get_option('expandjr_email');
        add_settings_error(
            'expandjr_mensagem_de_erro',  
            'expandjr_erro_email',  
            'O campo Link do email não pode ser vazio',
            'error'
        );
    };

    return $email;
} */
?>