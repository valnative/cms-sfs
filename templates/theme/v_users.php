<!-- Модель TODO -->
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">	
        <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Пользователь</th><!-- Модель TODO что єто-->
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $key => $value): ?>
                
            <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td><?php echo $value['login'] ?></td>
                <td><?php echo $value['mail'] ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach ?>
        </tbody>
    </table>

    </div>
	</div>
	<div class="col-md-2"></div>
</div>
