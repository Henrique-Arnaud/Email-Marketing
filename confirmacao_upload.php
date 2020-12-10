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
$nome_temporario = $_FILES['lista']['tmp_name'];

$nome_real = $_FILES['lista']['name'];

copy($nome_temporario, $nome_real);

$arquivo = fopen($nome_real, "r");

$header = fgetcsv($arquivo, 1000, ";");

while ($row = fgetcsv($arquivo, 1000, ";")) {
    $usuarios[] = array_combine($header, $row);
}
print_r($usuarios);

fclose($arquivo);


$resultado = $db->query("SELECT * FROM contato WHERE evento like 'treinamento'");

$field = array(
        'id' => '',
        'nome' => 'roberto',
        'email' => 'roberto@gmail.com',
        'evento' => 'financeiro'
);

foreach($usuarios as $usuario){
    $db->insert('contato', $usuario);
}

?>

<div class="row">
    <div class="col-sm-12">
        <input type="submit" onclick="" value="<?php echo $nome_real ?>">
        <p> <?php print_r($resultado) ?> </p>
    </div>
</div>


<?php require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php'; ?>