 <?php
$connect = mysqli_connect("localhost","root","","oxford.com");



//total records 

$queryrecords = "SELECT * FROM  sales_order order by subtotal_incl_tax desc limit 10";

$resultrecord = mysqli_query($connect, $queryrecords);
$chart_data111 = '';
while($row111 = mysqli_fetch_array($resultrecord))
{
 $chart_data111 .= "{order:".$row111["entity_id"].",totalamount:'".$row111["subtotal_incl_tax"]."',discount:'".$row111["shipping_amount"]."',  totalitem:".$row111["total_item_count"]."}, ";
}

$chart_data111 = substr($chart_data111, 0, -2);




 ?>

 <div id="chart1"></div>

 <script>
 	

 	
Morris.Bar({
 element : 'chart1',
 data:[<?php echo $chart_data111; ?>],
 xkey:'order',
 ykeys:['discount', 'totalamount', 'totalitem'],
 labels:['discount', 'totalamount', 'totalitem'],
 hideHover:'auto',
 stacked:true
});

 </script>