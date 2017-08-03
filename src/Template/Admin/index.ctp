<div class="contaner">
	<blockquote class="blockquote-success">
	<div class="page-header">
		<div class="bs-callout bs-callout-info" id="callout-glyphicons-location"> <h1>Bienvenido </h1> <p>
			<h2>Su correo es: <?=$this->request->session()->read('Auth.User.email');?></h2></p> 
		</div>

	</div> 
	<div class="panel panel-info">
		<div class="panel-heading">
		    <h3 class="panel-title">Acciones</h3>
		</div>
	  <div class="panel-body">
	        <?php if($users[0]['users_perfile']['id'] == 1): ?>
	        <?= $this->Html->link(__('Nueva Publicacion'), ['controller' => 'Publicaciones','action' => 'add'],['class'=>'btn btn-primary btn-block']) ?>
	        <?php endif; ?>
	        <?= $this->Html->link(__('Listar Publicaciones'), ['controller' => 'Publicaciones','action' => 'index'],['class'=>'btn btn-primary btn-block'],$this->Html->tag('span', ['class'=>'badge'])) ?>
	        <?php if($users[0]['users_perfile']['id'] == 1): ?>
	        <?= $this->Html->link(__('Listar Usuario'), ['controller' => 'Users', 'action' => 'index'],['class'=>'btn btn-primary btn-block']) ?>
	        <?= $this->Html->link(__('Nuevo User'), ['controller' => 'Users', 'action' => 'add'],['class'=>'btn btn-primary btn-block']) ?>
	    <?php endif; ?>
	        <?= $this->Html->link(__('SALIR'), ['controller' => 'Users', 'action' => 'logout'],['class'=>'btn btn-primary btn-block']) ?>
	  </div>
	</div>
		
	</blockquote> 
</div>