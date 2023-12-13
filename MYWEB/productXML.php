
<?php include "includes/db.php";?>

<?php
    $result=mysqli_query($connection,"SELECT * FROM `products`");
    $xml= new DOMDocument("1.0");
    $xml->formatOutput=true;

    $products=$xml->createElement("products");

    $xml->appendChild($products);

    while($row=mysqli_fetch_assoc($result)){
        $product=$xml->createElement("product");
        $products->appendChild($product);

        $productName=$xml->createElement("productName",$row['productName']);
        $product->appendChild($productName);

        $prices=$xml->createElement("prices",$row['prices']);
        $product->appendChild($prices);

        $number_of_product=$xml->createElement("number_of_product",$row['number_of_product']);
        $product->appendChild($number_of_product);


        $image=$xml->createElement("image",$row['image']);
        $product->appendChild($image);



        
    }



    echo "<xmp>".$xml->saveXML()."</xmp>";

    $xml->SAVE("products.xml");






    

   
?>


