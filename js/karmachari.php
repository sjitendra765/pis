<?php
include_once('connection.php');
$id = $_POST['id'];
$sql1 = "select * from personal_info where id = '$id'";
$query=$conn->query($sql1);
$sqlimage = "select * from emp_id  = '$id'";
$queryImg = $conn->query($sqlimage);
$res1 = $queryImg->fetch_array();
while($res=$query->fetch_array())
{
	$form1 = "
<h4>वैयत्यिक विवरण</h4>
  <p>नेपाल सरकार</p>
  <p>रत्ननगर जि. वि. स./महा/नगर./गा.वि.स. </p>
  <table>
      <tr><td>स्थानीय निकाय कर्मचारीको पुरा नाम , थर: ".$res['first_name']."&nbsp".$res['midlle_name']."&nbsp".$res['last_name']."</td><td>".base64_encode($res['emp_img'])."</td></tr>
      <tr><td>०२ स्थायी ठेगाना:</td><td>०३. अस्थायी ठेगाना: </td></tr><tr>
      <td>&nbsp&nbsp अंचल: ".$res['p_zone']."</td><td>&nbsp&nbsp अंचल: ".$res['t_zone']."</td></tr><tr>
      <td>&nbsp&nbsp जिल्ला: ".$res['p_district']."</td><td>&nbsp&nbsp जिल्ला ".$res['t_district']."</td></tr><tr>
      <td>&nbsp&nbsp गाउ/नगर: ".$res['p_village']."</td><td>&nbsp&nbsp गाउ/नगर: ".$res['t_village']."</td></tr><tr>
      <td>&nbsp&nbsp वार्ड नम्बर: ".$res['p_wardno']."</td><td>&nbsp&nbsp वार्ड नम्बर: ".$res['t_wardno']."</td></tr><tr>
      <td>&nbsp&nbsp गाउ/टोल: ".$res['p_tole']."</td><td>&nbsp&nbsp गाउ/टोल: ".$res['t_tole']."</td></tr><tr>
      <td>&nbsp&nbsp ब्लाक नम्बर: ".$res['p_blockno']."</td><td>&nbsp&nbsp ब्लाक नम्बर: ".$res['t_blockno']."</td></tr><tr>
      <td>०४  घर भएको जिल्ला : ".$res['p_district']."</td><td>०५  जन्मेको मिति:".$res['date_of_birth']."</td></tr><tr>
      <td>०६  ५८ वर्ष उमेर पुग्ने मिति:".$res['date_58']."</td><td>०७  सेवा अवधि ३० वर्ष पुग्ने मिति:".$res['date_30']."</td></tr><tr>
      <td>०८  नागरिकता:".$res['citizenno']."</td><td>०९  धर्म:".$res['religion']."</td></tr><tr>
      <td>१०  लिङ्ग:".$res['sex']."</td><td>११  जाती:".$res['cast']."</td></tr><tr>
      <td>१२  विवाहित भए पति/पत्नीको नाम/:  श्री/श्रीमती ".$res['h_firstname']."&nbsp ".$res['h_middlename']."&nbsp".$res['h_lastname']."<br>&nbsp&nbsp&nbsp&nbsp</td><td>१३  पति/पत्नीको पेशा:".$res['h_wife']."</td></tr><tr>
      <td>१४  छोराको संख्या: ".$res['no_of_sons']."</td><td>१५  छोरीको संख्या:".$res['no_of_daughter']."</td></tr><tr>
      <td>१६  बाबुको नाम:".$res['f_firstname']."&nbsp".$res['f_middlename']."&nbsp".$res['f_lastname']."</td><td>१७  बाबुको पेशा:".$res['f_occup']."</td></tr><tr>
      <td>१८  बाजेको नाम:" .$res['g_firstname']."&nbsp".$res['g_middelname']."&nbsp".$res['g_lastname']."</td><td>१९  आमाको नाम:".$res['m_firstname']."&nbsp ".$res['m_middlename']."&nbsp".$res['m_lastname']."</td></tr><tr>
      <td>२०  आमाको पेशा:".$res['m_occup']."</td></tr><tr>
      <td>२१  इच्याएको व्यक्तिको नाम, थर:".$res['nominee_name']."</td></tr><tr>
      <td>&nbsp&nbsp अंचल:".$res['n_zone']."</td></tr><tr>
      <td>&nbsp&nbsp जिल्ला:".$res['n_district']."</td></tr><tr>
      <td>&nbsp&nbsp गाउ/नगर:".$res['n_village']."</td></tr><tr>
      <td>&nbsp&nbsp वार्ड नम्बर:".$res['n_wardno']."</td></tr><tr>
      <td>&nbsp&nbsp गाउ/टोल:".$res['n_tole']."</td></tr><tr>
      <td>&nbsp&nbsp कर्मचारी निजको सम्बन्ध:</td></tr> 
      <tr><td>२२  नियुक्तिको को विवरण</td></tr> 
      <td>&nbsp&nbsp कार्यलयको नाम:".$res['office_name']."</td></tr> 
      <td>&nbsp&nbspपद:".$res['padh']."</td></tr> 
      <td>&nbsp&nbspश्रेणी:".$res['level']."</td></tr> 
      <td>&nbsp&nbsp सेवा/समूह:".$res['sewa_samuha']."</td></tr> 
      <td>&nbsp&nbsp नियुक्त मिति:".$res['niyukta_miti']."</td></tr> <table>
      <p>माथि लेखिएको विवरण ठीक छ | सरकारी सेवाको निमित्त अयोग्य हुने गरी मलाई कुनै सजाय भएको छैन | कुनै कुरा झुठो लेखिएको वा  जानीजानी साँचो कुरा दबाउन लुकाउन उधेश्यले लेखिएको ठहरे कानुन बमोजिम सजाय स्वीकार गर्नेछु भनी सही छाप गर्ने: </p>";
      $chap = "<table> <tr> <td>कर्मचारीको (बुडी औलाको छाप )</td>
                  <td>दस्तखत</td>
                  <td>प्रमाणित गर्ने प्रमुखको नाम</td></tr>
                 <tr >
          <td height='200px' width='200px'></td>
          <td height='200px' width='200px'></td>
          <td></td>
        </tr> 
        <tr> <td>दाँया</td><td>बायाँ</td><td>कार्यालयको छाप</td></tr>
        <tr><td colspan=3>जनशक्ति विकास तथा स्थानीय निकाय कर्मचारी अभिलेख शाखाले प्रयोग गर्ने:</td></tr>
        <tr><td>कर्मचारीको संकेत नम्बर:</td></tr>
        <tr><td>५८ वर्ष पुग्ने मिति:".$res['date_58']."</td></tr>
        <tr><td>सेवा अवधि ३० वर्ष पुरा हुने मिति:".$res['date_30']."</td></tr>
        <tr><td>विभागीय प्रमुख वा अधिकार प्राप्त:</td></tr>
        <tr><td>अधिकृतको दस्तखत:</td></tr>
        <tr><td>कार्यलयको छाप:</td></tr>";
echo $form1;
echo $chap;
}
$sql2 = "select * from terij_karyalaya where per_id = '$id' ";
$query1=$conn->query($sql2);
$form2 = "<h4>सेवाको विवरण</h4>
  <table border='1px'>
      <tr>
        <th colspan = '6'> कर्मचारीको नाम :".$res['s_empname']."</th>
        <th colspan = '6'>संकेत नम्बर :</th>
      </tr>
      <tr>
        <td>स न.</td>
        <td>तह</td>
        <td>पढ को नाम</td>
        <td>श्रेणी</td>
        <td>कार्यालयको नाम</td>
        <td>नया नियुक्ति</td>
        <td>बहाली मिती</td>
        <td>निर्णय मिती</td>
        <td>तलब</td>
        <td>भत्ता</td>
        
      </tr>      
     ";
     echo $form2;
    while($res=$query1->fetch_array())
{
      $form2Data = "<tr >
        <td>".$res['s_no']."</td>
        <td>".$res['sttar']."</td>
        <td>".$res['padh_name']."</td>
        <td>".$res['e_level']."</td>
        <td>".$res['s_office_name']."</td>
        <td>".$res['new_recruit']."</td>
        <td>".$res['bahali_miti']."</td>
        <td>".$res['nirnaya_date']."</td>
        <td>".$res['Salary']."</td>
        <td>".$res['incentive']."</td>        
      </tr>";
      echo $form2Data;
}
$form2end = "</table>";
echo $form2end;
$sql3 = "select * from certi_exp where per_id = '$id'";
$query3 = $conn->query($sql3);
$form3 = "h4>शैक्षिक योग्यता,तालिम, सेमिनार सम्मेलन</h4>
<table border='1px'>
      <tr>
        <th colspan = '5'> कर्मचारीको नाम {{c.c_employeename}}</th>
        <th colspan = '5'>संकेत नम्बर </th>
        
      </tr>
      <tr>
        <td>स न.</td>
        <td>सेर्टीफिकेट वा उपाधी</td>
        <td>अध्धयनको बिषय</td>
        <td colspan='2'>अध्धयन अवधी</td>
        <td>श्रेणी</td>
        
        <td colspan='2'>शिक्षण संस्था</td>
        <td>तालिम सेमिनार वा सम्मेलनको विवरण</td>
        <td>कैफियत</td>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>देखि</td>
        <td>सम्म</td>
        <td></td>
        <td>नाम</td>
        <td>ठेगाना</td>
        <td></td>
        <td></td>   

        
      </tr>
        ";
        echo $form3;
        while($res=$query3->fetch_array())
{
$form3data = "<tr >
        <td>".$res['s_no']."</td>
        <td>".$res['certificate_name']."</td>
        <td>".$res['certi_subject']."</td>
        <td>".$res['start_date']."</td>
        <td>".$res['end_date']."</td>
        <td>".$res['level']."</td>
        <td>".$res['certi_org_name']."</td>
        <td>".$res['certi_org_address']."</td>
        <td>".$res['seminar_training']."</td>
        <td>".$res['remarks']."</td>
        
      </tr>";
      echo $form3data;
}
$sql4 = "select * from section_punish where per_id='$id'";
$query4 = $conn->query($sql4);
$form4 = "<h4>विभागीय सजायको विवरण</h4>
    </table>
    <table border='1px'>
      <tr>
        <th colspan = '5'> कर्मचारीको नाम:{{punish.s_employeename}}</th>
        <th colspan = '5'>संकेत न.:</th>
      </tr>
      <tr>
        <td>स न.</td>
        <td colspan='2'>सजायको प्रकार</td>
                        
        <td colspan='2'>सजायको आदेश मिती</td>
        <td colspan='3'>पुनरावेदनको कार्यालयको नाम</td>
        <td colspan='2'>कैफियत</td>
        
      </tr>
      <tr>
        <td></td>
        <td colspan='2'></td>
        <td colspan='2'></td>
        
        <td colspan='2'>ठहर</td>
        <td>मिती</td>
        <td colspan='2'></td>
      
      </tr>";
      echo $form4;
          while($res=$query3->fetch_array())
{
$form4data="<tr>
        <td>".$res['s_no']."</td>
        <td colspan='2'>".$res['punishment_type']."</td>
        <td colspan='2'>".$res['punishment_date']."</td>
        
        <td colspan='2'>".$res['appeal_name']."</td>
        <td>".$res['appeal_date']."</td>
        <td colspan='2'>".$res['remarks']."</td>    
        
      </tr>";
      echo $form4data;
}
$sql5 = "select * from heath_holidays where per_id = '$id'";
$query5 = $conn->query($sql5);
$form5 = "<h4>बिदा र औषधी उपचार विवरण</h4>
    <table border='1px' >
      <tr>
        <th>विवरण </th>
        <th colspan='3'>घर बिदा</th>
        <th colspan='3'>विरामी विदा</th>
        <th colspan='3'> प्रसुती विदा / प्रसुती स्याहार विदा</th>
        <th colspan='3'>अध्ययन विदा</th>
        <th colspan='3'>असाधारण विदा</th>
        <th colspan='3'> गयल विदा</th>
        <th>उपचार खर्च</th>
        <th>कैफियत</th>
        
      </tr>
      <tr>
        <td></td>
        <td>जम्मा</td>
        <td>खर्च</td>
        <td>बाकी</td>
        <td>जम्मा</td>
        <td>खर्च</td>
        <td>बाकी</td>
        <td>जम्मा</td>
        <td>खर्च</td>
        <td>बाकी</td>
        <td>जम्मा</td>
        <td>खर्च</td>
        <td>बाकी</td>
        <td>जम्मा</td>
        <td>खर्च</td>
        <td>बाकी</td>
        <td>जम्मा</td>
        <td>खर्च</td>
        <td>बाकी</td>
        <td>लिएको मिती</td>
        <td></td>
        
      </tr>";
      echo $form5;
       while($res=$query5->fetch_array())
{
   $form5data="    <tr >
        <td>".$res['discription']."</td>
        <td>".$res['h_total']."</td>
        <td>".$res['h_taken']."</td>
        <td>".$res['h_left']."</td>
        <td>".$res['sick_total']."</td>
        <td>".$res['sick_taken']."</td>
        <td>".$res['sick_left']."</td>
        <td>".$res['paternity_total']."</td>
        <td>".$res['paternity_taken']."</td>
        <td>".$res['paternity_left']."</td>
        <td>".$res['education_total']."</td>
        <td>".$res['education_taken']."</td>
        <td>".$res['education_left']."</td>
        <td>".$res['emergency_total']."</td>
        <td>".$res['emergency_taken']."</td>
        <td>".$res['emergency_left']."</td>
        <td>".$res['absent_total']."</td>
        <td>".$res['absent_taken']."</td>
        <td>".$res['absent_left']."</td>
        <td>".$res['treatment_date']."</td>
        <td>".$res['remarks']."</td>
        
      </tr>";
echo $form5data;
}
$sql6 = "select * from emp_document where emp_id = '$id'";
$query6 = $conn->query($sql6);
while($res = mysqli_fetch_array($query6)){
      $from6 = base64_encode($res['img']);
      echo $form6;
}
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");


?>