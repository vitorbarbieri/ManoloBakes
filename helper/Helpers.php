<?php

// Retornar a URL do projeto
function base_url()
{
    return BASE_URL;
}

// Retorna a URL da pasta  /assets
function media()
{
    return BASE_URL . "/assets";
}

// Exibe o Header
function headerAdmin($data = "")
{
    $view_header = "./view/partials/HeaderAdmin.php";
    require_once($view_header);
}

// Exibe o Nav
function navAdmin($data = "")
{
    $view_nav = "./view/partials/NavAdmin.php";
    require_once($view_nav);
}

// Exibe o Footer
function footerAdmin($data = "")
{
    $view_footer = "./view/partials/FooterAdmin.php";
    require_once($view_footer);
}

// Mosta a informação formatada
function dep($data)
{
    $format  = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}

// Exibe o Modal
function getModal(string $nameModal, $data)
{
    $view_modal = "./view/partials/modals/{$nameModal}.php";
    require_once($view_modal);
}

// Envio de e-mail
function sendEmail($data, $template)
{
    $assunto = $data['assunto'];
    $emailDestino = $data['email'];
    $empresa = NOME_REMETENTE;
    $remetente = EMAIL_REMETENTE;
    //ENVIO DE CORREO
    $de = "MIME-Version: 1.0\r\n";
    $de .= "Content-type: text/html; charset=UTF-8\r\n";
    $de .= "From: {$empresa} <{$remetente}>\r\n";
    ob_start();
    require_once("view/partials/email/" . $template . ".php");
    $menssagem = ob_get_clean();
    // $send = mail($emailDestino, $assunto, $menssagem, $de);
    $send = true;
    return $send;
}

// Extrair as permissoes do modulo
function GetPermissoes(int $idModulo)
{
    require_once("model/PermissaoModel.php");
    $objPermissoes = new PermissaoModel();
    $idCargo = $_SESSION['userData']['id_cargo'];
    $arrPermissoes = $objPermissoes->PermissoesModulo($idCargo);
    $permissoes = "";
    $permissoesModulos = "";

    if (count($arrPermissoes) > 0) {
        $permissoes = $arrPermissoes;
        $permissoesModulos = isset($arrPermissoes[$idModulo]) ? $arrPermissoes[$idModulo] : "";
    }

    $_SESSION['permissoes'] = $permissoes;
    $_SESSION['permissoesModulos'] = $permissoesModulos;
}

function sessionUser(int $id)
{
    require_once("model/LoginModel.php");
    $objLogin = new LoginModel();
    $request = $objLogin->sessionLogin($id);
    return $request;
}

// Limpa string
function strClean($strCadena)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); // Elimina las \ invertidas
    $string = str_ireplace("<script>", "", $string);
    $string = str_ireplace("</script>", "", $string);
    $string = str_ireplace("<script src>", "", $string);
    $string = str_ireplace("<script type=>", "", $string);
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR '1'='1", "", $string);
    $string = str_ireplace('OR "1"="1"', "", $string);
    $string = str_ireplace('OR ´1´=´1´', "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("LIKE '", "", $string);
    $string = str_ireplace('LIKE "', "", $string);
    $string = str_ireplace("LIKE ´", "", $string);
    $string = str_ireplace("OR 'a'='a", "", $string);
    $string = str_ireplace('OR "a"="a', "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("OR ´a´=´a", "", $string);
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    return $string;
}

// Gera senha de 10 caracteres
function passGenerator($length = 10)
{
    $pass = "";
    $longitudPass = $length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena = strlen($cadena);

    for ($i = 1; $i <= $longitudPass; $i++) {
        $pos = rand(0, $longitudCadena - 1);
        $pass .= substr($cadena, $pos, 1);
    }
    return $pass;
}

// Gera token
function token()
{
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));
    $token = $r1 . '-' . $r2 . '-' . $r3 . '-' . $r4;
    return $token;
}

// Formato para valor monetário
function formatMoney($cantidad)
{
    $cantidad = number_format($cantidad, 2, SPD, SPM);
    return $cantidad;
}
