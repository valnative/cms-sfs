<!-- Модель TODO -->
<?php if ($user && $user['id_role']==3): ?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8"><a class="btn btn-success" href="/?c=add_news">Додати новину</a></div>
    <div class="col-md-2"></div>
</div>
<?php endif; ?>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">	
        <div class="table-responsive">
    <table class="table table-striped">
        <tbody>
            <?php $i = 1; ?>

            <?php foreach ($news as $key => $value): ?>
                
            <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td><a href="/?c=article&id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a></td>
                <?php if ($user && $user['id_role']==3): ?>
                <td><a href="/?c=edit&id=<?php echo $value['id'] ?>" rel="tooltip" title="Редагувати" class="btn btn-success btn-simple btn-xs"> <i class="fa fa-edit"></i></a></td>
                <td><a href="/?c=delete&id=<?php echo $value['id'] ?>"rel="tooltip" title="Видалити" class="btn btn-danger btn-simple btn-xs"><i class="fa fa-times"></i></a></td>
                <?php endif; ?>
            </tr>
            <?php $i++ ?>
            <?php endforeach ?>
<!--             <tr>
                <td colspan="5"></td>
                <td class="td-total">
                    Total
                </td>

                <td class="td-price">
                    <small>&euro;</small>12,999
                </td>
            </tr> -->
        </tbody>
    </table>

    </div>
	</div>
	<div class="col-md-2"></div>
</div>
