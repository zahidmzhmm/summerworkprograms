<?php

require_once("books.html.php");
$msg=$_GET['msg'];
echo"<a class='log-in-error'>".$msg."</a>";
$action=$_GET['action'];
$id=$_GET['id'];

$status=$_GET['status'];
switch($action){
 case 'state':
     state($id,$status);
	 break;
 case 'edit':
	edit($id);
	break;
case 'delete':
	delete($id);
break;
case 'save':
 save($id);
break;
case 'new':
 	books::new_data();
 break;
default:

  showAll();
  break;
}
function showALL(){
$sql="SELECT * FROM ak_books ORDER BY id DESC";
$result=mysql_query($sql);
books::showAll($result);
}

function save($id=NULL){


	$dest_path_thumb="../uploaded/books/images/thumbnails/";
	$dest_path_file="../uploaded/books/files/";
	$dest_path_audio="../uploaded/books/audio/";
	
	$title=$_POST['title'];
	$category=$_POST['category'];
	$author=$_POST['author'];
	$status=$_POST['status'];
	
	$thumb_update=0;
		if($_FILES['book_image']['name']!='')
		{
			$picture=$_FILES['book_image']['name'];
			$pic_tmp=$_FILES['book_image']['tmp_name'];

			$parts=explode(".",$picture);
			$size=sizeof($parts);
			$ext=$parts[$size-1];
			
				srand(make_seed());
				$randval = rand();				
				//get the random name for the file
				$filename="product".$randval.".".$ext;
				$picture_thumb=$filename;
				
				//get the mime type of the picture
				$thumb_update=1;
				
			} else{
			
			$picture_thumb="";
			}
			
			if ($thumb_update==1)
			{
			$mimetype=$_FILES['book_image']['type'];
			@move_uploaded_file($pic_tmp,$dest_path_thumb.$filename);
			Create_ThumbNail($dest_path_thumb.$filename,$mimetype, $dest_path_thumb, 150, 112,$filename,$dest_path_thumb);
			//Create_ThumbNail($dest_path_image.$filename,$mimetype, $dest_path_image, 150, 112,$filename,$dest_path_image);
			}
			
			
			$videos_name = $_FILES['book_file']['name'];
							
				$videos_update=0;
								
			    	if (($videos_name<>"none") && ($videos_name<>"")):
	 	  	  		$videos_name=str_replace(" ","_",$videos_name);
     				$videos_name=randomkeys(3)."__".$videos_name;
					$videos_update=1;
				else:
					$videos_name="";
				endif;
				if ($videos_update==1):
		  		  	@move_uploaded_file($_FILES['book_file']['tmp_name'], "../uploaded/books/files/$videos_name");
					chmod("../uploaded/books/files/$videos_name", 0777);
        		endif;
				
			$audio_name = $_FILES['audio_file']['name'];
							
				$audio_update=0;
								
			    	if (($audio_name<>"none") && ($audio_name<>"")):
	 	  	  		$audio_name=str_replace(" ","_",$audio_name);
     				$audio_name=randomkeys(3)."__".$audio_name;
					$audio_update=1;
				else:
					$audio_name="";
				endif;
				if ($audio_update==1):
		  		  	@move_uploaded_file($_FILES['audio_file']['tmp_name'], "../uploaded/books/audio/$audio_name");
					chmod("../uploaded/books/audio/$audio_name", 0777);
        		endif;
			
	
	if($id!=''){
	
			
		$sql = "UPDATE ak_books SET ";
		$sql .= "title = '$title',";
		$sql .= "category = '$category',";
		$sql .= "author = '$author',";
		if ($thumb_update==1):
		    $sql .= "book_image = '$picture_thumb',";
					
		endif;
		if ($videos_update==1):
		    $sql .= "book_file = '$videos_name',";
					
		endif;
		
		if ($audio_update==1):
		    $sql .= "audio_file = '$audio_name',";
		endif;
		
		$sql .= "status = '$status' ";	
		$sql .= "WHERE id='$id'";
		
		$result=mysql_query($sql);
		
		if (strlen(trim($prev_book_image))>0 && $thumb_update==1){
			@unlink($dest_path_thumb.$prev_book_image);
			@unlink($dest_path_image.$prev_book_image);
			
			}
		 if (strlen(trim($prev_book_file))>0 && $videos_update==1){
			@unlink($dest_path_file.$prev_book_file);
			}
		if (strlen(trim($prev_audio_file))>0 && $audio_update==1){
			@unlink($dest_path_audio.$prev_audio_file);
			}
		
		
}else{
		$date=date("Y-m-d");
		
			$sql="INSERT INTO ak_books (		title,
												category,
												author,
												book_image,
												book_file,
												audio_file,
												upload_date,
												status
												)
				VALUES 
												(
												'$title',
												'$category',
												'$author',
												'$picture_thumb',
												'$videos_name',
												'$audio_name',
												'$date',
												'$status'
												)";
		
		$result=mysql_query($sql);
		}
		
		
		if(mysql_error()){
		echo "<script>location.href='home.php?modules=books&msg=Error in mysql function'</script>";
		}		
		echo "<script>location.href='home.php?modules=books'</script>";
		}



function delete($id){
$sql1="SELECT * FROM ak_books where id=$id";
$result1=mysql_query($sql1);
$row=mysql_fetch_row($result1);
@unlink("../uploaded/books/images/thumbnails/".$row[4]);
@unlink("../uploaded/books/files/".$row[3]);
$sql="DELETE FROM ak_books WHERE id =$id";
$result=mysql_query($sql);
echo "<script>location.href='home.php?modules=books'</script>";
}
function edit($id){
$sql="SELECT * FROM ak_books where id=$id";
$result=mysql_query($sql);
books::new_data($result);
}

function  state($id,$status){

if($status==1)
$change=0;
else
$change=1;

$sql="UPDATE `ak_books` SET `status` = $change WHERE `id` = $id";
$result=mysql_query($sql);
echo "<script>location.href='home.php?modules=books'</script>";
}
?>

