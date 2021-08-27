<!-- Модель TODO -->
<!-- collapsable groups row -->
<div class="tim-row" id="collapsable-row">
    <p>
       Якщо Ви не знайдете відповідь на питтання, яке Вас цікавить, Ви можете скористатись <a href="http://cms-sfs/?c=feedback"> формою зворотнього зв'язку</a>
    </p>
    <div id="acordeon">
        <div class="panel-group" id="accordion">
            <?php foreach($news as $val): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-target="#collapse-<?php echo $val['id'] ?>" href="#collapseOne" data-toggle="gsdk-collapse">
                            <?php echo $val['question'] ?>
                        </a>
                    </h4>
                </div>
                <div id="collapse-<?php echo $val['id'] ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php echo $val['answer'] ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div><!--  end acordeon -->
</div>
<!-- end row -->

