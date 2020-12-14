<?php
/*
UserSpice 5
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/template/prep.php';
if (!securePage($_SERVER['PHP_SELF'])) {
    die();
}
?>

<?php

if (!empty($_FILES['lista'])) {
    $nome_temporario = $_FILES['lista']['tmp_name'];

    $nome_real = $_FILES['lista']['name'];

    if(move_uploaded_file($nome_temporario, $nome_real)){
        echo '<div class="alert alert-success" role="alert">
        Lista enviada com sucesso!
      </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        Lista não enviada!
      </div>';
    }

    $arquivo = fopen($nome_real, "r");

    $header = fgetcsv($arquivo, 1000, ";");

    while ($row = fgetcsv($arquivo, 1000, ";")) {

        $usuarios[] = array_combine($header, $row);
    }

    foreach ($usuarios as $usuario) {
        if (filter_var($usuario['nome'], FILTER_VALIDATE_EMAIL)) {
            $aux = $usuario['nome'];
            $usuario['nome'] = $usuario['email'];
            $usuario['email'] = $aux;
        }
        $db->insert('contato', $usuario);
    }

    fclose($arquivo);

}
?>

<div class="row">
    <div class="col">
        <h2 class="custom-form">Insira uma lista que contenha os dados dos contatos: </h2>
        <form style="margin: 3%;" action="tela_upload_lista.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="lista" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02">Escolha o arquivo da lista</label>
                </div>
                <div class="input-group-append">
                    <input type="submit" value="Fazer Upload" class="input-group-text">
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php'; ?>