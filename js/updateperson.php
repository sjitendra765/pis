<?php

 $postdata = file_get_contents("php://input");
 $request = json_decode($postdata);
 	@$Year = $request->dob_year;
	@$Month = $request->dob_month;
	@$Day = $request->dob_day;
	$date_of_birth = $Year . "-" . $Month . "-" . $Day;
  include_once('connection.php');
  $sql = "update personal_info 
  		 set cast = '$request->cast',
	citizenno = '$request->citizenno',
	date_30 = '$request->date_30',
	date_58 = '$request->date_58',	
	
	dob_ad = '$request->dob_ad',
	first_name = '$request->first_name',
	f_firstname = '$request->f_firstname',
	f_middlename = '$request->f_middlename',
	f_lastname = '$request->f_lastname',
	f_occup = '$request->f_occup',
	g_firstname = '$request->g_firstname',	
	h_firstname = '$request->h_firstname',
	h_middlename = '$request->h_middlename',
	h_lastname = '$request->h_lastname',
	h_occup = '$request->h_occup',
	last_name = '$request->last_name',
	midlle_name = '$request->midlle_name',
	m_firstname = '$request->m_firstname',
	m_middlename = '$request->m_middlename',
	m_lastname = '$request->m_lastname',
	m_occup = '$request->m_occup',
	nominee_name = '$request->nominee_name',
	no_of_sons = '$request->no_of_sons',
	no_of_daughter = '$request->no_of_daughter',
	n_blockno = '$request->n_blockno',
	n_district = '$request->n_district',
	n_tole = '$request->n_tole',
	n_village = '$request->n_village',
	n_wardno = '$request->n_wardno',
	n_zone = '$request->n_zone',
	p_blockno = '$request->p_blockno',
	p_district = '$request->p_district',
	p_tole = '$request->p_tole',
	p_village = '$request->p_village',
	p_wardno = '$request->p_wardno',
	p_zone = '$request->p_zone',
	religion = '$request->religion',
	sex = '$request->sex',
	t_blockno = '$request->t_blockno',
	t_district = '$request->t_district',
	t_tole = '$request->t_tole',
	t_village = '$request->t_village',
	t_zone = '$request->t_zone',
	t_wardno = '$request->t_wardno',
	office_name = '$request->office_name',
	padh = '$request->padh',
	level = '$request->level',
	sewa_samuha = '$request->sewa_samuha',
	niyukta_miti = '$request->niyukta_miti',
	sanket_no = '$request->sanket_no',
	typep = '$request->typep',
	loffice = '$request->loffice' 
	 where id = '$request->id' " ;
  			
 	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 