/*
       Usage : SEND THE CHOSEN TASK TO BACKEND
       Return : None
       Parameters : task id , project manager id
*/
     function SelectTask(task,pm_id)
     {
       //Encoding URL as TaskId = chosen task  & PM_Id = Project Manager Id
       var sendtext="TaskId="+task.value+"&PM_Id="+pm_id;

       var xhttp = new XMLHttpRequest();

       xhttp.onreadystatechange = function()
      {
          if (xhttp.readyState == 4 && xhttp.status == 200)
          {   // Response Code
              var result = JSON.parse(xhttp.responseText);
              var task_table = document.getElementById("task_table");
              var member_table = document.getElementById("member_table");
              var len_task = Object.keys(result[0]).length;

              //If the result contains atleast One Row then we proceed
              if(len_task>0)
              {
                   if (task_table.rows.length>1)
                   {
                     for(var task_rows=task_table.rows.length;task_rows>1;task_rows--)
                     {
                          task_table.deleteRow(1);
                     }
                   }

                  // Insert new Row in task_table
                  var task_fetch = result[0];
                    // Append the row
                  var row = task_table.insertRow(-1);
                  var cells=[];

                  for(var i=0;i<6;i++)
                        {
                            cells.push(row.insertCell(-1));
                        }

                  cells[0].innerHTML =  task_fetch['TaskName'] ;
                  cells[1].innerHTML =  task_fetch['TaskDesc'] ;
                  cells[2].innerHTML =  task_fetch['TaskStartDate'] ;
                  cells[3].innerHTML =  task_fetch['TaskEndDate'] ;
                  cells[4].innerHTML =  task_fetch['Hours'] ;
                  cells[5].innerHTML =  task_fetch['Members'] ;

                    // Display the Team Members in the Project
                  var member_fetch = result['members'];
                  if (member_table.rows.length>1)
                  {
                    for(var member_rows=member_table.rows.length;member_rows>0;member_rows--)
                    {
                        member_table.deleteRow(0);
                    }
                  }

                  var member_rows=0;
                  var cell=0;
                  var len_members=member_fetch.length;
                  document.getElementById('remaining-parent').style.visibility=  "visible";
                    // Append rows in member_table containing Add/Delete Icon and Member Id
                  for(var member=0;member<len_members;member++)
                    {
                        member_rows=member_table.insertRow(-1);
                        cell=member_rows.insertCell(-1);
                        var icon = document.createElement("i");
                        icon.onclick = function(){toggling(this)};
                        icon.classList.add("fa","fa-plus-circle", "icon-check");
                        icon.style.color = "green";
                        cell.appendChild(icon);
                        cell=member_rows.insertCell(-1);
                        cell.innerHTML = member_fetch[member];
                    }

                  document.getElementById('remaining').innerHTML =result['remaining'];
              }
            }
          };

          // Request Code
        xhttp.open("POST", "project.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send(sendtext);
     }



/*
        Usage : TOGGLE BETWEEN ADD AND DELETE
        Return : None
        Parameters : icon for toggling
*/
     function toggling(icon)
     {
       if(icon.classList.contains('fa-plus-circle'))
       {
         icon.style.color='red';
       }
      else
       {
         icon.style.color='green';
      }

      icon.classList.toggle("fa-plus-circle");
      icon.classList.toggle("fa-minus-circle");
     }


/*
        Usage : SUBMIT MEMBERS CHOSEN FOR ASSIGNMENT
        Return : None
        Parameters : None
*/
     function SubmitMembers()
     {
       var members_obj=[]
       var table = document.getElementById("member_table");
       // Gather All the members which have been chosen
       for (var i = 0, row; row = table.rows[i]; i++)
       {
         var icon=row.cells[0].firstChild;

         if(icon.classList.contains('fa-minus-circle'))
          {
            members_obj.push(row.cells[1].innerHTML);
          }
        }

      var sendtext=JSON.stringify(members_obj);

          var xhttp = new XMLHttpRequest();

              xhttp.onreadystatechange = function() {
               if (xhttp.readyState == 4 && xhttp.status == 200)
               {  // Response Code
                  var result=JSON.parse(xhttp.responseText);
                  document.getElementById('remaining').innerHTML= result[1];

                  var table = document.getElementById("member_table");

                  // Changing all icons to plus
                  for (var i = 0, row; row = table.rows[i]; i++)
                  {
                    var icon=row.cells[0].firstChild;

                    if(icon.classList.contains('fa-minus-circle'))
                     {
                        icon.style.color='green';
                       icon.classList.toggle("fa-plus-circle");
                       icon.classList.toggle("fa-minus-circle");
                     }
                   }

                  alert(result[0]);
               }
        };

        // Request Code
       xhttp.open("POST", "assign.php", true);
       xhttp.setRequestHeader("Content-type", "application/json;charset=UTF-8");
       xhttp.send(sendtext);
     }
