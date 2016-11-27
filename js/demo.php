<?php
include_once('connection.php');

$id = $_POST['id'];
$sql = "select * from terij_karyalaya where id = '$id'";
$query=$conn->query($sql);
$file="demo.xls";
$sql1 = "select * from office_detail where id ='1'";
$query1=$conn->query($sql1);
$test='';
$form1='';
while($res=$query1->fetch_array())
{
	$form1 = "<h4>पद दर्ता फाराम</h4>
		
	</div> 
	<p>(दफा ५ को उप दफा (क) बमोजिम </p>
	<table border='1px' >
		<tr>
		<th  colspan=5>कार्यालय तथा दरबन्दी विवरण सम्बन्धी ढाचा</th>
		<th colspan=4></th>
		</tr>
		<tr>
			<td colspan=5>क. कार्यालय सम्बन्धी विवरण:</td>
			<td colspan=4></td>
		</tr>
		<tr>
			<td colspan=5>कार्यलयको नाम(नेपालीमा):".$res['name']."</td>
			<td colspan=4>फ्याक्स न.".$res['fax_no']."</td>
		</tr>
		<tr>
			<td colspan=5>कार्यलयको नाम(अंग्रेजीमा):".$res['name_eng']."</td>
			<td colspan=4>जिल्ला:".$res['district']."</td>
		</tr>
		<tr>
			<td colspan=5>सुरु पद सिर्जना भएको मिति:".$res['start_date']."</td>
			<td colspan=4>ठेगाना:".$res['Address']."</td>
		</tr>
		<tr>
			<td colspan=5>पछिल्लो अद्यावधिक मिति:".$res['last_date']."</td>
			<td colspan=4>वडा न.:".$res['ward_no']."</td>
		</tr>
		<tr>
			<td colspan=5></td>
			<td colspan=4>स्थान:".$res['position']."</td>
		</tr>
		<tr>
			<td colspan=5></td>
			<td colspan=4>फोन नं.:".$res['phone_no']."</td>
		</tr>
		<tr>
			<td colspan=5></td>
			<td colspan=4>इमेल:".$res['email']."</td>
		</tr>
		<tr>
			<td colspan=5></td>
			<td colspan=4>वेबसाइट:".$res['website']."</td>
		</tr>

	</table>";
	}
	echo $form1;
while($res=$query->fetch_array())
{
	
$test = "<p>ख. कार्यालय दरबन्दी तेरिज</p><table border='1px' style='width:500px;' > <tr>
				<th width='5%'>सि न:</th>
				<th width='10%'>पदको किसिम</th>
				<th>स्तर </th>
				<th>सविक पद</th>
				<th>थप</th>
				<th>घट</th>
				<th>खुद कायम</th>
				<th>पद संकेत न</th>
				<th>कैफियत</th>
				
			</tr> 	<tr>
				<td>".$res['S_no']."</td>
				<td>".$res['pos_type']."</td>
				<td>".$res['taha']."</td>
				<td>".$res['sabik_padh']."</td>
				<td>".$res['thap']."</td>
				<td>".$res['ghat']."</td>
				<td>".$res['khud_kayam']."</td>
				<td>".$res['padh_sanket_no']."</td>
				<td>".$res['remarks']."</td>
				
			</tr>
			
		</table><br>
		<table  border ='1px' >
			<tr>
				<td width='200px' colspan=5>सम्बन्धित स्थानीय निकायको तर्फबाट उपरोक्त निर्णय संलग्न राखी पद दर्ता गरी जानकारी दिनुहुन अनुरोध छ |</td>
				<td width='200px' colspan=4>जनशक्ति विकास तथा स्थानीय निकाय कर्मचारी अभिलेख शाखाबाट माथि उल्लेख पद विधुतीय माध्यमबाट समेत दरबन्दी व्यवस्थापन प्रणालीमा प्रविशिस्ट गरी कार्यालय संकेत ..........मा पद दर्ता गरिएको प्रमाणित गरिएको छ |</td>
			</tr>
		</table> <br><br>
		<table  border='1px'>
			<tr>
				<td colspan=5>दस्तखत:</td>
				<td colspan=4>दस्तखत:</td>
			</tr>
			<tr>
				<td colspan=5>नाम:</td>
				<td colspan=4>नाम:</td>
			</tr>
			<tr>
				<td colspan=5>पद:</td>
				<td colspan=4>पद:</td>
			</tr>
			<tr>
				<td  colspan=5>पद:</td>
				<td  colspan=4>प्रमाणित गर्ने अधिकृत:</td>
			</tr>
		</table>";
		
	}
/*$test="<table  ><tr><td>"$_POST['id']"</td><td>Cell 2</td></tr></table>";*/
echo $test;
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

?>