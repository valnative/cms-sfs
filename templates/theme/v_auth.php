<!-- Модель TODO -->
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<h2 class="section-title">Вхід</h2>
	</div>
	<div class="col-md-3"></div>
</div>
<?php if ($errs): ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php foreach ($errs as $err): ?>
                <span class="label label-danger label-fill">
			<?php echo $err ?>
		</span>
            <?php endforeach; ?>
        </div>
        <div class="col-md-3"></div>
    </div>
<?php endif; ?>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
        <form role="form" id="contact-form" method="post">
			<div class="form-group">
	    		<label for="name">Ваш логін</label>
	    		<input type="text" name="login" class="form-control" id="login" placeholder="Введіть Ваш логін"/>
	  		</div>
	  		<div class="form-group">
	    		<label for="email">Ваш пароль</label>
	    		<input type="password" name="password" class="form-control" id="password" placeholder="Введіть Ваш пароль"/>
	  		</div>
	  		<div class="submit">
	  			<div class="col-sm-6">	  				
	  				<input type="submit" class="btn btn-info btn-fill" value="Увійти" />
	  			</div>
	  			<div class="col-sm-6">	  				
		  			<label class="checkbox" for="checkbox">
	                    <span class="icons"><span class="first-icon fa fa-square-o"></span>
	                    <span class="second-icon fa fa-check-square-o"></span></span>
	                    <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
	                    <?php echo "Запам'ятати мене" ?>
	                </label>
	  			</div>
	  		</div>
		</form>
		<a href="/repas">Натисніть для відновлення</a>
	</div>
	<div class="col-md-3"></div>
</div>


