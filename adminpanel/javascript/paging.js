// JavaScript Document



function paging()
{
	var modules=document.getElementById('modules').value;
	var action=document.getElementById('action').value;
	var upto=document.getElementById('upto').value;
	
	var url='home.php?modules='+modules+'&action='+action+'&upto='+upto;
	window.location.href=url;
}


