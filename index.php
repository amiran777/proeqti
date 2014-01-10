<html>
<head><title>
	Bookmarks 4 Ever!!!!!

</title>
</head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<body>
<form action="server.php" method="POST" id="form">
<p>Bookmark Url</p>
<input name="url" type="text" value="http://">
<input type="submit" name="submit"> 
</form>
<script>
	 
     $("#form").submit(function( event ){
    event.preventDefault();
    var information = $("#form").serialize();
       var response =  $.post("server.php", information); 
    
	  response.done(function (data){
     $('#div').replaceWith(data);     
         }); 
		 });
		 
$(document).on('click' ,'button' ,function() {
    event.preventDefault();
	   
       var response =  $.post("server.php", {delete : this.id});
       response.done(function (data){
     $('#div').replaceWith(data);     
         }); 
 });


</script>

<div id="div">

</div>
</body>
</html>