<script src="WABootstrap/bootstrap.js" type="text/javascript"></script>
<script src="WABootstrap/jquery-1.10.2.js" type="text/javascript"></script>
<script src="WABootstrap/modernizr-2.6.2.js" type="text/javascript"></script>
<script src="WABootstrap/respond.js" type="text/javascript"></script>
<!-- Navigation bar-->
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<!--Collapse button-->
<div class="navbar-header">
	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		 <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" runat="server" href="index.php?content_page=Introduction">WA2017</a>
</div>
<!--links-->
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a runat="server" href="index.php?content_page=Introduction">Home</a></li>
<li><a runat="server" href="index.php?content_page=WAAboutUs">AboutUs</a></li>
<li><a runat="server" href="index.php?content_page=WAContactUs">ContactUs</a></li>
<li><a runat="server" href="index.php?content_page=ManagePaper">Manage Papers</a></li>
</ul>
</div>
</div>
</div>    

 <div id="header">
 <div id="logo" onClick="location.href='index.php?content_page=Introduction'">
 </div>
 </div>
 <!-- The body area -->
 <div id="left" class="col-md-2"><?php include('Menu.php');?></div>
 <div id="right" class="col-md-10"><?php include($page_content);?></div> 
 
  <!-- Footer -->
  <div style="position: fixed; bottom: 0px; left:0px;">
      <!-- Call javascript function -->
  <script type="text/javascript">
      current_time();
  </script>
  </div>
  <div style="position: fixed; bottom: 0px; right:0px;">
  &copy;2017 Unitec Institute of Technology
  </div>
