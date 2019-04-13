<?php 
//index.php

 
$connect = mysqli_connect("localhost","root","","oxford.com");


$queryfortotalorder = "SELECT * FROM  sales_order";

$resultofqueryfortotalorder = mysqli_query($connect, $queryfortotalorder);
$chart_data = '';
while($row = mysqli_fetch_array($resultofqueryfortotalorder))
{
 $chart_data .= "{order:".$row["entity_id"].",totalamount:'".$row["subtotal_incl_tax"]."',discount:'".$row["shipping_amount"]."',  totalitem:".$row["total_item_count"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

?>

   <div id="chart"></div>

<script>
	
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'order',
 ykeys:['discount', 'totalamount', 'totalitem'],
 labels:['discount', 'totalamount', 'totalitem'],
 hideHover:'auto',
 stacked:true
});
 

	
</script>