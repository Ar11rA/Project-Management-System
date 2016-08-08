<?php

session_start();
include 'confige.php';

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


/*
	Usage :  View the Status of Projects
  Return : JSON File containing Project Details
  Parameters : project id , database connection
*/

function view_status($project,$conn)
{

$project_id='';
$json_arr=array();

// Retrive Project Details using ProjectId
$sql_project = "SELECT * FROM project p, system s WHERE p.Proj_Id='$project' AND p.Sys_Id=s.SM_SystemID";
$result_project = mysqli_query($conn, $sql_project);

if (mysqli_num_rows($result_project) > 0)
{

    while($row_project = mysqli_fetch_assoc($result_project))
    {   $project_id=$row_project['Proj_Id'];
        array_push($json_arr,$row_project);


        // Retrive Tasks and their Details using ProjectId
        $sql_task="SELECT * FROM proj_task WHERE ProId='$project_id'";
        $result_task= mysqli_query($conn, $sql_task);
        if(mysqli_num_rows($result_task)>0)
        {
            while($row_task = mysqli_fetch_assoc($result_task))
            {  $task_id=$row_task['TaskId'];

				// Retrive Members assigned to Task using TaskId
                $sql_members="SELECT e.Emp_Name FROM employee e,task_employee t WHERE t.Task_ID = '$task_id' and e.Emp_id = t.Emp_Id";
                $result_members= mysqli_query($conn, $sql_members);
                if(mysqli_num_rows($result_members)>0)
                {    $row_task['members_name']=array();

                     while($row_members = mysqli_fetch_assoc($result_members))
                     {

                         array_push($row_task['members_name'],$row_members['Emp_Name']);
                     }

                }
                else
                {
                  $row_task['members_name']="";
                }

                array_push($json_arr,$row_task);
            }

        }
        else
        {
          $row_task['TaskName']="";
          $row_task['TaskDesc']="";
          $row_task['TaskStartDate']="";
          $row_task['TaskEndDate']="";
          $row_task['Hours']="";
          $row_task['Status']="";
          $row_task['Members']="";
          $row_task['members_name']="";

        }

    }
}
else
{
    $json_arr=array();
}

// Encode the associative array in JSON format
return json_encode($json_arr);

}



/*
	Usage :  View Task Details
  Return : JSON File containing Task Details
  Parameters : task id , database connection
*/

function task_details($task_id,$pm_id,$conn)
{
  $task_assigned_members=array();
  $json_arr=array();
  $count_members_task=0;

  $sql = "SELECT * FROM task_employee WHERE Task_ID = '$task_id'" ;
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0)
  {
    while($row = mysqli_fetch_assoc($result))
    { array_push($task_assigned_members,$row["Emp_Id"]);
      $count_members_task++;
    }
  }


    $sql_task = "SELECT `TaskName`, `TaskDesc`, `TaskStartDate`, `TaskEndDate`, `Hours`,`Members` FROM `proj_task` WHERE TaskId = '$task_id'" ;
    $result_task = mysqli_query($conn, $sql_task);
    $row_task = mysqli_fetch_assoc($result_task);
    array_push($json_arr,$row_task);

   $members=array();
    $sql_members = "SELECT Emp_id FROM pm_emp WHERE Pm_id='$pm_id'";
    $result_members = mysqli_query($conn, $sql_members);
    if(mysqli_num_rows($result_members)>0)
    {
      while($row_members= mysqli_fetch_assoc($result_members))
      {
        //array_push($members,$row_members['Emp_id']);
        $members[$row_members['Emp_id']]=1;
      }
      $members[$pm_id]=1;
    }

    for($temp=0;$temp<$count_members_task;$temp++)
    {
      $members[$task_assigned_members[$temp]]=0;
    }

    $json_arr['members']=array();

    foreach( $members as $member => $member_value)
    {
      if($member_value==1)
      array_push($json_arr['members'],$member);
    }


    $_SESSION['TaskId'] = $task_id;

    $json_arr['remaining']=$row_task['Members']-$count_members_task;
    $_SESSION['remaining']=$json_arr['remaining'];

  echo json_encode($json_arr);
}


/*
	Usage :  Determine the expected members for a project
  Return : return an expected list of employees
  Parameters : database connection
*/

function expected_member_project($conn)
{
  $json_arr = array();
  $unassigned_members = unassigned_members_project($conn);

  //echo print_r($unassigned_members);

  if($_SESSION['ProjectId_Team_Members_remaining']==0)
  {
    return array("Member Assignment to Project is Complete");
  }
  else if(count($unassigned_members)>= $_SESSION['ProjectId_Team_Members_remaining'])
  {
    $random_members = array_rand($unassigned_members,$_SESSION['ProjectId_Team_Members_remaining']);
    $_SESSION['project_member_assign']= array();
    array_push($_SESSION['project_member_assign'],$random_members);
    $len=count($random_members);

    if($len==1)
    {
      $sql= "SELECT Emp_id,Emp_Name,Emp_Designation from employee WHERE Emp_id = $random_members";
      $result = mysqli_query($conn, $sql);
      array_push($json_arr,mysqli_fetch_assoc($result));
    }

    else
    {
    for($temp=0;$temp<$len;$temp++)
    {
      $sql= "SELECT Emp_id,Emp_Name,Emp_Designation from employee WHERE Emp_id = $random_members[$temp]";
      $result = mysqli_query($conn, $sql);
      array_push($json_arr,mysqli_fetch_assoc($result));
    }
    }
    array_push($json_arr,array('remaining'=>$_SESSION['ProjectId_Team_Members_remaining']));
    return ($json_arr);

  }
  else
  {return array("Not sufficient Members For Project Assignment");}
}




/*
	Usage :  Determine the Unassigned members
  Return : returns a list of employees unassigned
  Parameters : database connection
*/

function unassigned_members_project($conn)
{

  $unassigned_members=array(); // Associative Array

  $json_arr=array();
  $sql= "SELECT Emp_id from employee";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $unassigned_members["'".$row["Emp_id"]."'"]=1;
    }
  }


  $sql= "SELECT Emp_id from pm_emp";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $unassigned_members["'".$row["Emp_id"]."'"]=0;
    }

  }

$sql = "SELECT Emp_Id FROM project_pm";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $unassigned_members["'".$row["Emp_Id"]."'"]=0;
  }

}


  foreach($unassigned_members as $member=>$value)
  if($value==1)$json_arr[$member]=1;
  return ($json_arr);

}



// view status of projects
if(isset($_POST['project']))
{
echo view_status($_POST['project'],$conn);
}

// Display Project Details for the Member Assignment to Project
if(isset($_POST['ProjectId_Team']))
{
  $project=$_POST['ProjectId_Team'];
  $json_arr=array();
  // Retrive Project Details using ProjectId
  $sql_project = "SELECT * FROM project p, system s WHERE p.Proj_Id='$project' AND p.Sys_Id=s.SM_SystemID";
  $result_project = mysqli_query($conn, $sql_project);

  if (mysqli_num_rows($result_project) > 0)
  {

      while($row_project = mysqli_fetch_assoc($result_project))
      {  array_push($json_arr,$row_project);
        $_SESSION['ProjectId_Team_Members_remaining'] = $row_project['NoOfMembers'];
        $_SESSION['ProjectId_Team'] = $row_project['Proj_Id'];
      }
  }


  $sql="SELECT COUNT(*) FROM pm_emp WHERE Pm_id= (SELECT Emp_id From project_pm WHERE Proj_Id='$project')";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $_SESSION['ProjectId_Team_Members_remaining'] -=$row['COUNT(*)']+1;

  echo json_encode($json_arr);
}


/*
	Usage :  Assigns the Unassigned members to Projects
  Return : message
  Parameters : project id, database connection
*/
function assign_project_member($project_id,$conn)
{

$sql="SELECT Emp_Id FROM project_pm WHERE Proj_Id='$project_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$pm_id= $row["Emp_Id"];

$members=$_SESSION['project_member_assign'];

$len=count($members);

{
for($temp=0;$temp<$len;$temp++)
{
  $sql="INSERT INTO pm_emp VALUES($members[$temp],'$pm_id')";
  $result = mysqli_query($conn, $sql);
}
  if($result==true)
  {
    return "Successfully assigned members to project";
  }
  else {
     return "Could not assign members to project. Try Again Later";
  }

}

}

// Sends an expected list of unassigned members for project assignment
if(isset($_POST['AssignMembers']))
{
  echo json_encode(expected_member_project($conn));
}

// Assign Member to Project Request Processer
if(isset($_POST['SubmitMembers']))
{
echo assign_project_member($_SESSION['ProjectId_Team'],$conn);

}

// View Task Details
if(isset($_POST['TaskId']))
{
echo task_details($_POST['TaskId'],$_POST['PM_Id'],$conn);
}


mysqli_close($conn);
?>
