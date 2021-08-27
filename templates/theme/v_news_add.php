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

        <form name="edit" role="form" id="edit-form" method="post" enctype="multipart/form-data" novalidate>

            <div class="form-group col-md-12">
                <label for="them">Заголовок новини</label>
                <input type="text" name="title"  class="form-control" id="them"/>
            </div>
            <div class="form-group col-md-12">
                <label for="message">Зміст новини</label>
                <textarea name="desc" class="form-control"></textarea>
            </div>


            <div class="col-md-12">
                <div class="submit">
                    <input type="submit" class="btn btn-info btn-fill" value="Додати" />
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

