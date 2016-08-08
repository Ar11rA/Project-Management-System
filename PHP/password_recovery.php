<!DOCTYPE html>
<html>
<head>
  <title>
    Password Recovery
  </title>
</head>
<body>
  <input id="username" type="text" placeholder="User Name"></input>
  <button type="button" onclick="send_email()">send mail</button>
  <span id="message"></span>
<script>
function send_email()
{
  var user = document.getElementById("username");
  var sendtext="recover=True&username="+user.value;

   // Create AJAX Instance
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function()
   {

     if (xhttp.readyState == 4 && xhttp.status == 200)
     {  alert(xhttp.responseText);
      }
   };

   // Send the AJAX POST Request
  xhttp.open("POST", "mail.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhttp.send(sendtext);

}

</script>

</body>
</html>
