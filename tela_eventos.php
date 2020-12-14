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

use PHPMailer\PHPMailer\PHPMailer;

require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/template/prep.php';
if (!securePage($_SERVER['PHP_SELF'])) {
	die();
}
?>

<?php

$eventos_ativos = $db->query("SELECT * FROM eventos")->results();

if (!empty($_POST['buscar'])) {

	$id_evento = $_POST['select_evento'];
	$contatos = $db->query("SELECT * FROM contato WHERE id_evento = " . $id_evento)->results();
}

if (!empty($_POST['enviar'])) {

	$id_evento = $_POST['select_evento'];
	$contatos = $db->query("SELECT * FROM contato WHERE id_evento = " . $id_evento)->results();
	foreach ($contatos as $contato) {
		
	}
}



$selecionado = 0;

if(!empty($_POST['select_evento'])){
	$selecionado = $id_evento;
}

?>

<br>
<br>
<br>
<br>
<div class="row">
	<div class="col-sm-12">
		<form name="form" method="POST" action="tela_eventos.php" enctype="multipart/form-data">
			<label for="select_evento">Evento</label>

			<select name="select_evento" id="select_evento">
			<option value="0"> Selecione um item </option>

				<?php
				foreach ($eventos_ativos as $event_row) {					
				?>
					<option <?php echo $selecionado == $event_row->id ? 'Selected':'' ?> value="<?= $event_row->id ?>"><?= $event_row->nome . "(" . $event_row->empresa . ")" ?></option>
					
				<?php 
			} 


		
			?>
			</select>
			<input type="submit" name="buscar" value="Mostrar Convidados">

			<input type="submit" name="enviar" value="Enviar Emails">


			<h1>Participantes</h1>

			<table>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
				</tr>
				<?php
				if (!empty($_POST["buscar"])) {

					foreach ($contatos as $contato) {
				?>
						<tr>
							<td><?= $contato->id ?></td>
							<td><?= $contato->nome ?></td>
							<td><?= $contato->email ?></td>
						</tr>
					<?php
					}
				} else if (!empty($_POST["enviar"])) {
					foreach ($contatos as $contato) {
					?>
						<tr>
							<td><?= 'Teste' ?></td>
							<td><?= 'Teste' ?></td>
							<td><?= 'Teste' ?></td>
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