<?
// Bloqueia acesso direto ao wp-login.php
function bloquear_wp_login_padrao() {
    if (strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
        wp_redirect(home_url('/acesso-diferente'));
        exit;
    }
}
add_action('init', 'bloquear_wp_login_padrao');

// Cria nova rota de login
function login_personalizado() {
    if (trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') === 'acesso-diferente') {
        require_once ABSPATH . 'wp-login.php';
        exit;
    }
}
add_action('init', 'login_personalizado');
?>
