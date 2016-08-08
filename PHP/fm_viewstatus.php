<style>
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:20px;
padding-top:20px;
padding-bottom:130px;
height:600px;
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
select,input[type="text"]{width:55%;
height:25px;
}
button,input[type="submit"]	
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
}</style>

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
        FM VIEW STATUS
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
    echo '<select style="" onchange="SelectProject(this)">
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
 <div style="margin:10px;">
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
 <div style="margin:40px 10px">
 <span style="font-size:130%;">Tasks</span>
 <table  id="task_table" border="1" style="width:80%; text-align:center;" >
     <tr>
        <th>SNo.</th>
        <th>Task Name  </th>
        <th>Task Description  </th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Task Hours</th>
        <th>Status</th>
        <th colspan="1" id="task_table_members">Members</th>

     </tr>
 </table>
 </div>

<script>

 /*
    Usage : SEND THE CHOSEN PROJECT TO BACKEND
    Return : None
    Parameters : project id
 */
  function SelectProject(project)
  {
     var sendtext="project="+project.value;

      // Create AJAX Instance
      var xhttp = new XMLHttpRequest();

      // Receive the AJAX Response
      xhttp.onreadystatechange = function()
      {

        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
      // Parse the JSON Response
               var result=JSON.parse(xhttp.responseText);

               var project_table=document.getElementById("project_table");
               var task_table=document.getElementById("task_table");

               var len=result.length;

               if(len>0)
               {
      // Delete the existing Rows from Project Table
                   if (project_table.rows.length>1)
                   {
                     for(var project_rows=project_table.rows.length;project_rows>1;project_rows--)
                     {
                         project_table.deleteRow(1);
                       }
                     }

     // Delete the existing Rows from Task Table
               if (task_table.rows.length>1)
               {
                  for(var task_rows=task_table.rows.length;task_rows>1;task_rows--)
                  {
                       task_table.deleteRow(1);
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
               cells[2].innerHTML =  project['Desc'] ;
               cells[3].innerHTML =  project['StartDate'] ;
               cells[4].innerHTML =  project['EndDate'] ;
               cells[5].innerHTML =  project['NoOfHrs'] ;
               cells[6].innerHTML =  project['NoOfMembers'] ;
               cells[7].innerHTML =  project['Status'] ;

 // Insert new Rows in Task Table using DOM

               members=document.getElementById("task_table_members");
               member_no=[];
               for(var i=1; i< len; i++)
               {
                     var task = result[i];
                     var row = task_table.insertRow(-1);


                     cell=row.insertCell(-1);
                     cell.innerHTML = i ;

                     cell=row.insertCell(-1);
                     cell.innerHTML =  task['TaskName'] ;

                     cell=row.insertCell(-1);
                     cell.innerHTML =  task['TaskDesc'] ;

                     cell=row.insertCell(-1);
                     cell.innerHTML =  task['TaskStartDate'] ;

                     cell=row.insertCell(-1);
                     cell.innerHTML =  task['TaskEndDate'] ;

                     cell=row.insertCell(-1);
                     cell.innerHTML =  task['Hours'] ;

                     cell=row.insertCell(-1);
                     cell.innerHTML =  task['Status'] ;

                     member_no.push(task['Members']);

                     var n=task['members_name'].length;
                     for(var j=0; j<n;j++)
                     {   cell=row.insertCell(-1);
                         cell.innerHTML =  task['members_name'][j] ;
                     }

                     var colspan = Math.max.apply(Math,member_no);
                     members.colSpan= colspan;

               }
             }

             }
      };

      // Send the AJAX POST Request
     xhttp.open("POST", "project.php", true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(sendtext);

  }
  </script>

</body>
</html>
