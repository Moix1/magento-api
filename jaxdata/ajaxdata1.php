<?php
$connect = mysqli_connect("localhost","root","","oxford.com");

$queryfortotalsale = "SELECT * FROM  sales_order Where status = 'complete'";

$resultforsale = mysqli_query($connect, $queryfortotalsale);
$chart_data1 = '';
while($row1 = mysqli_fetch_array($resultforsale))
{
 $chart_data1 .= "{order:".$row1["entity_id"].",totalamount:'".$row1["subtotal_incl_tax"]."',discount:'".$row1["shipping_amount"]."',  totalitem:".$row1["total_item_count"]."}, ";
}
$chart_data1 = substr($chart_data1, 0, -2);

?>

  <div id="charts"></div>


  <script>
  	

  	Morris.Bar({
 element : 'charts',
 data:[<?php echo $chart_data1; ?>],
 xkey:'order',
 ykeys:['discount', 'totalamount', 'totalitem'],
 labels:['discount', 'totalamount', 'totalitem'],
 hideHover:'auto',
 stacked:true
});
  </script>