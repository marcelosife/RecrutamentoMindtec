<?php
$this->load->view('header');
?>
<div id="container" >
	<div class="contant" align="center">
		<div class="row">
            <div class="col-md-12">
                <h3>Lista de Clientes</h3>
				<hr>
            </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div  class="btn btn-primary btn-md" ><a href="<?php echo base_url('cliente');?>"><i class="icon-download-alt"></i>&nbsp;Novo Cliente</a></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if(isset($clients) && sizeof($clients) > 0){ ?>
				<table class="table table-striped table-condensed table-hover">
				<thead>
					<tr>					
					<th class="id" >Id </th>
					<th class="RazaoSocial" >Razão Social </th>
					<th class="DataCadastro" >Data Cadastro</th>
					<th class="BolAtivo" >Ativo</th>
					<th ></th>
					</tr>
				</thead>							
				<tbody>
					<?php foreach( $clients as $client){?>
						<tr>				
							<td> <?php echo $client->IdCliente; ?> </td>
							<td> <?php echo $client->RazaoSocial; ?> </td>
							<td> <?php echo date_format(date_create($client->DataCadastro),"d/m/Y H:i:s"); ?> </td>
							<td> <?php echo( $client->BolAtivo ?  "Sim":  "Não"); ?> </td>						
							<td class="buttons">						
								<div  class='btn btn-success btn-sm' ><i class='icon-edit'></i><?php echo anchor('cliente/'.$client->IdCliente, 'Editar'	); ?></div>
								<button onclick="deleteClient(<?php echo $client->IdCliente; ?>)" class='btn btn-danger btn-sm' ><i class='icon-trash'></i>Excluir</button>
								<div  class='btn btn-primary btn-sm' ><i class='glyphicon glyphicon-envelope'></i><?php echo anchor('contatos/cliente/'.$client->IdCliente, 'Contatos'	); ?></div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				</table>
				<?php 
				}
				else{
					echo "<div class='alert alert-danger'>Sem clientes cadastrados</div>";
				}
				?>			
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer') ?>