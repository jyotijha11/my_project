<!DOCTYPE html>

<head>
    <title>Product</title>
</head>
<body>
    <div class="container">
    <div class="row">
    
        <div class="col-sm-12">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
             <form method="post" action="">
                 Product Name: <input type = "text" name = "product_name" /><br><br>
                 <label>Product Cataegory</label>
                 <select name = "dropdown">
                    <option value = "" selected></option>
                    <option value = "Wired">Wired</option>
                    <option value = "Wireless">Wireless</option>
                    <option value = "Bluetooth">Bluetooth</option>
                </select><br><br>
                Product Price: <input type = "text" name = "product_price" /><br><br>
                Sale Price:    <input type="text" name="sale_price"><br><br>
                <label>Product Color</label>
                 <select name = "dropdown">
                    <option value = "" selected> </option>
                    <option value = "red">red</option>
                    <option value = "black">black</option>
                    <option value = "Blue">Blue</option>
                </select><br><br>
                Highlight: <br>
                <textarea rows = "5" cols = "50" name = "highlight"> Write The Highlight Here</textarea><br><br>
                Product Image: <input type="file" name="image"><br><br>
                Product Description: 
                <textarea rows = "5" cols = "50" name = "description"></textarea><br><br>
                <label>Payment Method</label><br>
                <input type = "checkbox" name = "cod" value = "on"> COD<br>
                <input type = "checkbox" name = "online" value = "on"> Online<br><br>
                <div class="row submit-row">
                <button type="submit" name="submit" class="btn btn-block submit-form">Submit</button>
                </div>
             </form>
        </div>   


</body>
</htm>
