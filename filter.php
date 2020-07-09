 <?php
if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
    include 'database_connect.php'; 
      $output = '';  
      $query = "  
           SELECT * FROM expenditure  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
           <table class="w3-table-all w3-hoverable w3-mobile">  
                <tr class="w3-teal">
			        <th>Date</th>
					<th>Rent</th>
			        <th>Electricity bill</th>
			        <th>Blade</th>
			        <th>Rezar</th>
			        <th>Medicine</th>
			        <th>Total</th>
      			</tr> 

      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                    <tr>
        				<td>'. $row['date'] .'
						</td>
						<td>'. $row['rent'] .'
						</td>
						<td>'. $row['electricity_bill'] .'
						</td>
						<td>'. $row['blade'] .'
						</td>
						<td>'. $row['rezar'] .'
						</td>
						<td>'. $row['medicine'] .'
						</td>
						<td>'. $row['total'] .'
						</td>
      </tr> 
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Date Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>


	