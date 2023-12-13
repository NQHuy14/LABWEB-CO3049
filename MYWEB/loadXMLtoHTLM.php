<?php include "includes/header.php" ?>
<?php include "includes/db.php";?>
<?php include "function.php"?>

<div class="container py-5">
    <div class="row">
   <button type="button" onclick="loadDoc()" class="btn btn-outline-primary pt-5 bg-white btn-small">Get Data</button>
 <br><br>
 <div class="table-responsive">
 <table id="demo" class="table table-bordered bg-white table-hover"></table>
 </div>
</div>
</div>

 <script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    myFunction(this);
  }
  xhttp.open("GET", "products.xml");
  xhttp.send();
}
function myFunction(xml) {
  const xmlDoc = xml.responseXML;
  const x = xmlDoc.getElementsByTagName("product");
  let table="<thead><tr><th>productName</th><th>prices</th><th>number_of_product</th><th>image</th></tr></thead> <tbody>";
  for (let i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("productName")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("prices")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("number_of_product")[0].childNodes[0].nodeValue +
    "</td><td>" +
   "<img src='img/" +x[i].getElementsByTagName("image")[0].childNodes[0].nodeValue+"'class='img-fluid img-thumbnail' alt='Responsive image' style='max-width: 100px;'>" +
    "</td></tr>";
  }
  table+="</tbody>"
  document.getElementById("demo").innerHTML = table;
}
</script>

<?php include "includes/footer.php" ?>

