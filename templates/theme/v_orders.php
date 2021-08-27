<!-- Представлення бланків звітності-->
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">	
        <div class="table-responsive">
    <table class="table table-striped">
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($orders as $key => $value): ?>
                
            <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td><a href="/?c=order&id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach ?>

        </tbody>
    </table>

    </div>
	</div>
	<div class="col-md-2"></div>
</div>

