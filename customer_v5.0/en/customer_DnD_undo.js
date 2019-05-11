//jQuery to complete DnD also add data to DB

    $(document).ready(function(data) {

                
        //Load order by default
        showDrop();

        //show the effect that the item is droppable
        
        $('.product_drag_area').on('dragover', function() {
            $(this).addClass('product_drag_over');
            return false;
        });
        $('.product_drag_area').on('dragleave', function() {
            $(this).removeClass('product_drag_over');
            return false;
        });

        //setData to productid when start dragging

        $('.product_drag').on('dragstart', function(e) {
            e.originalEvent.dataTransfer.setData('productid', $(this).data('id'));
            e.originalEvent.dataTransfer.setData('productquantity', $(this).data('quantity'));
        });
        
        //getData from productid when drop
        
        $('.product_drag_area').on('drop', function(e) {
            e.preventDefault();
            
            //By default, data/elements cannot be dropped in other elements. To allow a drop, we must prevent the default handling of the element.
            
            $(this).removeClass('product_drag_over');
            
            var id = e.originalEvent.dataTransfer.getData('productid');
            var quantity = e.originalEvent.dataTransfer.getData('productquantity');
            alert("drop successful");
            
            
            //Populate the order list temp table
            
            $.ajax({
                
                url: "add_item.php",
                method: "POST",
                data: {
                    id: id,
                    quantity: quantity,
                    action: 1,
                },
                success: function() {
                    
                    //load the data from table
                    showDrop();
                }
            })
        });
    });

    //Fetch item and display on the list when drop
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
    //DnD reference
    //https://www.sourcecodester.com/tutorials/php/11641/drag-drop-and-insert-database-using-ajaxjquery-php.html-->



    //undo redo
    function undo() {
        // function below will run clear.php?h=michael
        $.ajax({
            type: "POST",
            url: "undo.php" ,
            data: {
                action: 1,
            },
            success : function() { 
            // function below reloads current page
                showDrop();
            }
        });
    }