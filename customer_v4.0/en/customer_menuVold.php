<?php
    @include('connect.php');

//suppose the category id for beer is 0
$sql = "SELECT * FROM beverage";
$result=mysqli_query($conn, $sql);


//create temp table for order list
$sqll="CREATE TABLE temp (b_id INT(6), quantity INT(6))";
$sqll3="SELECT * FROM temp WHERE 1";
//if no table, creat one
if(!mysqli_query($conn, $sqll3)) $result1=mysqli_query($conn, $sqll);
$sqll2 = "SELECT * FROM temp";
$result1=mysqli_query($conn, $sqll2);

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Customer Menu</title>

        <!-- load customer style sheet -->
        <link rel="stylesheet" type="text/css" href="customer_test.css">
        <!--load jQuery for DnD-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    </head>

    <body class="customer_menu_body">

        <div class="customer_header">
            <img class="customer_language" src="../Images/language_icon.png" alt="Change Language">

        </div>

        <div>
            <div class="customer_row">
                <!--left part of the web:menu-->
                <div class="customer_col_70">
                    <div class="customer_menu_left">
                        <div class="customer_menu_left_header">

                            <span class="customer_menu_h1">Beer Menu</span>
                            <a href="#"><button class="customer_menu_sub_header">Beer</button></a>
                            <a href="#"><button class="customer_menu_sub_header">Wine</button></a>
                            <a href="#"><button class="customer_menu_sub_header">Other</button></a>
                        </div>
                        <!--Menu table-->

                        <!--show selected data-->
                        <?php
                            while ($row = mysqli_fetch_array($result))
                            {
                                $B_id=$row['B_id'];
                                //$add="INSERT INTO temp ('b_id') VALUES(".$B_id.")";
                                $name=$row['b_name'];
                                $price=$row['price(sell)'];
                                $produce=$row['producer'];
                                $alcohol=$row['Alcohol level'];
                                $k=$row['kosher'];

                                if($k==0) $kosher='No';
                                else $kosher='Yes';
                            ?>

                            <!--insert data-->
                            <div class="product_drag customer_menu_item_name" data-id="<?php echo $B_id;?>" data-quantity="1" style="cursor:move,overflow:hidden">
                                <div class="no-select" draggable="true">
                                <h1>
                                    <img src="../Images/create_icon.png">
                                    <?php echo $name;?>
                                </h1>
                                </div>
                                <table class="customer_menu_table">

                                    <tr>
                                        <td colspan="2"></td>
                                        <td rowspan="5">
                                            <?php echo $price; ?>kr</td>
                                    </tr>
                                    <tr>
                                        <td>Produce</td>
                                        <td>
                                            <?php echo $produce; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alcohol content</td>
                                        <td>
                                            <?php echo $alcohol; ?>%</td>
                                    </tr>
                                    <tr>
                                        <td>Kosher</td>
                                        <td>
                                            <?php echo $kosher; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Serving size</td>
                                        <td>1 Bottel</td>
                                    </tr>
                                </table>
                            </div>
                            <?php } ?>
                            <!--end insert data-->

                    </div>
                </div>

                <!--right part of the web:order list-->
                <div class="customer_col_30 product_drag_area">
                    <div class="customer_menu_right">
                        <div class="customer_menu_center">
                            <div class="customer_menu_h3">
                                <span class="">Your Order</span>
                            </div>
                            <!--order list-->
                            <table class="customer_menu_order_table_head">
                                <tr>
                                    <td>Beverage</td>
                                    <td>Qtn.</td>
                                </tr>
                            </table>

                            <table id="" class="customer_menu_order_table">
                                    <div id="dragable_product_order" class="" style="position: relative;width: 100%"></div>

                            </table>


                        </div>


                        <!--list order list-->

                        <div class="customer_menu_center">
                            <button class="undo">Undo</button>
                            <button class="redo">Redo</button>
                        </div>
                        <div class="customer_menu_center">
                            <a href="customer_confirm_order.php"><button class="customer_menu_button">View Order</button></a>
                            <a href="customer_index.php"><button class="customer_menu_button">Cancel</button></a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!--jQuery to complete DnD also add data to DB-->
        <script src="undo-master/undo.js"></script>
        <script src="undo-master/vendor/jquery-1.5.1.js"></script>
        <script>
            $(function() {
                var stack = new Undo.Stack(),
                    EditCommand = Undo.Command.extend({
                        constructor: function(textarea, oldValue, newValue) {
                            this.textarea = textarea;
                            this.oldValue = oldValue;
                            this.newValue = newValue;
                        },
                        execute: function() {
                        },
                        undo: function() {
                            this.textarea.html(this.oldValue);
                        },

                        redo: function() {
                            this.textarea.html(this.newValue);
                        }
                    });
                stack.changed = function() {
                    stackUI();
                };

                var undo = $(".undo"),
                    redo = $(".redo"),
                    dirty = $(".dirty");
                function stackUI() {
                    undo.attr("disabled", !stack.canUndo());
                    redo.attr("disabled", !stack.canRedo());
                    dirty.toggle(stack.dirty());
                }
                stackUI();

                $(document.body).delegate(".undo, .redo, .save", "click", function() {
                    var what = $(this).attr("class");
                    stack[what]();
                    return false;
                });

                var text = $("#text"),
                    startValue = text.html(),
                    timer;
                $("#text").bind("keyup", function() {
                    // a way too simple algorithm in place of single-character undo
                    clearTimeout(timer);
                    timer = setTimeout(function() {
                        var newValue = text.html();
                        // ignore meta key presses
                        if (newValue != startValue) {
                            // this could try and make a diff instead of storing snapshots
                            stack.execute(new EditCommand(text, startValue, newValue));
                            startValue = newValue;
                        }
                    }, 250);
                });

                $(".bold").click(function() {
                    document.execCommand("bold", false);
                    var newValue = text.html();
                    stack.execute(new EditCommand(text, startValue, newValue));
                    startValue = newValue;
                });

                $(document).keydown(function(event) {
                    if (!event.metaKey || event.keyCode != 90) {
                        return;
                    }
                    event.preventDefault();
                    if (event.shiftKey) {
                        stack.canRedo() && stack.redo()
                    } else {
                        stack.canUndo() && stack.undo();
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function(data) {

                showDrop();

                $('.product_drag_area').on('dragover', function() {
                    $(this).addClass('product_drag_over');
                    return false;
                });
                $('.product_drag_area').on('dragleave', function() {
                    $(this).removeClass('product_drag_over');
                    return false;
                });

                $('.product_drag').on('dragstart', function(e) {
                    e.originalEvent.dataTransfer.setData('productid', $(this).data('id'));
                    e.originalEvent.dataTransfer.setData('productquantity', $(this).data('quantity'));
                });
                $('.product_drag_area').on('drop', function(e) {
                    e.preventDefault();
                    $(this).removeClass('product_drag_over');
                    var id = e.originalEvent.dataTransfer.getData('productid');
                    var quantity = e.originalEvent.dataTransfer.getData('productquantity');
                    $.ajax({
                        url: "add_item.php",
                        method: "POST",
                        data: {
                            id: id,
                            quantity: quantity,
                            action: 1,
                        },
                        success: function() {
                            showDrop();
                        }
                    })
                });
            });

            function showDrop() {
                $.ajax({
                    url: "fetch_item.php",
                    method: "POST",
                    data: {
                        fetch: 1,
                    },
                    success: function(data) {
                        $('#dragable_product_order').html(data);
                    }
                })
            }

        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script type="text/javascript">
            window.onload=function(){
                var tempDiv;
                document.getElementById("select").addEventListener("drop",function(ev){
                    ev.preventDefault();
                    console.log("s");
                    var div = document.createElement("div");
                    div.style.backgroundColor = "red";
                    console.log($(".miao"));
                    document.getElementById("select").insertBefore(div,$(".miao")[0]);
                    tempDiv.remove();
                })
                document.getElementById("select").addEventListener("dragover",function(ev){
                    ev.preventDefault();
                    var $main = $('.select div'); // 局部变量：按照重新排列过的顺序 再次获取 各个元素的坐标，
                    tempDiv = $(".miao"); //获得临时 虚线框的对象
                    for( let i = 0;i < $main.length; i++){
                        let x = $main[i].getBoundingClientRect().left;
                        let y = $main[i].getBoundingClientRect().top;

                        if (ev.clientY > y && ev.clientY < (y + 50) ) {
                            tempDiv.insertBefore($main[i]);
                        }
                    }
                });

                document.getElementsByClassName("no-select")[0].addEventListener("dragstart",function(ev){
                    ev.dataTransfer.setData("Text",this.innerText + "+" + this.className);

                    var div = document.createElement("div");
                    div.style.backgroundColor = "red";
                    div.className="miao";
                    div.style.opacity = "0.2";
                    document.getElementById("select").appendChild(div);
                });
                document.getElementsByClassName("no-select")[0].addEventListener("mousedown",function(ev){


                });

            }
        </script>

    </body>

</html>
    <!--DnD reference-->
    <!--https://www.sourcecodester.com/tutorials/php/11641/drag-drop-and-insert-database-using-ajaxjquery-php.html-->
