<?php

// var_dump($_POST);
// var_dump($_GET);

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

if (!empty($_POST)) {
	$id_evento = $_POST['select_evento'];
	// echo "<br><br><br><br><br><br><br>";
	// echo $id_evento;
	// die();
	$contatos = $db->query("SELECT * FROM contato WHERE id_evento = " . $id_evento)->results();

	// dump($contatos);
	// echo "--------------------";

	
}

$eventos_ativos = $db->query("SELECT * FROM eventos")->results();
//  dump($eventos_ativos);
// die();

// echo "SELECT nome FROM contato WHERE evento LIKE '%{$evento}%'";
?>

<br>
<br>
<br>
<br>
<div class="row">
	<div class="col-sm-12">
		<form name="form" method="POST" action="tela_eventos.php" enctype="multipart/form-data">
			<label for="evento">Evento</label>
			<!-- <input type="text" id="evento" name="evento"><br> -->
			<select name="select_evento" id="select_evento">

				<?php
				foreach ($eventos_ativos as $event_row) {
					// echo '1';
					$select = "selected"

				?>

					<option  <?=$select   value="<?= $event_row->id ?>"><?= $event_row->nome . "(" . $event_row->empresa . ")" ?></option>

				<?php } ?>
			</select>

			<input type="submit" value="buscarconvidados">


	<h1>Participantes</h1>

<table>
<?php 
if (!empty($_POST)) {

foreach($contatos as $contato){
?>


	<tr>
		<td><?=$contato->nome?></td>
		<td><?=$contato->id?></td>
		<td><?=$contato->email?></td>
		
	</tr>



<?php 
}
}
?>
</table>

		</form>
	</div>
</div>


<?php require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php'; ?>