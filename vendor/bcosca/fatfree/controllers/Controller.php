<?php

class Controller {

	function beforeroute(){
		?>
		<div  class="col-md-12">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a href="#">Home</a></li>
			<li role="presentation"><a href="#">Profile</a></li>
			<li role="presentation"><a href="#">Messages</a></li>
		</ul>

		<?php
	}

	function afterroute(){
		?>
		</div>
		<?php
	}
}