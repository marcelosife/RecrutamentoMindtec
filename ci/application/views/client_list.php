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
				<button type="button" class="btn btn-primary btn-md" ><a href="<?php echo base_url('cliente');?>"><i class="icon-download-alt"></i>&nbsp;Novo Cliente</a></button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if(isset($clients) && sizeof($clients) > 0){ ?>
				<table class="table table-striped table-condensed table-hover">
				<thead>
					<tr>					
					<th class="id" custom-sort="" order="'id'" sort="sort">Id </th>
					<th class="RazaoSocial" custom-sort="" order="'firstName'" sort="sort">Razão Social </th>
					<th class="DataCadastro" custom-sort="" order="'lastName'" sort="sort">Data Cadastro</th>
					<th class="BolAtivo" custom-sort="" order="'country'" sort="sort">Ativo</th>
					<th ></th>
					</tr>
				</thead>
				<tfoot>
					<tr>					
					<td colspan="5">
						<nav aria-label="Page navigation">
						<ul class="pagination pull-right">
							<li class="page-item" >
							<a href="" class="page-link" ng-click="prevPage()">« Prev</a>
							</li>
							<li class="page-item" ng-repeat="n in range(pagedItems.length, currentPage, currentPage + gap) " ng-class="{active: n == currentPage}" ng-click="setPage()">
							<a href="" class="page-link" ng-bind="n + 1">1</a>
							</li>
							<li class="page-item" ng-class="{disabled: (currentPage) == pagedItems.length - 1}">
							<a href="" class="page-link" ng-click="nextPage()">Next »</a>
							</li>
						</ul>
						</nav>
					</td>
					</tr>
				</tfoot>				
				<tbody>
					<?php foreach( $clients as $client){?>
						<tr>				
							<td> <?php echo $client->IdClinte; ?> </td>
							<td> <?php echo $client->RazaoSocial; ?> </td>
							<td> <?php echo date_format(date_create($client->DataCadastro),"d/m/Y H:i:s"); ?> </td>
							<td> <?php echo( $client->BolAtivo ?  "Sim":  "Não"); ?> </td>						
							<td class="buttons">						
								<button type='button' class='btn btn-success btn-sm' ><i class='icon-edit'></i><?php echo anchor('cliente/'.$client->IdClinte, 'Editar'	); ?></button>
								<button type='button' class='btn btn-danger btn-sm' ><i class='icon-trash'></i><?php echo anchor('cliente/excluir/'.$client->IdClinte, 'Excluir'	); ?></button>
								<button type='button' class='btn btn-primary btn-sm' ><i class='glyphicon glyphicon-envelope'></i><?php echo anchor('contatos/cliente/'.$client->IdClinte, 'Contatos'	); ?></button>
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