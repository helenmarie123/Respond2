<?php    
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
	include 'app.php'; // import php files
	
	$authUser = new AuthUser(); // get auth user
	$authUser->Authenticate('All');
?>
<!DOCTYPE html>
<html>

<head>
	
<title>Branding&mdash;<?php print $authUser->SiteName; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- include css -->
<link href="<?php print FONT; ?>" rel="stylesheet" type="text/css">
<link href="<?php print BOOTSTRAP_CSS; ?>" rel="stylesheet">
<link href="<?php print JQUERYUI_CSS; ?>" rel="stylesheet">
<link href="<?php print FONTAWESOME_CSS; ?>" rel="stylesheet">
<link type="text/css" href="css/app.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/dialog.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/messages.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/list.css?v=<?php print VERSION; ?>" rel="stylesheet">
<link type="text/css" href="css/dropzone.css?v=<?php print VERSION; ?>" rel="stylesheet">

</head>

<body data-currpage="branding">
	
<!-- required for actions -->
<input type="hidden" name="_submit_check" value="1"/>

<p id="message">
  <span>Holds the message text.</span>
  <a class="close" href="#"></a>
</p>

<?php include 'modules/menu.php'; ?>

<section class="main">

    <nav>
        <a class="show-menu"><i class="fa fa-bars fa-lg"></i></a>
    
        <ul>
		    <li class="static active"><a href="branding">Branding</a></li>
        </ul>
        
        <a class="primary-action" data-bind="click: showImagesDialog"><i class="fa fa-plus-circle fa-lg"></i> Update Logo</a>
    </nav>

  <div class="row-fluid">
    <div class="span12">
	
		<form class="form-horizontal">

		<div class="form-group">
			<label class="col-lg-2 control-label">Default Logo:</label>

			<div class="col-lg-10">
                <span id="logo">
                    <img data-bind="attr:{'src': fullUrl, 'logo-url': logoUrl}" style="max-width: 500px">
                </span>
			</div>
		</div>
	
		</form>
		<!-- /.form-horizontal -->
		
	</div>
	<!-- /.span12 -->	
	
  </div>
  <!-- /.row-fluid -->

</section>
<!-- /.main -->

<div id="overlay"></div>

<div class="immersive" id="imagesDialog">
  <div class="immersive-header">
    <h3>Select or upload a new image</h3>
    <button type="button" class="close" data-dismiss="modal">x</button>
  </div>
  <!-- /.modal-header -->

  <div class="immersive-body">
  
    <h2 data-bind="visible: (newimages().length > 0)">New Images</h2>

    <div  data-bind="visible: (newimages().length > 0)" class="image-list">
    
        <!-- ko foreach:newimages -->
        <div class="image new">
            <img data-bind="attr:{'src': thumbUrl}, click: $parent.changeLogo">
            <small>
                <span data-bind="text: filename"></span><br>
                <span data-bind="text: width"></span>px x <span data-bind="text: height"></span>px
            </small>
        </div>
        <!-- /ko -->

    </div>
  
    <h2>Existing Images</h2>

    <div class="image-list">
    
        <!-- ko foreach:images -->
        <div class="image existing">
            <img data-bind="attr:{'src': thumbUrl}, click: $parent.changeLogo">
            <small>
                <span data-bind="text: filename"></span><br>
                <span data-bind="text: width"></span>px x <span data-bind="text: height"></span>px
            </small>
        </div>
        <!-- /ko -->

    </div>
    
    <div id="drop" class="dropzone in-dialog">
        <span class="dz-message">
            <i class="fa fa-cloud-upload fa-4x"></i> Drag file here or click to upload</span>
        </span>
    </div>
    <!-- /.dropzone -->
    
  </div>
  <!-- /.modal-body -->

</div>
<!-- /.modal -->


</body>

<!-- include js -->
<script type="text/javascript" src="<?php print JQUERY_JS; ?>"></script>
<script type="text/javascript" src="<?php print JQUERYUI_JS; ?>"></script>
<script type="text/javascript" src="<?php print BOOTSTRAP_JS; ?>"></script>
<script type="text/javascript" src="<?php print KNOCKOUT_JS; ?>"></script>
<script type="text/javascript" src="js/helper/moment.min.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/global.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/dialog.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/messages.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/helper/dropzone.js?v=<?php print VERSION; ?>"></script>
<script type="text/javascript" src="js/viewModels/brandingModel.js?v=<?php print VERSION; ?>"></script>

</html>