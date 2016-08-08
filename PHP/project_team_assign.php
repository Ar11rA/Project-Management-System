<style>
input[type=submit],button
{
margin:10px;
width:15%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}
input,select{
border:1px solid black;
border-radius:5px;
width:40%;
padding:0;
margin:0;
height:40px;
}
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:50px;
padding-top:20px;
padding-bottom:130px;
height:620px;
}
table
{
width:75%;
margin-left:100px;
}
table td,th
{
padding:10px;
text-align:left;
}
table,table th,table td
{
border:1px solid black;
border-collapse:collapse;
}
table th{
background-color:#003;
	color:white;
}
}
select{width:35%;}
button	
{
margin:10px;
width:15%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}
#formwala{margin-left:30px;
width:65%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}

</style>
<div class="bml">
<?php
session_start();
include 'confige.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Assign Project Member
    </title>

</head>
<body>
<div>
<div style="position:relative;margin:40px;display:inline-block;">
<span style="font-size:120%;">Select Project</span>

<?php

// Retrive System Details
$sql_system = "SELECT SM_SystemID,SM_SysName FROM system";
$result_system = mysqli_query($conn, $sql_system);

if (mysqli_num_rows($result_system) > 0)
{
    echo '<select  onchange="SelectProject(this)">
        <option value="0">Select Project</option>';


    while($row_system = mysqli_fetch_assoc($result_system))
    {
        $system_id=$row_system['SM_SystemID'];
        $system_name=$row_system['SM_SysName'];

        // Retrive Project Details using SystemId
        $sql_project = "SELECT Proj_Id,Proj_Name FROM project WHERE Sys_Id='$system_id'";
        $result_project = mysqli_query($conn, $sql_project);

        if (mysqli_num_rows($result_project) > 0)
        {   echo '<optgroup label="'.$system_name.'">';
            while($row_project = mysqli_fetch_assoc($result_project))
            {
                echo '<option value="'.$row_project['Proj_Id'].'">'.$row_project['Proj_Name'].'</option>';

            }
            echo '</optgroup>';
        }

    }

    echo '</select>';
}

else {
    $error="Sorry data could not be processed";
     echo '<span>$error</span>';
     }
?>
</div>

</div>

 <br>
 <br>
 <br>
 <div id="project-table-div" style="visibility:hidden;margin:10px;">
 <span style="font-size:130%;">Project</span>
 <table id="project_table" border="1" style="width:80%; text-align:center;" >
     <tr>
        <th>System Name</th>
        <th>Project Name  </th>
        <th>Description  </th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Total Hours</th>
        <th>Total Members</th>
        <th>Status</th>
     </tr>

 </table>
 </div>

 <div id="members-table-div" style="visibility:hidden;margin:40px 10px">
 <span style="font-size:120%;">Members</span>
<span id="message"></span>
 <table  id="members-table" border="1" style="width:50%; text-align:center;" >
   <tr>
     <th>Emp Id</th>
     <th>Emp Name</th>
     <th>Emp Skills</th>
   </tr>
</table>
 </div >

 <div id="buttons" style="visibility:hidden">
   <button id="button-assign" type="button" onclick="AssignMembers()">Assign</button>
   <button type="button" onclick="SubmitMembers()">Submit</button>

 </div>
 <span id="message-error" style="font-size:120%;color:red"></span>
</div>
 <script>

/*
     Usage : SEND THE CHOSEN PROJECT TO BACKEND
     Return : None
     Parameters : project id
*/
   function SelectProject(project)
   {
      var sendtext="ProjectId_Team="+project.value;

       // Create AJAX Instance
       var xhttp = new XMLHttpRequest();

       // Receive the AJAX Response
       xhttp.onreadystatechange = function()
       {

         if (xhttp.readyState == 4 && xhttp.status == 200)
         {
       // Parse the JSON Response
                var result=JSON.parse(xhttp.responseText);

                var project_table = document.getElementById("project_table");
                var len=result.length;

                if(len>0)
                {  document.getElementById("project-table-div").style.visibility="visible";
       // Delete the existing Rows from Project Table
                    if (project_table.rows.length>1)
                    {
                      for(var project_rows = project_table.rows.length;project_rows>1;project_rows--)
                      {
                          project_table.deleteRow(1);
                        }
                    }


    // Insert new Rows in Project Table using DOM

                var project = result[0];
                var row = project_table.insertRow(-1);
                var cells=[];
                for(var i=0;i<8;i++)
                {
                  cells.push(row.insertCell(-1));
                }

                cells[0].innerHTML = project['SM_SysName'] ;
                cells[1].innerHTML =  project['Proj_Name'] ;
                cells[2].innerHTML =  project['Proj_Desc'] ;
                cells[3].innerHTML =  project['StartDate'] ;
                cells[4].innerHTML =  project['EnDate'] ;
                cells[5].innerHTML =  project['NoOfHrs'] ;
                cells[6].innerHTML =  project['NoOfMembers'] ;
                cells[7].innerHTML =  project['Status'] ;

              }
              AssignMembers();
          }
       };

       // Send the AJAX POST Request
      xhttp.open("POST", "project.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send(sendtext);

   }


   /*
        Usage : Sends the Request to the BACKEND for Unassigned Members List
        Return : None
        Parameters : None
   */
   function AssignMembers()
   {
     var sendtext="AssignMembers=true";

      // Create AJAX Instance
      var xhttp = new XMLHttpRequest();

      // Receive the AJAX Response
      xhttp.onreadystatechange = function()
      {

        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
      // Parse the JSON Response

               var result=JSON.parse(xhttp.responseText);


               if(result[0].length)
               {
                 document.getElementById('members-table-div').style.visibility="hidden";
                 document.getElementById('buttons').style.visibility="hidden";
                 alert(result[0]);
                 document.getElementById('message-error').innerHTML= result[0];
                 //alert("Not sufficient Members");

               }
               else
               { document.getElementById('button-assign').innerHTML="Choose again";
                 document.getElementById('members-table-div').style.visibility= "visible";
                 document.getElementById('buttons').style.visibility="visible";
                 document.getElementById('message-error').innerHTML="";
                  var members_table=document.getElementById("members-table");
                  var len=result.length;

                  document.getElementById("message").innerHTML = "Project requires "+result[len-1]['remaining']+" members more";
                  // Delete the existing Rows from Member Table
                  if (members_table.rows.length>1)
                  {
                     for(var members_rows=members_table.rows.length;members_rows>1;members_rows--)
                     {
                         members_table.deleteRow(1);
                       }
                  }


   // Insert new Rows in Members Table using DOM
                  for(var member=0; member<len-1;member++)
                  {
                    var row = members_table.insertRow(-1);
                    cell=row.insertCell(-1);
                    cell.innerHTML = result[member]["Emp_id"];
                    cell=row.insertCell(-1);
                    cell.innerHTML = result[member]["Emp_Name"];
                    cell=row.insertCell(-1);
                    cell.innerHTML = result[member]["Emp_Designation"];
                  }
              }
         }
      };

      // Send the AJAX POST Request
     xhttp.open("POST", "project.php", true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(sendtext);

   }



   /*
        Usage : Submits the Member List for Project Assignment
        Return : Message and Page redirection to Home Page
        Parameters : None
   */
function SubmitMembers(){
     var sendtext="SubmitMembers=1";

      // Create AJAX Instance
      var xhttp = new XMLHttpRequest();

      // Receive the AJAX Response
      xhttp.onreadystatechange = function()
      {

        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            alert(xhttp.responseText);
            
        }
      };
      xhttp.open("POST", "project.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(sendtext);
   }

   </script>

</body>
</html>
