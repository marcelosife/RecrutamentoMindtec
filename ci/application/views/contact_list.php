<?php
$this->load->view('header');
?>
<div id="container" >
	<div class="contant" align="center">
        <div class="row">
            <div class="col-md-12"> 
                <h3>Formas de Contato <?php if(isset($client)){ echo "do Cliente ".$client->RazaoSocial; }?></h3>
                <hr/>
            </div>
		</div>
        <?php if(isset($client)){ ?>
		<div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7 buttons-head">
                        <button type='button' class='btn btn-primary btn-md' ><i class='icon-download-alt'></i><?php echo anchor('contato/cliente/'.$client->IdClinte, 'Contatos'	); ?></button>
                    </div>			
                </div>
            </div>
		</div>		
        <?php } ?>
		<div class="row">
			<div class="col-md-12">
				<?php if(isset($contacts) && sizeof($contacts) > 0){ ?>
				<table class="table table-striped table-condensed table-hover">
				<thead>
					<tr>					
					<th class="id" custom-sort="" order="'id'" sort="sort">Id </th>	
                    <th class="IdClinte" custom-sort="" order="'IdClinte'" sort="sort">Id Cliente</th>				
					<th class="TipoContato" custom-sort="" order="'TipoContato'" sort="sort">Tipo Contato</th>
					<th class="DescContato" custom-sort="" order="'DescContato'" sort="sort">Descrição Contato</th>
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
					<?php foreach( $contacts as $contact){?>
						<tr>
							<td> <?php echo $contact->IdContato; ?> </td>
                            <td> <?php echo $contact->IdClinte; ?> </td>											
							<td> <?php echo $contact->TipoContato; ?> </td>
							<td> <?php echo $contact->DescContato; ?> </td>
							<td> <?php echo( $contact->BolAtivo ?  "Sim":  "Não"); ?> </td>						
							<td class="buttons">						
								<button type='button' class='btn btn-success btn-sm' ><i class='icon-edit'></i><?php echo anchor('contato/'.$contact->IdContato, 'Editar'	); ?></button>
								<button type='button' class='btn btn-danger btn-sm' ><i class='icon-trash'></i><?php echo anchor('contato/excluir/'.$contact->IdContato, 'Excluir'	); ?></button>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				</table>
				<?php 
				}
				else{
					echo "<div class='alert alert-danger'>Sem contatos cadastrados</div>";
				}
				?>			
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer') ?>