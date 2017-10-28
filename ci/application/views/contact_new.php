<?php
$this->load->view('header');
?>
<div id="container" >
	<div class="contant" align="center">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-success"> 
            <div class="panel-heading">
                <h3 class="panel-title">Cadastro de Contatos</h3>
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
                    <div class="col-md-3" style="text-align: right;">
                        <?php echo form_label('Tipo:', 'labelTipoContato', array('class'=>'label')); ?>
                    </div>
                    <div class="col-md-9">
                        <?php echo form_input('TipoContato', set_value('TipoContato'), array('class'=>'input-text') ); ?>
                    </div>            			
                </div>
                <div class="row">
                    <div class="col-md-3" style="text-align: right;">
                        <?php echo form_label('Descrição:', 'labelDescContato', array('class'=>'label')); ?>
                    </div>
                    <div class="col-md-9">
                        <?php echo form_input('DescContato', set_value('DescContato'), array('class'=>'input-text') ); ?>
                    </div>            			
                </div>
                <div class="row">
                    <div class="col-md-12 buttons">
                        <?php echo form_submit('Enviar', 'Salvar Contato', array('class'=>'btn btn-default')); 
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