<?php 

if (!isset($_GET['figure'], $_GET['usuario']))
    die("1");
if (file_exists("avatares/" . $_GET['usuario'] . ".png")) {
    unlink("avatares/" . $_GET['usuario'] . ".png");
    recebe_imagem();
    die("2");
}
function recebe_imagem()
{
    $minha_curl = curl_init('//avatar-retro.com/habbo-imaging/avatarimage?figure=' . $_GET['figure'] . '&action=crr=667&direction=1&head_direction=3&gesture=sml&headonly=1');
    $fs_arquivo = fopen("avatares/" . $_GET['usuario'] . ".png", "w");
    curl_setopt($minha_curl, CURLOPT_FILE, $fs_arquivo);
    curl_setopt($minha_curl, CURLOPT_HEADER, 0);
    curl_exec($minha_curl);
    curl_close($minha_curl);
    fclose($fs_arquivo);
}
recebe_imagem();
die("2");
?>