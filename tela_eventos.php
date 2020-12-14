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

if (!empty($_POST['evento'])) {
	$evento = $_POST['evento'];
	$contatos = $db->query("SELECT contato.id, contato.nome as contato_nome, eventos.nome as evento_nome, contato.email, eventos.empresa FROM contato inner join eventos on contato.id_evento = eventos.id WHERE eventos.id = ?", [$evento])->results();
}
$lista_eventos = $db->query("SELECT * from eventos")->results();
//primeiro crio um contador para ver em qual loop o foreach chegou
$cont = 0;
//aqui recebo na variavel selecionado o valor de evento (que é o id, consequentemente a posicao na listinha) caso já tenha rolado um sibmit 
if (!empty($_POST['evento'])) {
	$selecionado = $evento;
}
//caso nao tenha tido submit, ele define como 1
else {
	$selecionado = 1;
}
if(!empty($_POST['btn_read'])){
	foreach($lista_eventos as $linha_event){
		if($linha_event->nome == $evento_nome){
			$selecionado = $linha_event->id;
		}
	}
}

?>
<!--<style>

	table, th, tr, td{
		margin: 1%;
		border: 1px solid;
	}

</style>-->

<div class="row">
	<div class="col-sm-12">
		<form method="post">
			<h3></label>Selecione o Evento desejado:</h3>

			<select name="evento" class="custom-select custom-select-lg mb-3">
				<?php foreach ($lista_eventos as $linha_evento) {
					//aqui eu faço o contador rolar e ver em qual verificação do foreach ele está
					$cont++; ?>
					<!--Aqui nesse if eu vejo se o selecionado corresponde ao elemento lido no foreach, caso true eu deixo ele Selecionado -->
					<option <?php if ($selecionado == $cont) {
								echo 'Selected';
							} ?> value="<?php echo $linha_evento->id ?>"><?php echo $linha_evento->nome ?></option>
				<?php } ?>
			</select>

			<input type="submit" value="Selecionar Dados" class="btn btn-dark">

		</form>
		<form method="post">
			<table style="margin-top: 5%;" class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">
							ID
						</th>
						<th scope="col">
							Nome
						</th>
						<th scope="col">
							Email
						</th>
						<th scope="col">
							Evento
						</th>
						<th scope="col">
							Empresa
						</th>
						<th scope="col">
							
						</th>
					</tr>
				</thead>
				<?php
				if (!empty($_POST['evento'])) {
					foreach ($contatos as $contato) { ?>
						<tr>
							<td>
								<?php echo $contato->id ?>
							</td>
							<td>
								<input type="text" name="contato_nome" class="form-control-plaintext" value="<?php echo $contato->contato_nome ?>">
							</td>
							<td>
								<input type="text" name="email" class="form-control-plaintext" value="<?php echo $contato->email ?>">
							</td>
							<td>
								<input type="text" readonly name="evento_nome" class="form-control-plaintext" value="<?php echo $contato->evento_nome ?>">
							</td>
							<td>
								<input type="text" readonly class="form-control-plaintext" value="<?php echo $contato->empresa ?>">
							</td>
							<td>	
								<span class="fa fa-trash btn btn-dark"></span>
							</td>
						</tr>
				<?php }
				}
				?>
			</table>
			<div>
				<input readonly <?php if(!empty($_POST['evento'])) echo 'type="submit"' ?> name="btn_edit" value="Editar Dados" class="btn btn-dark">
			</div>
		</form>
	</div>
</div>


<?php require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php'; ?>