<!-- Представлення відправка звітів-->
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

            <div class="form-group col-md-6">
                <label for="login">Завантажте файл</label>
                <input required type="file" name="file" class="form-control" id="file"/>
            </div>

            <div class="col-md-12">
                <div class="submit">
                    <input type="submit" class="btn btn-info btn-fill" value="Надіслати" />
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

