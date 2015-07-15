<?php defined( 'BASEPATH') OR exit( 'No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>CodePlay</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap-theme.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/layout/layout.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/codemirror/lib/codemirror.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/codemirror/theme/3024-night.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/codemirror/addon/lint/lint.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/main/style.css')?>">
	<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
	<script src="https://togetherjs.com/togetherjs-min.js"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/layout/jquery.ui.all.js')?>"></script>
	<script src="<?php echo base_url('assets/layout/layout.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/lib/codemirror.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/lib/codemirror.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/hint/show-hint.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/fold/xml-fold.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/edit/closetag.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/edit/closebrackets.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/edit/matchtags.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/edit/trailingspace.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/mode/xml/xml.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/mode/javascript/javascript.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/mode/css/css.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/mode/htmlmixed/htmlmixed.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/lint/lint.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/lint/css-lint.js')?>"></script>
	<script src="<?php echo base_url('assets/codemirror/addon/lint/javascript-lint.js')?>"></script>
	<script src="<?php echo base_url('assets/main/main.js')?>"></script>
</head>

<body>
	<div class="ui-layout-north">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="font-size:22px;">&lt;/CodePlay></a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li><a href="" id="downloadlink" download="code.html"><i class="fa fa-download">&nbsp;</i>Download</a>
						</li>
						<li><a href="javascript:{}" onclick="document.getElementById('savedata').submit();"><i class="fa fa-save">&nbsp;</i>Save</a>
						</li>
						<li><a data-toggle="modal" href="#myModal"><i class="fa fa-share">&nbsp;</i>Share</a>
						</li>
						<li><a href=""onclick="TogetherJS(this); return false;"><i class="fa fa-group">&nbsp;</i>Collaborate</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="ui-layout-center editor"><span class="heading" style="color:#ffffff;">css</span>
		<textarea id="css" rows="100" style="background:333333;width:100%;"></textarea>
	</div>
	<div class="ui-layout-south">
		<iframe id="preview" width="100%" height="100%" frameborder="0"></iframe>
	</div>
	<div class="ui-layout-east editor"><span class="heading" style="color:#ffffff;">js</span>
		<textarea id="js" rows="100" style="background:333333;width:100%;"></textarea>
	</div>
	<div class="ui-layout-west editor"><span class="heading" style="color:#ffffff;">html</span>
		<textarea id="html" rows="100" style="background:333333;width:100%;"></textarea>
	</div>
	<div style="display:none">
		<form id="savedata" action="/save" method="post">
			<textarea id="fh" name="hcode"></textarea>
			<textarea id="fj" name="jcode"></textarea>
			<textarea id="fc" name="ccode"></textarea>
		</form>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">OOPS!</h4>
				</div>
				<div class="modal-body">
					<p>Please save your work before you can stat sharing.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
</body>

</html>