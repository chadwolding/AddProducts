<?php
/**
 * Created by PhpStorm.
 * User: 15258
 * Date: 4/17/2018
 * Time: 10:44 AM
 */

include('../model/connections.php');
include('../model/Product.php');
include('../model/Electronics.php');
include('../model/Tools.php');

if (isset($_POST['submit'])){

    // The type of product
    if (isset($_POST['productChoice'])){
        $productChoice = $_POST['productChoice'];
    }
    else{
        $productChoice = NULL;
    }

    // Check if the title is set.
    if (isset($_POST['title'])){
        $title = $_POST['title'];
    }
    else{
        $title = NULL;
    }

    // Check if the description is set.
    if (isset($_POST['description'])){
        $description = $_POST['description'];
    }
    else{
        $description = NULL;
    }

    // Check if the price is set.
    if (isset($_POST['price'])){
        $price = $_POST['price'];
    }
    else{
        $price = NULL;
    }

    // Check if the shipper is set.
    if (isset($_POST['shipper'])){
        $shipper = $_POST['shipper'];
    }
    else{
        $shipper = NULL;
    }

    // Check if the weight is set.
    if (isset($_POST['weight'])){
        $weight = $_POST['weight'];
        if($weight <= 0){
            $weight = NULL;
        }
    }
    else{
        $weight = NULL;
    }

    // Check if recyclable is set.
    if (isset($_POST['recyclable'])){
        $recyclable = $_POST['recyclable'];
    }
    else{
        $recyclable = NULL;
    }

    switch ($_POST['productChoice']){
        case "product":
            $product = new Product();
            $product->setTitle($title);
            $product->setDescription($description);
            $product->setPrice($price);
            $product->AddProductToDB($productChoice, $title, $description, $price, NULL, NULL, NULL);
            break;

        case "tool":
            $tool = new Tools();
            $tool->setTitle($title);
            $tool->setDescription($description);
            $tool->setPrice($price);
            $tool->setShipper($shipper);
            $tool->setWeight($weight);
            $tool->AddProductToDB($productChoice, $title, $description, $price, $shipper, $weight, NULL);
            break;

        case "electronic":
            $electronic = new Electronics();
            $electronic->setTitle($title);
            $electronic->setDescription($description);
            $electronic->setPrice($price);
            $electronic->setRecyclable($recyclable);
            $electronic->AddProductToDB($productChoice, $title, $description, $price,NULL, NULL, $recyclable);
            break;
    }

}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chad Wolding</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5 mb-2">Add a Product</h1>

    <form method="post" id="form" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h4 class="text-center">Select a type to add</h4>
        <div class="text-center mb-3">
            <div class="form-check form-check-inline m-2">
                <input class="form-check-input" type="radio" id="productRadio" name="productChoice" value="product" checked>
                <label class="form-check-label" for="productRadio">General Product</label>
            </div>
            <div class="form-check form-check-inline m-2">
                <input class="form-check-input" type="radio" id="toolRadio" name="productChoice" value="tool">
                <label class="form-check-label" for="toolRadio">Tool</label>
            </div>
            <div class="form-check form-check-inline m-2">
                <input class="form-check-input" type="radio" id="electronicRadio" name="productChoice" value="electronic">
                <label class="form-check-label" for="electronicRadio">Electronic</label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="20">
            </div>
            <div class="col-sm-6">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" maxlength="100">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" maxlength="10">
            </div>
            <div class="col-sm-6" id="electronicOptions" style="display: none">
                <label for="recyclable">Recyclable</label>
                <select class="form-control" id="recyclable" name="recyclable">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-sm-6 toolOptions" style="display: none">
                <label for="shipper">Shipper</label>
                <select class="form-control" id="shipper" name="shipper">
                    <option value="ups">UPS</option>
                    <option value="fedex">Fedex</option>
                    <option value="usps">USPS</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 toolOptions" style="display: none">
                <label for="weight">Weight LBS</label>
                <input type="text" class="form-control" id="weight" name="weight" maxlength="6">
            </div>
        </div>
        <div class="form-group row">
            <div class="text-center mx-auto">
                <button type="submit" name='submit' class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </form>
    <div class="m-auto text-center mt-5">
    <button class="mt-3 btn btn-info" id="toggler">Show/Hide database.</button>
    <div id="database" class="text-center" style="display: none">
        <h3 class="text-danger mt-3 mb-2">For testing purposes...</h3>
        <table class="mx-auto text-center mt-2 mb-4">
            <tr><th>Type</th><th>Title</th><th>Description</th><th>Price</th><th>Shipper</th><th>Weight LBS</th><th>Recyclable</th></tr>

            <?php
                $connection = getConnection();

                $query = $connection->prepare("SELECT * FROM products ORDER BY id DESC");
                $query->execute();

                foreach ($query as $row){
                    $rowType = $row['type'];
                    $rowTitle = $row['title'];
                    $rowDescription = $row['description'];
                    $rowPrice = $row['price'];
                    $rowShipper = $row['shipper'];
                    $rowWeight = $row['weight'];
                    $rowRecyclable = $row['recyclable'];
                    echo "<tr><td>$rowType</td><td>$rowTitle</td><td>$rowDescription</td><td>$rowPrice</td><td>$rowShipper</td><td>$rowWeight</td><td>$rowRecyclable</td></tr>";
                }
            ?>

        </table>
    </div>
    </div>
    <script>

        $(document).ready(function () {

            $('#toggler').click(function () {
                $('#database').toggle();
            });

            $("input[type=radio]").click(function() {
                switch(this.value){
                    case 'product':
                        $("#electronicOptions").hide();
                        $(".toolOptions").hide();
                        break;
                    case 'tool':
                        $("#electronicOptions").hide();
                        $(".toolOptions").show();
                        break;
                    case 'electronic':
                        $(".toolOptions").hide();
                        $("#electronicOptions").show();
                        break;
                }

        });

            $('#form').validate({
                errorClass: 'errorMessage',
                rules: {
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    price: {
                        required: true,
                        number: true,
                    },
                    weight: {
                        required: true,
                        number: true,
                    },
                },
                messages: {
                    title: {
                        required: "Required",
                    },
                    description: {
                        required: "Required",
                    },
                    price: {
                        required: "Required",
                        number: "Must be a number",
                    },
                    weight: {
                        required: "Required",
                        number: "Must be a number",
                    },
                },

            });
        });
    </script>
</div>
</body>
<footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</footer>
</html>


