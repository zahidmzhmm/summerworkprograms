<?php
	session_start();
	
	$users_id=$_SESSION["user_id"];
	$fname = $_POST["fname"] ;
    $lname = $_POST["lname"] ;
    $midname =$_POST["midname"] ;
    $dob_month = $_POST["dob_month"] ;
    $dob_day = $_POST["dob_day"] ;
    $dob_year = $_POST["dob_year"] ;
    $age = $_POST["age"] ;
    $gender = $_POST["gender"] ;
    $birth_country = $_POST["birth_country"] ;
    $no_siblings = $_POST["no_siblings"] ;
    $contact_address = $_POST["contact_address"] ;
    $mobile_no = $_POST["mobile_no"] ;
    $phone_no = $_POST["phone_no"] ;
    $email = $_POST["email"] ;
    $passport_number = $_POST["passport_number"] ;
    $inst = $_POST["inst"] ;
    $add_institution = $_POST["add_institution"] ;
    $course_study = $_POST["course_study"] ;
    $level_study = $_POST["level_study"] ;
    $holiday_start = $_POST["holiday_start"] ;
    $holiday_ends = $_POST["holiday_ends"] ;
    $travel_where = $_POST["travel_where"] ;
    $grad_date = $_POST["grad_date"] ;
    $name_contact_us = $_POST["name_contact_us"] ;
    $add_contact_us = $_POST["add_contact_us"] ;
    $name_sponsor = $_POST["name_sponsor"] ;
    $address_sponsor = $_POST["address_sponsor"] ;
    $sp_ph_no = $_POST["sp_ph_no"] ;
    $sp_email = $_POST["sp_email"] ;
    $profession = $_POST["profession"] ;
    $par_sum_progm = $_POST["par_sum_progm"] ;
    $hear_abt_us = $_POST["hear_abt_us"] ;	
	$query="UPDATE `tbl_member`
SET 
  
  `firstname` = '$fname',
  `lastname` = '$lname',
  `midname` = '$midname',
  `email` = '$email', 
  `dob_month` = '$dob_month',
  `dob_day` = '$dob_day',
  `dob_year` = '$dob_year',
  `age` = '$age',
  `gender` = '$gender',
  `birth_country` = '$birth_country',
  `siblings` = '$no_siblings',
  `contact_add` = '$contact_address',
  `mobile_no` = '$mobile_no',
  `phone_no` = '$phone_no',
 
  `passport` = '$passport_number',
  `name_inst` = '$inst',
  `add_inst` = '$add_institution',
  `course_std` = '$course_study',
  `level_std` = '$level_study',
  
  `holiday_start` = '$holiday_start',
  `holiday_end` = '$holiday_ends',
 
  `trvl_where` = '$travel_where',
  `grd_date` = '$grad_date',
  `nm_cont_us` = '$name_contact_us',
  `add_cont_us` = '$add_contact_us',
  `nam_sp` = '$name_sponsor',
  `add_sp` = '$address_sponsor',
  `phone_sp` = '$sp_ph_no',
  `email_sp` = '$sp_email',
  `prof_sp` = '$profession',
  `why_part` = '$par_sum_progm',
  `hear_us` = '$hear_abt_us'  
WHERE `users_id` = '$users_id';";
	
	
	sql::update_query($query);
?>