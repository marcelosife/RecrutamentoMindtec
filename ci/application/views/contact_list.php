<?php
$this->load->view('header');
?>
<div id="container" >
	<div class="contant" align="center">
        <div class="row">
            <div class="col-md-12"> 
                <h3>Formas de Contato <?php if(isset($client)){ echo "do Cliente <b>$client->RazaoSocial</b>"; }?></h3>
                <hr/>
            </div>
		</div>
        <?php if(isset($client)){ ?>
		<div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-7 buttons-head">
                        <div  class='btn btn-primary btn-md' ><i class='icon-download-alt'></i><?php echo anchor('contato/cliente/'.$client->IdCliente, 'Novo Contato'	); ?></div>
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
					<th class="id" >Id Contato</th>	
					<?php if(isset($contacts[0]->RazaoSocial)){
						echo"<th class='IdCliente' >Cliente</th>";
						} ?>								
					<th class="TipoContato" >Tipo Contato</th>
					<th class="DescContato" >Descrição Contato</th>
					<th class="BolAtivo" >Ativo</th>
					<th ></th>
					</tr>
				</thead>						
				<tbody>
					<?php foreach( $contacts as $contact){?>
						<tr>
							<td> <?php echo $contact->IdContato; ?> </td>
							<?php if(isset($contact->RazaoSocial)){
								echo "<td> $contact->RazaoSocial </td>";
							}?>											
							<td> <?php echo $contact->TipoContato; ?> </td>
							<td> <?php echo $contact->DescContato; ?> </td>
							<td> <?php echo( $contact->BolAtivo ?  "Sim":  "Não"); ?> </td>						
							<td class="buttons">						
								<div type='button' class='btn btn-success btn-sm' ><i class='icon-edit'></i><?php echo anchor('contato/'.$contact->IdContato, 'Editar'	); ?></div>
								<div type='button' class='btn btn-danger btn-sm' ><i class='icon-trash'></i><?php echo anchor('contato/excluir/'.$contact->IdContato, 'Excluir'	); ?></div>
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