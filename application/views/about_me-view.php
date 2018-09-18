<style>
.image {
	border:1px solid #fff;
	float:left;
	margin-right:1em;
	margin-bottom:3em;
}
#curriculum-text div {
	
	
}
.content div{
	width:800px;
	color:white;
	font:18px/24px arial;
}
</style>
<div id="bd" style="margin-left:1em;"> 
 
   <!-- Preset Templates control the width and alignment of the two blocks (div.yui-b). --> 
   <!-- The wide column is wrapped in div#yui-main --> 
   <div id="yui-main"> 
      <div class="yui-b"> 
         <div><img src="<?php echo base_url()?>../design/perfil-nora2.jpg" alt="NORA LATORRE" class="image" width="150" /></div>
         <div class="content" style="float:left; width:400px; padding:1em; padding-top:0; border-left:1px solid #7F0104; color:#7F0104">
           <!--<h1 class="categoryTitle"><?php echo $list['title'];?></h1>-->
           <p id="curriculum-text"><?php echo $list['body'];?></p>
   
         <p style="margin-left: 5%;"> </p>
       </div>
          
         
      </div> <!-- eof yui-b -->
   </div> <!-- eof yui-main -->

   <!-- the unwrapped div.yui-b takes a fixed width and alignment based on the class of the top-level containing node --> 
   <div class="yui-b">
   </div> 
   
</div> <!-- eof bd -->