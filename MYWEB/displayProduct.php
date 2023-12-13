<?php include "includes/header.php"; ?>
<?php include "includes/db.php";?>
<?php include "function.php"?>

<div class="container py-5 bg-white">
    <div class="row">
<table class="table table-bordered">
  <thead>
    <tr>
      <th class="col-3">userID</th>
      <th class="col-3">userName</th>
      <th class="col-3">email</th>
      <th class="col-3">userLevel</th>
    </tr>
  </thead>
  <tbody id="data">
   
  </tbody>
</table>
</div>

</div>
<script>
    //call ajax

    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url="Data.php";
    var asynchronous= true;

    ajax.open(method,url,asynchronous);

    // sending ajax request 
    ajax.send();

    // receiving responese from data.php

    ajax.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            // alert(this.responseText);
            var data= JSON.parse(this.responseText);
            console.log(data);

            var html="";

            for(let i=0;i<data.length;i++){
                var userID=data[i].userID;
                var userName=data[i].userName;
                var email=data[i].email;
                var userLevel=data[i].userLevel; 

                html+="<tr>";
                  html+="<td>" +userID+"</td>";
                  html+="<td>" +userName+"</td>";
                  html+="<td>" +email+"</td>";
                  html+="<td>" +userLevel+"</td>";
                html+="<tr>";

            }
            document.getElementById("data").innerHTML=html;

        }
    }


</script>



<?php include "includes/footer.php"; ?>