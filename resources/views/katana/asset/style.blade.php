<style type="text/css">
	div.dataTables_wrapper div.dataTables_length select {
		width: 100%!important;
	}
	.dropdown-item.active, .dropdown-item:active {
		background-color: #495057!important;
	}
	.fa-spin-fix .fa-spin {
		-webkit-transform-origin: 50% calc(50% - .5px);
		transform-origin: 50% calc(50% - .5px);
	}
	.sticky-head tbody {
		overflow-y: auto;
		height: 100px;
	}
	.sticky-head thead th {
		position: sticky;
		top: 0;
	}
	.sticky-head tfoot td {
		position: sticky;
		bottom: 0;
	}
	.sticky-head table  {
		border-collapse: collapse;
		width: 100%;
	}
	.sticky-head th >, .sticky-head th > td {
		padding: 8px 16px;
		background:#fff;
	}
	.btn-warning, .badge-warning {
		color: white!important;
	}

	td.details-control {
		background: url('icons/right.png') no-repeat center center;
		cursor: pointer;
}
	tr.shown td.details-control {
		background: url('icons/down.png') no-repeat center center;
	}

	.center {
		margin: auto;
		width: 50%;
		padding: 10px;
		}
	
	/*the container must be positioned relative:*/
	.autocomplete {
	position: relative;
	display: inline-block;
	}

	input {
	border: 1px solid transparent;
	background-color: #f1f1f1;
	padding: 10px;
	font-size: 16px;
	}

	input[type=text] {
	background-color: #f1f1f1;
	width: 100%;
	}

	input[type=submit] {
	background-color: DodgerBlue;
	color: #fff;
	cursor: pointer;
	}

	.autocomplete-items {
	position: absolute;
	border: 1px solid #d4d4d4;
	border-bottom: none;
	border-top: none;
	z-index: 99;
	/*position the autocomplete items to be the same width as the container:*/
	top: 100%;
	left: 0;
	right: 0;
	}

	.autocomplete-items div {
	padding: 10px;
	cursor: pointer;
	background-color: #fff; 
	border-bottom: 1px solid #d4d4d4; 
	}

	/*when hovering an item:*/
	.autocomplete-items div:hover {
	background-color: #e9e9e9; 
	}

	/*when navigating through the items using the arrow keys:*/
	.autocomplete-active {
	background-color: DodgerBlue !important; 
	color: #ffffff; 
	}

	.card-header .fa {
	transition: .3s transform ease-in-out;
	}
	.card-header .collapsed .fa {
	transform: rotate(90deg);
	}

	.d-block {
		display: block!important;
	}
	.pull-right {
		float: right !important;
	}

	.nav-tabs-custom > .nav-tabs {
	background: #ecf0f5;
	border-bottom-color: #657e96;
	}
	.nav-tabs-custom > .nav-tabs > li.active {
	border-top: 1px solid #657e96;
	border-left: 1px solid #657e96;
	border-right: 1px solid #657e96;
	}
	.nav-tabs-custom > .nav-tabs > li.active > a,
	.nav-tabs-custom > .nav-tabs > li.active:hover > a {
	background-color: #fff;
	color: #222;
	}

	html {
		overflow: scroll;
		overflow-x: hidden;
	}
	::-webkit-scrollbar {
		width: 0px;  /* Remove scrollbar space */
		background: transparent;  /* Optional: just make scrollbar invisible */
	}
	/* Optional: show position indicator in red
	::-webkit-scrollbar-thumb {
		background: #FF0000;
	} */

	.text-keterangan-produk{
		margin-left: 10px;
	}

	.card-img-product {
		height: 10px;
		width: 10px
	}

	hr {
	margin-top: 1rem;
	margin-bottom: 1rem;
	border: 0;
	border-top: 1px solid rgba(0, 0, 0, 0.1);
	}

	.switch {
	position: relative;
	display: inline-block;
	width: 40px;
	height: 14px;
	}

	.switch input { 
	opacity: 0;
	width: 0;
	height: 0;
	}

	.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #ccc;
	-webkit-transition: .4s;
	transition: .4s;
	}

	.slider:before {
	position: absolute;
	content: "";
	height: 15px;
	width: 15px;
	left: 4px;
	bottom: 0px;
	background-color: rgb(185, 52, 52);
	-webkit-transition: .4s;
	transition: .4s;
	}

	input:checked + .slider {
	background-color: #2196F3;
	}

	input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	border-radius: 34px;
	}

	.slider.round:before {
	border-radius: 50%;
	}

	input[type=text] {
		background-color: #fff;
	}

	.input-group-text {
		color: initial;
		background-color: initial;
	}

	.link {
		text-decoration: none;
	}
</style>