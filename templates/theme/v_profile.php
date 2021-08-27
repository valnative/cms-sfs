<!-- Модель TODO -->
 <div class="row">
	<div class="col-md-4">
		 <div class="card card-user">
		    <div class="image">		        
		    </div>
		    <div class="content">
		        <div class="author">
		            <img class="avatar border-gray" src="/templates/theme/assets/uploads/<?php echo 'default-avatar.png' ?>" alt="...">
		              <h4 class="title"><?=$user['fam'] ?><br>
		                 <small>
		                 	<?=$user['name'] ?>
		                 	<?=$user['otch'] ?>
		                 </small>
		              </h4> 
		            </a>
		        </div>  
		        <p class="description text-center">

		        	<?php if ($user['kod']): ?>
		        	<?php echo $user['kod'].'</br>'; ?>
		        	<?php endif ?> 
                    <?=$user['city'] ?>
                    <?=$user['address'] ?><br>
                    <?=$user['mail'] ?> <br>

		        </p>
		    </div>
		    <hr>
		</div>
	</div>
	<div class="col-md-8">
		<h4 class="title">Моя звітність</h4>
		<?php if ($jobs): ?>
			
		<div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center"><?php echo ($lan=='ru') ? "Компания" : "Компанія" ?></th><!-- Модель TODO -вияснити що це та видалити все зайве-->
                    <th class="text-center"><?php echo ($lan=='ru') ? "Должность" : "Посада" ?></th>
                    <th class="text-center"><?php echo ($lan=='ru') ? "Обязанности" : "Обов'язки" ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $key => $job): ?>
                	
                <tr>
                    <td class="text-center"><?php echo $key + 1 ?></td>
                    <td class="text-center"><?php echo $job['company'] ?></td>
                    <td class="text-center"><?php echo $job['job'] ?></td>
                    <td class="text-center"><?php echo $job['other'] ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>   
	    <?php else: ?>
		<div><?php echo ($lan=='ru') ? "Нет" : "Немає" ?></div>
		<?php endif ?>
		<h4 class="title">Мої запити</h4>
		<?php if ($contacts): ?>

		<div class="table-responsive">
			<table class="table">
	        <?php foreach ($contactGroups as $key => $group): ?>
				<tr>
                    <td><strong><?php echo $group['name'] ?>:</strong></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php foreach ($contacts as $k => $contact): ?>
                <?php if ($contact['gr'] == $key): ?>
                <tr>
                    <td></td>
                    <td><?php echo $contactGroups[$key]['val'][$contact['type']] ?></td>
                    <td><?php echo $contact['var'] ?></td>
                </tr>
                <?php endif ?>
                <?php endforeach ?>
	        <?php endforeach ?>
			</table>
        </div>
	    <?php else: ?>
		<div><?php echo ($lan=='ru') ? "Нет" : "Немає" ?></div>
		<?php endif ?>
		</div>
	</div>
