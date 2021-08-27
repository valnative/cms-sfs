<!-- Модель TODO -->
<div class="row"">
    <div class="col-md-12">
        <!--Форма для онлайн заповнення звіту ПОТРЕБУЄ доробки-->
        <form role="form" id="order-form" method="post">

                <?php foreach ($orders as $key => $order): ?>
                <div class="col-md-2"><?=$key ?></div>
            <div class="col-md-10">
                    <?php foreach ($order as $key => $value): ?>
                        <div class="form-group">
                            <label><?php echo $value['name'] ?></label>
                            <input type="<?php echo $value['type'] ?>" name="field-<?php echo ($value['type']=='radio' ) ? $value['group']  : $value['id'] ?>" id="field-<?php echo ($value['type']=='radio' ) ? $value['group']  : $value['id'] ?>" class="form-control" />
                        </div>
                    <?php endforeach ?>
            </div>
                <?php endforeach ?>
            <div class="submit">
                <input type="submit" class="btn btn-info btn-fill" value="Відправити" />
            </div>
        </form>

        </div>
    </div>
</div>

