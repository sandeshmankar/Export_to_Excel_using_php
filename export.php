<?php include("include/lock.php"); 
ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
</head>
<html>
<body>




      <table class="table table-bordered table-striped" id="smpl_tbl">
                
                 <tr>
                                <th>ID</th>
                                <th>Entity Name</th>
                                  <th>Patent Mode</th>
                   <th>Application No</th>
                  
                   <th>Country</th>
                   
                    <th>Title</th>
                    <th>IPRAM Ref. No</th>
                     <th>User</th>
                              
                  <th>Current Status</th>
                  <th>Pod Date</th>
                   <th>Foreign filing date</th>
                   <th>Exp publication date</th>
                   <th>Additional Dockets date</th>
                   <th>Filing date</th>
                   <th>Assignment deed date</th>
                   <th>Request for examination date</th>
                   <th>Bank Name</th>
                   <th>Next action</th>
                   <th>Amount Paid</th>
                   <th>Cheque/DD No</th>
                   <th>Summary</th>
                   <th>Abstract</th>
                    <th>Date</th>
                                 
                              </tr>
                  </table>
<?php


$select_application = mysql_query("select * FROM application");
while($rows_app = mysql_fetch_assoc($select_application)){
               $i++;
              $app_id=$rows_app['app_id'];
              $invention_title=$rows_app['invention_title'];
              $patent_no=$rows_app['patent_no'];
          $inter_no=$rows_app['inter_no'];
          $ipram_no=$rows_app['ipram_no'];          
          $country=$rows_app['country'];
          $entity_id  =$rows_app['entity_name'];
          $application_type=$rows_app['application_type'];
          $associate_name=$rows_app['associate_name'];
          $user=$rows_app['user'];
          $accounting_mode=$rows_app['accounting_mode'];
          $invention_mode=$rows_app['invention_mode'];
          $status=$rows_app['status'];
          $user_by=$rows_app['user_by'];
          
         
         
        $select_e=  mysql_query("SELECT * FROM users WHERE id='$user'");
          $rows_e = mysql_fetch_assoc($select_e);
          
          $first= $rows_e['first'];
           $last= $rows_e['last'];
          
          $select_entity =  mysql_query("SELECT * FROM company WHERE id='$entity_id'");
          $rows_entity = mysql_fetch_assoc($select_entity);
          
          $entity_name = $rows_entity['company_name'];
            $c_client_type= $rows_entity['c_client_type'];

             $application_number = $nap_obj->nap_get_info("application_filed","application_mo","application_id","$app_id"); 
            $type= $row['type'];


                $select_application_filed = mysql_query("SELECT * FROM application_filed WHERE application_id='$app_id'");
      $rows_app_filed = mysql_fetch_assoc($select_application_filed);
      $coun_app_filed = mysql_num_rows($select_application_filed);

     
      
          $application_mo=$rows_app_filed['application_mo'];
           $user_id=$rows_app_filed['user_id'];
          
        $pod_date =$rows_app_filed['pod_date'];
          $foreign_date =$rows_app_filed['foreign_date'];
          $publication_date=$rows_app_filed['publication_date'];
          $dockets_date=$rows_app_filed['dockets_date'];
          $filing_date=$rows_app_filed['filing_date'];
          $assignment_date=$rows_app_filed['assignment_date'];     
               $examination_assignment_date=$rows_app_filed['examination_assignment_date'];   
          $bank_name=$rows_app_filed['bank_name'];
          $action=$rows_app_filed['action'];
          
          $amount=$rows_app_filed['amount'];
          $cheque_no=$rows_app_filed['cheque_no'];         
          $summary=$rows_app_filed['summary'];
          $abstract=$rows_app_filed['abstract'];
          $date = $rows_app_filed['date'];

            $form1_done=$rows_app_filed['form1_done'];
            $form3_done=$rows_app_filed['form3_done'];
            $poa_done=$rows_app_filed['poa_done'];
              $assignment_done=$rows_app_filed['assignment_done'];
                $foreign_filing_done=$rows_app_filed['foreign_filing_done'];
                  $request_examination_done=$rows_app_filed['request_examination_done'];
                    
                    
                                
						
			
                            
		  @$table .= '
     
			
			
		
			<table border="0" cellpadding="0" cellspacing="0" id="ctbl"><tr><td>
		
			 <tr class="record">
                               <td>'.$app_id.'</td>
                                   <td>'.$entity_name.' [<b>'.$c_client_type.'</b>]</td>
                                   <td>'.$patent_no.'</td>
                  <td>'.$application_number.'</td>
              
                  <td>'.$country.'</td>
                 
                <td>'.$invention_title.'</td>
                    <td><a href="application.php?application_id='.$app_id.'">'.$ipram_no.'</a></td>
                    
                  <td>'.$first.' '.$last.'</td>
                  
                   <td>'.$status.'</td> 
                   <td>'.$pod_date.'</td> 
                    <td>'.$foreign_date.'</td> 
                   <td>'.$publication_date.'</td> 
                    <td>'.$dockets_date.'</td> 
                   <td>'.$filing_date.'</td> 
                    <td>'.$assignment_date.'</td> 
                    <td>'.$examination_assignment_date.'</td> 
                   <td>'.$bank_name.'</td> 
                   <td>'.$action.'</td> 
                   <td>'.$amount.'</td> 
                   <td>'.$cheque_no.'</td> 
                   <td>'.$summary.'</td> 
                    <td>'.$abstract.'</td> 
                     <td>'.$date.'</td> 


                    ';

                  

                
                 
                 
                  
                  echo '</tr></table>'; 
                  
              
                  
                  
                  
                  
                
		 
			
			
            header("Content-type: application/x-msdownload");
            header("Content-Disposition: attachment; filename=application_all.xls");
            header("Pragma: no-cache");
            header("Expires: 0"); 
            
        
?>
		
<?php
 echo $table;
 }
 ?>
     
</body>
</html>