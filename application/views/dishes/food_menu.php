 <style>
   .sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 40px;
    left: 0;
    overflow-x: hidden;
    padding-top: 80px;
    border-right:solid #DBE9F4 0.5px;
    background-color: #009688;
	}

	.sidenav a {
	    padding: 6px 8px 6px 16px;
	    text-decoration: none;
	    font-size: 16px;
	    color: #fff;
	    display: block;
	}

	.sidenav a:hover {
	    color: blue;
	}

	.main {
	    font-size: 18px; /* Increased text to enable scrolling */
	}

	/*sidena2*/
	 .sidenav2 {
	    height: 100%;
	    width: 200px;
	    position: fixed;
	    z-index: 1;
	    top: 40px;
	    right: 0;
	    color: black;
	    overflow-x: hidden;
	   padding-top: 80px;
	    border-left:solid #DBE9F4 0.5px;
	    background-color: #eceff1 ;
		}

	.sidenav2 a {
	    padding: 6px 8px 6px 16px;
	    text-decoration: none;
	    font-size: 14px;
	    color: purple;
	    display: block;
	}

	.sidenav2 a:hover {
	    color: #f1f1f1;
	}
	li{
		text-decoration:none;
		list-style-type: none;
	}
	.row a:hover {
		text-decoration:none;
		color:#FFA726;
	}
	
	img{
		width: 100%;
		margin:0 auto;
	
	}
	.item{
		border-right: solid gray 1px;
		border-left: solid gray 1px;
	}
.material-icons{
    display: inline-flex;
    vertical-align: top;
}
</style>
<script src="<?php echo base_url();?>assets/js/bootbox-4.4.0.min.js"></script>
	<div class="container">
		<div class="row">
			<div class=" col-lg-2 col-md-3col-sm-6 col-xs-12 nav fixed">
				<div class="sidenav">
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Dry Food</a>
				  <a href="#about"><i class="mdi mdi-rice"></i>&nbsp; Water Food</a>
				  <a href="<?php echo base_url() ?>dishes/menu"><i class="mdi mdi-rice"></i>&nbsp; Menu</a>
				</div>
			</div>
			<div class="row">
			<h1>welcome to menu homepage</h1>
			</div>
 			<?php if($this->session->loggedIn === TRUE) { ?>
			<div class="col-md-2 col-lg-3 col-sm-6 col-xs-12">
				<div class="sidenav2">
					<ul>
						<li>
							<i style="margin-left:-30px;" class="mdi mdi-account-multiple text-info"></i> <span class="text-info">&nbsp; Users Active</span>
							
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Davy</span></a>
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Chantha</span></a>
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Khai</span></a>
						</li>
						<li>
							 <a href=""><i style="margin-left:-10px;" class="mdi mdi-account-circle"></i><span>&nbsp; Kemseong</span></a>
						</li>
					</ul>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
<script>
	$(function() {
		var comment = "";
	   $('#recomment').click(function() {
	   	bootbox.prompt({
	   	    title: " ",
	   	    inputType: 'textarea',
	   	    buttons: {
	   	        confirm: {
	   	            label: 'Comment',
	   	            className: 'btn-success'
	   	        },
	   	        cancel: {
	   	            label: 'Cancel',
	   	            className: 'btn-danger'
	   	        }
	   	    },
	   	    callback: function (result) {
	   	       comment = result;
	   	       return result;
	   	       alert(comment);
	   	    }
	   	});
	  });
	});
</script>

     
 