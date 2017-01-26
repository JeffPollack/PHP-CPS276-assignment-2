<?php
/*
 * Homework 2 
 * Jeff Pollack
 * Time logged on assignemt: 1hour
 */

include('col_data.php');

if(isset($_POST['location_a'])){
    $current1 = $_POST['location_a'];
}else{
    $current1 = '';
}

if(isset($_POST['location_b'])){
    $current2 = $_POST['location_b'];
}else{
    $current2 = '';
}

if(isset($_POST['wages_a'])){
    $wages_a = $_POST['wages_a'];
}else{
    $wages_a = '';
}
?>

<form method='post' action='index.php'>
	<table border='1'>
		<tr>
			<th>Cost of Living Calculator</th>
		</tr>
	
		<tr>
			<th>This application compares the relative cost of living between two locations.</th>
		</tr>
			
	
		<tr>
			<td>Location A: 
                            <select name='location_a'>
                                <option value="0">Select a City</option>
                        <?php
                                foreach($COL_array as $city1 => $moneyA){
                                    if($city1 == $current1){
                                         $s = "selected"; 
                                    }else{
                                         $s="";
                                    }
                                      echo "<option value='$city1' $s >$city1</option>";
                                    }
                                   
                        ?>
                            </select>
		</tr>
		<tr>	
			
                    <td>Wages in Location A: $<input type='text' name='wages_a' value='<?=$wages_a?>'/><br/>
                    </td>
		</tr>
		<tr>
			<td>Location B: 
                            <select name='location_b'>
                                <option value="0">Select a City</option>
                        <?php
                                foreach($COL_array as $city2 => $moneyB){
                                    if($city2 == $current2){
                                         $s = "selected"; 
                                    }else{
                                         $s="";
                                    }
                                      echo "<option value='$city2' $s >$city2</option>";
                                    }
                        ?>
                            </select>
			
		</tr>
		<tr>			
			<td><input type='submit' value='Submit Form'/></td>
		</tr>
	</table>
</form>

<?php
//make sure we have a price
if($current1 && $current2){
    $moneyA = $COL_array[$current1];
    $moneyB = $COL_array[$current2];
    $wages_b = number_format((($wages_a / $moneyA ) * $moneyB), 2);
    echo "Making $$wages_a in $current1 is the same as making $wages_b in $current2." ;
    
}