<html>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div style="font-size: 20px;" class="panel-heading">Ви замовили товар</div>
<?php


                    $n=count($cart);
                    $i=0;

                    foreach($cart->items as $c){

                        ?>
                        <p>Назва</p>
                        <h3><?php print($c['item']['name']);?></h3>
                        <p>Ціна</p>
                        <h3><?php echo print($c['item']['price']);?></h3>
                        <p>Загальна кількість</p>
                        <h3><?php echo print($c['item']['qnt']);?></h3>
                        <p>Загальна Вартість по позиції</p>
                        <h3><?php echo print($c['item']['qnt']*$c['item']['price']);?></h3>
                        <?
                    $i++;
                    }

?>
<h3>Загальна вартість</h3>
{{$cart_total_price}}
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>