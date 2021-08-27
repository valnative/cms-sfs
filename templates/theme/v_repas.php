<!-- Модель TODO -->
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		 <h2 class="section-title">Забули пароль?</h2>
	</div>
	<div class="col-md-3"></div>
</div> 
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
	<?php if ($info): ?>
		 <span class="label label-success label-fill">
		 	<?php echo $info ?>
		 </span>	
		<?php else: ?>
		<?php if ($errs): ?>
		 	<?php foreach ($errs as $err): ?>
		 	<span class="label label-danger label-fill"> 
				<?php echo $err ?>
			</span>		
		 	<?php endforeach; ?>
		<?php endif; ?>
	 <?php endif ?>
        <form role="form" id="contact-form" method="post">
			<div class="form-group">
	    		<label for="email">Ваш e-mail</label>
	    		<input type="text" name="email" class="form-control" id="email" value="<?php echo $newUser['email'] ?>" placeholder="Введіть Вашу пошту"/>
	  		</div>
	  		<div class="submit">
	  			<input type="submit" class="btn btn-info btn-fill" value="Відправити" />
	  		</div>
		</form>
	</div>
	<div class="col-md-3"></div>
</div>