<?php
$this->load->view('header');
?>
<div id="container" >
	<div class="contant" align="center">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default"> 
            <div class="panel-heading">
                <h3 class="panel-title">Edição de Cliente</h3>
            </div>
            <div class="panel-body">
            <?php if( validation_errors()){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class='alert alert-danger'><?php echo validation_errors(); ?></div>
                    </div>
                </div>
                <?php } 
                echo form_open();                 ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_label('Razão Social:', 'RazaoSocial', array('class'=>'label')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_input('RazaoSocial', set_value('RazaoSocial', $client->RazaoSocial), array('class'=>'input-text') ); ?>
                            </div>
                        </div>
                    </div>            			
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_label('Ativo:', 'BolAtivo', array('class'=>'label')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_radio('BolAtivo',1, set_radio('BolAtivo', 1, ($client->BolAtivo==1)), 'sim' ); ?>Sim
                                <?php echo form_radio('BolAtivo',0, set_radio('BolAtivo', 0, ($client->BolAtivo==0)),  'nao' ); ?>Não
                            </div>
                        </div>
                    </div>            			
                </div>
                <div class="row">
                    <div class="col-md-12 buttons">
                        <?php echo form_submit('Enviar', 'Salvar Cliente', array('class'=>'btn btn-default')); 
                            echo form_close();
                        ?>
                    </div>
                </div>
            </div>
            </div>
		</div>		
	</div>
</div>
<?php $this->load->view('footer') ?>