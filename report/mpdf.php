<?php
require('conn.php');
require_once __DIR__ . '/vendor/autoload.php';
$sql = "SELECT  client_details.*, client_details.client_name as name, report_front.* FROM  report_front LEFT JOIN client_details on report_front.client_name=client_details.id ";
$result= mysqli_query($conn,$sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
/*print_r($row);
exit;*/
$data = "<h1>Report Front Cover</h1>
		<table idth='100%'>
			<tr>
				<td>
					<img src="upload/'.$row['img'].'" alt="" width="20%" height="100"/>
				</td>
				<td>
					<table>
						<tr>
						<th width='33%' align='center'>Client Name</th>
						<td>".$row['name']."</td>
						</tr>
						<tr>
						<th width='33%' align='center'>Client Address</th>
						<td>".$row['client_address']."</td>
						</tr>
						<tr>
						<th width='33%' align='center'>Occupier Name</th>
						<td>".$row['occupier_name']."</td>
						</tr>
						<tr>
						<th width='33%' align='center'>Occupier Number</th>
						<td>".$row['occupier_number']."</td>
						</tr>
						<tr>
						<th width='33%' align='center'>Lanlord Name</th>
						<td>".$row['landloard_name']."</td>
						</tr>
						<tr>
						<th width='33%' align='center'>Lanlord Number</th>
						<td>".$row['landloard_number']."</td>
						</tr>
						<tr>
						<th width='33%' align='center'>Report Date</th>
						<td>".$row['report_date']."</td>
						</tr>
						<tr>
						<th width='33%' align='center'>Property Address</th>
						<td>".$row['property_address']."</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>";
	}
$mpdf = new \Mpdf\Mpdf();
$mpdf->SetWatermarkText('etutorialspoint');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->WriteHTML($data);
$mpdf->Output();
?>