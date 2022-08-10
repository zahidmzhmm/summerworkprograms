<script type="text/javascript">

function validateFileExtension(fld) {

var sel = document.getElementById("category");

if((selvalue=sel.options[sel.selectedIndex].value==1) || (selvalue=sel.options[sel.selectedIndex].value==2)){
		if(!/(\.doc|\.docx)$/i.test(fld.value)) {
		alert("Invalid Document file");
		fld.form.reset();
		fld.focus();
		return false;
		}
}else if(selvalue=sel.options[sel.selectedIndex].value==3){
		if(!/(\.mp3)$/i.test(fld.value)) {
		alert("Invalid Audio file");
		fld.form.reset();
		fld.focus();
		return false;
		}
}else{

}

			
		
		
	return true;
	
	
}


function show(id)
{

var ajaxRequest;  // The variable that makes Ajax possible!
	
		try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
		} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		document.getElementById("slideaudio").innerHTML=ajaxRequest.responseText;
		
		}
	}
	ajaxRequest.open("GET", "modules/books/audioinput.php?id="+id, true);
	ajaxRequest.send(null); 


}

</script>


<?php 
class books{
function showAll($result){
?>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
  <td class="item-head">Books Details</td>
      <td align="right"><div class="add-btn"><a href="home.php?modules=books&action=new">Add New Book </a></div></td>
  </tr>
  <tr>
    <td colspan="2">
      <table width="100%" cellpadding="5" cellspacing="1" class="item-details">
        <tr class="bar">
          <td>Sn. </td>        
          <td>Title</td>  
		  <td>Author</td>
		  <td>File</td>
		  <td>Image</td>
		  <td>Category</td>
		  <td>Uploaded Date</td>
		  <td>Counter</td>
		  <td>Status</td>
          <td colspan="2" width="10%">Action</td>
        </tr>
        <?php
		if($result!='')
		{
		$i=0;
		while($row=mysql_fetch_array($result) )
		{
		
		?>
		
			
        <tr>
          <td align="center"><?=++$i?></td>
              <td align="center"><?= $row['title'];?></td>  
			    <td align="center"><?= $row['author'];?></td>
				  <td align="center"><?= $row['book_file'];?></td>
				    <td align="center"><img src="../uploaded/books/images/thumbnails/<?= $row['book_image'];?>" width="30" height="16"/></td>  
					  <td align="center"><?php if($row['category']==1)$category="Slide Book";if($row['category']==2)$category="Text Book";if($row['category']==3)$category="Audio Book"; echo $category;?></td>
					    <td align="center"><?= $row['upload_date'];?></td>   
						  <td align="center"><?= $row['count'];?></td>         
          
          <td> <a href="home.php?modules=books&action=state&status=<?= $row['status'];?>&id=<?= $row['id'];?>">
            <?php if($row['status']=='0') 
				echo '<img src="images/no.gif" />';				
				else 
				echo '<img src="images/yes.jpg" />'; ?>
            </a></td>
          <td align="left" ><a href="home.php?modules=books&action=edit<?= '&id='.$row['id'];?>" title="Edit this Menu">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp;
          <a href="home.php?modules=books&action=delete&id=<?= $row['id'] ;?>" title="Delete this Menu" onclick="javascript: if(!confirm('Are you sure to delete this Product Quantity?')) return false;">Delete</a></td>
        </tr>
        <?php  }?>
        <tr>
          <td colspan="8"  align="center" class="currentpage"><?php

echo "1";
}else
echo "No records added";

?>          </td>
        </tr>
      </table>
      <!-- end of Category display box -->
    </td>
  </tr>
</table>
<?php
}

function new_data($data=NULL){
if(isset($data)){
$data=mysql_fetch_array($data);
}
?>

<table width="100%">
  <tr class="site-State"><td>Book Setting</td></tr>
  <tr>
  <td colspan="2"><!-- add-new category -->
    <form name="books" method="post" action="home.php?modules=books&action=save&id=<?php if(isset($data))echo $data['id'];?>" enctype="multipart/form-data" onSubmit="return(checkForm());">
      <table width="100%" cellpadding="3" cellspacing="0">
       
        <tr>
          <td width="16%" >Title:</td>
          <td width="84%"><input type="text"  name="title" id="template" size="60" value="<?= $data['title']?>"/>          </td>
        </tr>
		 <tr>
          <td >Author:</td>
          <td><input type="text"  name="author" id="template" size="60" value="<?= $data['author']?>"/>          </td>
        </tr>
		 
		 <tr>
          <td >Type:</td>
          <td><select name="category" id="category" onChange="show(this.value)">
            <option value="0">select book</option>
            <option value="1" <?php if($data['category']==1) echo "selected";?>>Slide Book </option>
            <option value="2" <?php if($data['category']==2) echo "selected";?>>Text Book</option>
            <option value="3" <?php if($data['category']==3) echo "selected";?>>Audio Book</option>
          </select></td>
        </tr>
	
		 <tr>
		   <td colspan="2">	
		  
		   <div id="slideaudio"><?php if($data['category']==1){?><table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="16%">Audio File</td>
    <td width="84%"><? if(strlen(trim($data['audio_file']))>0){?><a href="../uploaded/books/audio/<?= $data['audio_file']?>">File</a><br /><?}?><input type="file"  name="audio_file" id="audio_file" size="60" /></td>
  </tr>
</table><?php } ?></div>

</td>
		   
	      </tr>
		
		 <tr>
          <td>File:</td>
          <td><? if(strlen(trim($data['book_file']))>0){?><a href="../uploaded/books/files/<?= $data['book_file']?>">File</a><br /><?}?>
            <input type="file"  name="book_file" id="book_file" size="60" value="<?= $data['book_file']?>" onchange="return validateFileExtension(this)"/>
            Choose .doc for slide and text book and .mp3 for audio books. </td>
        </tr>
		 <tr>
          <td >Book Front Image:</td>
          <td><input type="file"  name="book_image" id="template" size="60" value="<?= $data['book_image']?>"/><br />
<? if(strlen(trim($data['book_image']))>0){?>
<img src="../uploaded/books/images/thumbnails/<?= $data['book_image']?>" width="30" height="16"/>
<?
}
?>          </td>
        </tr>
       			<tr>
				<td>Status:</td><td><input type="radio" name="status" value="1" <?php  if($data['status']==1) echo "checked";?>/>yes<input type="radio" name="status" value="0" <?php if($data['status']==0) echo "checked";?>/>No</td>
				</tr>
        <tr>
		 <td>&nbsp;</td>
		 <?php $value="INSERT";
		 if($data!='')
		 $value="UPDATE";
		 ?>
          <td><input type="submit" value="<?=$value?>" class="btnStyle" />&nbsp;&nbsp;&nbsp;<input type="reset" value="RESET" class="btnStyle" />&nbsp;&nbsp;&nbsp;<a href="home.php?modules=books" ><input type="button" value="BACK" class="btnStyle" /></a></td>
        </tr>
      </table>
	  <input type="hidden" name="prev_book_image" value="<?= $data['book_image']?>" />
	  <input type="hidden" name="prev_book_file" value="<?= $data['book_file']?>"/>
	   <input type="hidden" name="prev_audio_file" value="<?= $data['audio_file']?>"/>
    </form>
	<script language="JavaScript" type="text/javascript">
  var frmvalidator  = new Validator("books");  
  frmvalidator.addValidation("title","req","Please insert title");
  frmvalidator.addValidation("author","req","Please insert author name");
  frmvalidator.addValidation("category","dontselect=0","Please Select Category");
   </script>
    <!-- end of add-new category -->
  </td>
  </tr>
  
</table>

<?php
}

}
?>

