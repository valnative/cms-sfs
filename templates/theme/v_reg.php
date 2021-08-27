<!-- Модель TODO -->

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
	<div class="col-md-12">

        <form name="reg" role="form" id="contact-form" method="post" enctype="multipart/form-data" novalidate>
			
			<div class="form-group col-md-12">
				<h2>Дані для реєстрації</h2>
				<legend></legend><!-- Модель TODO -->
	  		</div>			
			<div class="form-group col-md-6">
	    		<label for="login">Логін</label>
	    		<input required type="text" name="login" class="form-control" id="login" value="<?php echo $newUser['login'] ?>" placeholder="Введіть Ваш логін"/>
            </div>
			<div class="form-group col-md-6" ng-class="{ 'has-error' : reg.email.$invalid && !reg.email.$pristine }">
	    		<label for="email">E-mail</label>
	    		<input required ensure-unique="email"  type="text" name="email" class="form-control" id="email" value="<?php echo $newUser['email'] ?>" placeholder="Введіть Вашу пошту"/>

	  		</div>
	  		<div class="form-group">
		  		<div class="col-md-12">
		    		<label for="email">Пароль</label>
		    	</div>
		  		<div class="col-md-6">
		    		<input required type="password" name="password" class="form-control" id="password" placeholder="Введіть Ваш пароль"/>
                </div>
		  		<div class="col-md-6">
		    		<input required ng-model="password_verify" password-verify="password" type="password" name="password_verify" class="form-control" id="password_verify" placeholder="Повторіть Ваш пароль"/>
                </div>
	  		</div>
			<div class="form-group col-md-12">
				<h2>Oсобисті дані</h2>
				<legend></legend>
	  		</div>
<!--            <div class="form-group col-md-12">-->
<!--                <label for="kod">Вкажіть тип особи</label>-->
<!--                <select name="type" id="type">-->
<!--                    <option value="0">Фізична особа</option>-->
<!--                    <option value="1">Юридична особа</option>-->
<!--                </select>-->
<!--            </div>-->
			<div class="form-group col-md-12">
	    		<label for="fam">Ваше прізвище</label>
	    		<input type="text" name="fam"  class="form-control" id="fam" value="<?php echo $newUser['fam'] ?>" placeholder="Введіть Ваше прізвище"/>
	  		</div>
			<div class="form-group col-md-12">
	    		<label for="name">Ваше ім'я</label>
	    		<input type="text" name="name" class="form-control" id="name" value="<?php echo $newUser['name'] ?>" placeholder="Введіть Ваше ім'я"/>
	  		</div>
			<div class="form-group col-md-12">
	    		<label for="otch">Ваше по-батькові</label>
	    		<input type="text" name="otch" class="form-control" id="otch" value="<?php echo $newUser['otch'] ?>" placeholder="Введіть Ваше по-батькові"/>
	  		</div>
            <div class="form-group col-md-12">
                <label for="kod">Індефікаційний код</label>
                <input type="text" name="kod" class="form-control" id="kod" value="<?php echo $newUser['kod'] ?>" placeholder="Введіть Ваш індефікаційний код"/>
            </div>

			 <div class="col-md-12">
		  		<div class="submit">
		  			<input type="submit" class="btn btn-info btn-fill" value="Зареєструватися" />
		  		</div>
	  		</div>
		</form>
	</div>
	<div class="col-md-2"></div>
</div>

