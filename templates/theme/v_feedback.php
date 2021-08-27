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


            <div class="form-group col-md-6">
                <label for="name">Ваше iм'я</label>
                <input required type="text" name="name" class="form-control" id="name" value="<?php echo $newMessage['name'] ?>" placeholder="Введіть Ваше ім'я"/>
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input required ensure-unique="email"  type="text" name="email" class="form-control" id="email" value="<?php echo $newMessage['email'] ?>" placeholder="Введіть Вашу пошту"/>

            </div>

            <div class="form-group col-md-12">
                <label for="them">Тема питання</label>
                <input type="text" name="them"  class="form-control" id="them" value="<?php echo $newMessage['them'] ?>" placeholder="Задайте питання"/>
            </div>
            <div class="form-group col-md-12">
                <label for="message">Ваше питання</label>
                <textarea name="message" class="form-control"><?php echo $newMessage['message'] ?></textarea>
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

