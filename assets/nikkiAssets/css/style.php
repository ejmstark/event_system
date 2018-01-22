<?php
   header('Content-type: text/css');
   require("../../CustomizationManager.php");
   CustomizationManager::SetTheme("configurations 1");
   $colors = CustomizationManager::$colors;
?>
html, body {
    width: 100%;
    overflow-x: hidden;
}


body {
    height:100%;
    font-family: 'Open Sans', sans-serif; 
    font-weight: 300;
    padding:0;
    margin:0;
    font-size:14px;
    line-height: 28px;
    color: <?php echo $colors->USER_PAGE_FONT_COLOR; ?>; 
    background: <?php echo $colors->EVENT_PAGE_BACKGROUND_COLOR; ?>; 
    position: relative;
}
/*           Font Smoothing      */

h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, p, .navbar, .brand, .btn-simple{
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
}

/*           Typography          */

h1, .h1, h2, .h2, h3, .h3, h4, .h4{
    font-weight: 400; 
}

h1, .h1 {
    font-size: 52px;
}
h2, .h2{
    font-size: 36px;
}
h3, .h3{
    font-size: 28px;
    margin: 20px 0 10px;
}
h4, .h4{
    font-size: 22px;
}
h5, .h5 {
    font-size: 16px;
}
h6, .h6{
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
}
p{
    font-size: 15px;
    line-height: 1.6180em;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small, .h1 small, .h2 small, .h3 small, .h4 small, .h5 small, .h6 small, h1 .small, h2 .small, h3 .small, h4 .small, h5 .small, h6 .small, .h1 .small, .h2 .small, .h3 .small, .h4 .small, .h5 .small, .h6 .small {
    color: #999999;
    font-weight: 300;
    line-height: 1;
}
h1 small, h2 small, h3 small, h1 .small, h2 .small, h3 .small {
    font-size: 60%;
}
h1 .subtitle{
    display: block; 
    line-height: 40px;
    margin: 15px 0 30px;
}
p { 
    padding: 0px 0px 1em;
    margin:0;
}
a {
    color: #ffe5dd;
    outline: 0;
    font-weight: bold;
    -webkit-transition: all .8s ease;
    transition: all .8s ease;
} 
a:hover {
    text-decoration: none;
    color: #1f2222;
    -webkit-transition: all .8s ease;
    transition: all .8s ease;
}
a:focus {
    color: #999696;
    text-decoration: none;
}
img {
    height: auto;
    max-width: 100%;
    vertical-align: middle;
    border: 0px none; 
}

input {
    outline: 0;
    border: none;
    width: 100%;
    height: inherit;
    color: #333333;
    font-size: 16px;
    padding: 5px 15px;
    border-radius: 3px;
}
button {
    border-radius: 3px;
    outline: thin dotted;
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
    outline: 0;
    outline-offset: 0;
    border: none;
    overflow: visible;
}  
button,
select {
    text-transform: none;
}
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
    -webkit-appearance: button;
    cursor: pointer;
}
button[disabled],
html input[disabled] {
    cursor: default;
}
button::-moz-focus-inner,
input::-moz-focus-inner {
    border: 0;
    padding: 0;
}
input {
    line-height: normal;
}
input[type="checkbox"],
input[type="radio"] {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    height: auto;
}
input[type="search"] {
    -webkit-appearance: textfield;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
}
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
    -webkit-appearance: none;
}

.btn:focus,
.btn:hover,
.btn:active{
    outline: 0;
}
.btn{
    border-width: 2px;
    background-color: rgba(0,0,0,.0);
    font-weight: 400;
    opacity: 0.8;
    padding: 8px 16px;
}
.btn-round{
    border-width: 1px;
    border-radius: 30px !important;
    opacity: 0.79;
    padding: 9px 18px;
}
.btn-sm, .btn-xs {
    border-radius: 3px;
    font-size: 12px;
    padding: 5px 10px;
}
.btn-xs {
    padding: 1px 5px;
}
.btn-lg{
    border-radius: 6px;
    font-size: 18px;
    font-weight: 400;
    padding: 14px 30px;
}
.btn-wd {
    min-width: 100px;
}
.btn-default{
    color: #777777;
    border-color: #999999
} 
.btn-info{
    color: #2CA8FF;
    border-color: #2CA8FF;
}
.btn-success{
    color: #05AE0E;
    border-color: #05AE0E;
}
.btn-warning{
    color: #CB6C52;
    border-color: #CB6C52;
}
.btn-danger{
    color: #FF3B30;
    border-color: #FF3B30;
}
.btn:hover{ 
    opacity: 1;
}
.input-lg{
    height: 56px;
    padding: 10px 16px;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary {
    color: #1D62F0;
    border-color: #1D62F0;
    background-color: rgba(0,0,0,.0);
}
.btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open .dropdown-toggle.btn-info {
    color: #109CFF;
    border-color: #109CFF;
    background-color: rgba(0,0,0,.0);
}
.btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open .dropdown-toggle.btn-success {
    color: #049F0C;
    border-color: #049F0C;
    background-color: rgba(0,0,0,.0);
}
.btn-warning:hover, .btn-warning:focus, .btn-warning:active, .btn-warning.active, .open .dropdown-toggle.btn-warning {
    color: #ED8D00;
    border-color: #ED8D00;
    background-color: rgba(0,0,0,.0);
}
.btn-danger:hover, .btn-danger:focus, .btn-danger:active, .btn-danger.active, .open .dropdown-toggle.btn-danger {
    color: #EE2D20;
    border-color: #EE2D20;
    background-color: rgba(0,0,0,.0);
}
.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
    color: #666666;
    border-color: #888888;
    background-color: rgba(0,0,0,.0);
}
.btn:active, .btn.active {
    background-image: none;
    box-shadow: none;

}
.btn.disabled, .btn[disabled], fieldset[disabled] .btn {
    opacity: 0.45;
}
.btn-primary.disabled, .btn-primary[disabled], fieldset[disabled] .btn-primary, .btn-primary.disabled:hover, .btn-primary[disabled]:hover, fieldset[disabled] .btn-primary:hover, .btn-primary.disabled:focus, .btn-primary[disabled]:focus, fieldset[disabled] .btn-primary:focus, .btn-primary.disabled:active, .btn-primary[disabled]:active, fieldset[disabled] .btn-primary:active, .btn-primary.disabled.active, .btn-primary.active[disabled], fieldset[disabled] .btn-primary.active {
    background-color: rgba(0, 0, 0, 0);
    border-color: #3472F7;
}
.btn-info.disabled, .btn-info[disabled], fieldset[disabled] .btn-info, .btn-info.disabled:hover, .btn-info[disabled]:hover, fieldset[disabled] .btn-info:hover, .btn-info.disabled:focus, .btn-info[disabled]:focus, fieldset[disabled] .btn-info:focus, .btn-info.disabled:active, .btn-info[disabled]:active, fieldset[disabled] .btn-info:active, .btn-info.disabled.active, .btn-info.active[disabled], fieldset[disabled] .btn-info.active {
    background-color: rgba(0, 0, 0, 0);
    border-color: #2CA8FF;
}
.btn-success.disabled, .btn-success[disabled], fieldset[disabled] .btn-success, .btn-success.disabled:hover, .btn-success[disabled]:hover, fieldset[disabled] .btn-success:hover, .btn-success.disabled:focus, .btn-success[disabled]:focus, fieldset[disabled] .btn-success:focus, .btn-success.disabled:active, .btn-success[disabled]:active, fieldset[disabled] .btn-success:active, .btn-success.disabled.active, .btn-success.active[disabled], fieldset[disabled] .btn-success.active {
    background-color: rgba(0, 0, 0, 0);
    border-color: #05AE0E;
}
.btn-danger.disabled, .btn-danger[disabled], fieldset[disabled] .btn-danger, .btn-danger.disabled:hover, .btn-danger[disabled]:hover, fieldset[disabled] .btn-danger:hover, .btn-danger.disabled:focus, .btn-danger[disabled]:focus, fieldset[disabled] .btn-danger:focus, .btn-danger.disabled:active, .btn-danger[disabled]:active, fieldset[disabled] .btn-danger:active, .btn-danger.disabled.active, .btn-danger.active[disabled], fieldset[disabled] .btn-danger.active {
    background-color: rgba(0, 0, 0, 0);
    border-color: #FF3B30;
}
.btn-warning.disabled, .btn-warning[disabled], fieldset[disabled] .btn-warning, .btn-warning.disabled:hover, .btn-warning[disabled]:hover, fieldset[disabled] .btn-warning:hover, .btn-warning.disabled:focus, .btn-warning[disabled]:focus, fieldset[disabled] .btn-warning:focus, .btn-warning.disabled:active, .btn-warning[disabled]:active, fieldset[disabled] .btn-warning:active, .btn-warning.disabled.active, .btn-warning.active[disabled], fieldset[disabled] .btn-warning.active {
    background-color: rgba(0, 0, 0, 0);
    border-color: #CB6C52;
}
.input-group-addon {
    background-color: #FFFFFF;
    border: 1px solid #E3E3E3;
    border-radius: 4px;
}
.btn-primary {
    color: #FFF;
    background-color: #CB6C52;
    border-color: #CB6C52;
    border-radius: 1px;
    padding: 10px 20px;
    font-weight: 600;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active,.btn-primary:active:focus, .open > .dropdown-toggle.btn-primary {
    color: #CB6C52;
    background-color: #313538;
    border-color: #282829;
    font-weight: 600;
}
.btn-default {
    border-radius: 1px;
    padding: 10px 20px;
    border: 1px solid <?php echo $colors->PROFILE_PAGE_CREATE_EVENT_BUTTON_COLOR; ?>;
    color: <?php echo $colors->PROFILE_PAGE_CREATE_EVENT_BUTTON_FONT_COLOR; ?>;
    background-color: <?php echo $colors->PROFILE_PAGE_CREATE_EVENT_BUTTON_COLOR; ?>;
    border-color: #F0F0F0;
    font-weight: 600;
}
.btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default {
    color: #000;
    background-color: #CB6C52;
    border-color: #F0F0F0;
    font-weight: 600;
}
.search-form {
    background-color: <?php echo $colors->USER_PAGE_DIV_SEARCH_BOX_COLOR; ?>;
    border-radius: 5px;
    padding: 20px 0;
    border: 1px solid #E6E6E6;
    box-sizing: border-box;
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 9;
}
.search-row{
    padding-top:15px;
}

.form-inline .form-control, .form-inline .form-control {
    background: rgba(252, 252, 252, 0.35);
    border-radius: 1px;
    color: #ADADAD;
    height: 40px;
    margin-right: 10px;
    width: 195px;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 13px;
    line-height: 1.42857;
    color: #555;
    background-color: #FFF;
    background-image: none;
    border: 1px solid #EAE9E9;
    border-radius: 4px;
    box-shadow: 0px 1px 1px rgba(179, 179, 179, 0.1) inset;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}
.form-inline input[type=submit]{
    background: #CB6C52;
    color: #fff;
    height: 40px;
    width: 90px;
    border-radius: 1px;
    font-weight: bold;
    font-size: 16px;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.form-inline input[type=submit]:hover{
    background: #00A2DE
}
.form-control::-moz-placeholder{
    color: #DDDDDD;
    opacity: 1;
}
.form-control:-moz-placeholder{
    color: #DDDDDD;
    opacity: 1;  
}  
.form-control::-webkit-input-placeholder{
    color: #DDDDDD;
    opacity: 1; 
} 
.form-control:-ms-input-placeholder{
    color: #DDDDDD;
    opacity: 1; 
}


.form-control:focus {
    border-color: #CBCBCB;
    outline: 0px none;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(102, 175, 233, 0);
}

/* Animations              */
.form-control, .input-group-addon{
    -webkit-transition: all 300ms linear;
    -moz-transition: all 300ms linear;
    -o-transition: all 300ms linear;
    -ms-transition: all 300ms linear;
    transition: all 300ms linear;
} 
/* Inputs               */
.form-control {
    display: block;
    width: 100%;
    height: 44px;
    padding: 6px 12px;
    font-size: 13px;
    line-height: 1.42857;
    color: #838383;
    background-color: #FFF;
    background-image: none;
    border: 1px solid #DADADA;
    border-radius: 0px;
    box-shadow: 0px 1px 1px rgba(179, 179, 179, 0.1) inset;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}

.form-control:focus {
    background-color: #FFFFFF;
    border: 1px solid #9A9A9A;
    box-shadow: none;
    outline: 0 none;
}
.form-control + .form-control-feedback{
    border-radius: 6px;
    font-size: 14px;
    padding: 0 12px 0 0;
    position: absolute;
    right: 25px;
    top: 13px;
    vertical-align: middle;
}
.form-control:focus + .input-group-addon, .form-control:focus ~ .input-group-addon{
    background-color: #FFFFFF;
    border-color: #9A9A9A;
}

.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
    border-right: 0 none;
}
.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child > .btn, .input-group-btn:last-child > .dropdown-toggle, .input-group-btn:first-child > .btn:not(:first-child) {
    border-left: 0 none;
}
.search-btn ,.toggle-btn{
    background-color: <?php echo $colors->USER_PAGE_DIV_SEARCH_BOX_BUTTON_COLOR; ?>;
    color: #333;
    font-size: 16px;
    border: 1px solid <?php echo $colors->USER_PAGE_DIV_SEARCH_BOX_BUTTON_COLOR; ?>;
    width: 40px;
    height: 40px;
    color: #FFF;
    transition: all 0.3s ease 0s; 
    padding: 0px;

}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #EEEEEE;
    color: #999999;
    cursor: not-allowed;
}
.has-success .form-control, 
.has-error .form-control, 
.has-success .form-control:focus, 
.has-error .form-control:focus{
    border-color: #E3E3E3;
    box-shadow: none;
}
.has-success .form-control, 
.has-success .form-control-feedback,
.form-control.valid:focus{
    border-color: #05AE0E;
    color: #05AE0E;
}
.has-error .form-control, 
.has-error .form-control-feedback,
.form-control.error{
    color: #FF3B30;
    border-color: #FF3B30;
}
/*           Labels & Progress-bar              */
.label{
    padding: 0.2em 0.6em 0.2em;
    border: 1px solid #999999;
    border-radius: 3px;
    color: #999999;
    background-color: #FFFFFF;
    font-weight: 500;
    font-size: 11px;
    text-transform: uppercase;
}
.label-primary{
    border-color: #3472F7;
    color: #3472F7;
}
.label-info{
    border-color: #2CA8FF;
    color: #2CA8FF;
}
.label-success{
    border-color: #05AE0E;
    color: #05AE0E;
}
.label-warning{
    border-color: #CB6C52;
    color: #CB6C52;
}
.label-danger{
    border-color: #FF3B30;
    color: #FF3B30;
}

label.error{
    color: #FF3B30;    
    margin-top: 5px;
    margin-bottom: 0;
}

label small{
    color: #999999;
}

.label.label-fill{
    color: #FFFFFF;
}
.label-primary.label-fill, .progress-bar, .progress-bar-primary{
    background-color: #3472F7;
}
.label-info.label-fill, .progress-bar-info{
    background-color: #2CA8FF;
}
.label-success.label-fill, .progress-bar-success{
    background-color: #05AE0E;
}
.label-warning.label-fill, .progress-bar-warning{
    background-color: #CB6C52;
}
.label-danger.label-fill, .progress-bar-danger{
    background-color: #FF3B30;
}
.label-default.label-fill{
    background-color: #999999;
}

.bootstrap-select button.dropdown-toggle{
    background: rgba(252, 252, 252, 0.35) none repeat scroll 0% 0%;
    border-radius: 1px;
    color: #ADADAD;
    height: 40px;
    margin-right: 10px;
    width: 99%;
    display: block;
    font-size: 13px;
    line-height: 1.42857;
    color: #ADADAD;
    background-color: #FFF;
    background-image: none;
    border: 1px solid #EAE9E9;
    box-shadow: 0px 1px 1px rgba(179, 179, 179, 0.1) inset;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    font-weight: 300;
} 
.bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
    width: 100%;
}
.btn-group.open .dropdown-toggle {
    box-shadow: none;
}
.bootstrap-select .dropdown-menu {

    margin: 20px 0px 0px;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 0px;
    box-shadow:0px 5px 15px rgba(0, 0, 0, 0.176);
    border-top: none;
}
.tab-content .bootstrap-select button.dropdown-toggle {
    width: 100%;                              
}
.tab-content .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
    width: 100%;
}
.input-group-btn .btn{
    background-color: #FFC500;
    border-color: #FFC500;
    border-radius: 0px;
    height: 44px;
    color: #FFF; 
}
/* Navigation bils */
.wizard-container .nav-pills > li + li {
    margin-left: 0;
}
.wizard-container  .nav-pills > li > a {
    border: 1px solid #2CA8FF;
    border-radius: 0;
    color: #2CA8FF;
    margin-left: -1px;
}
.nav-pills.ct-blue > li.active > a, .nav-pills.ct-blue > li.active > a:hover, .nav-pills.ct-blue > li.active > a:focus,
.pagination.ct-blue > .active > a, .pagination.ct-blue > .active > span, .pagination.ct-blue > .active > a:hover, 
.pagination.ct-blue > .active > span:hover, .pagination.ct-blue > .active > a:focus, .pagination.ct-blue > .active > span:focus{
    background-color: #3472F7;
}
.nav-pills.ct-azure > li.active > a, .nav-pills.ct-azure > li.active > a:hover, .nav-pills.ct-azure > li.active > a:focus, 
.pagination.ct-azure > .active > a, .pagination.ct-azure > .active > span, .pagination.ct-azure > .active > a:hover, 
.pagination.ct-azure > .active > span:hover, .pagination.ct-azure > .active > a:focus, .pagination.ct-azure > .active > span:focus{
    background-color: #2CA8FF;
}
.nav-pills.ct-green > li.active > a, .nav-pills.ct-green > li.active > a:hover, .nav-pills.ct-green > li.active > a:focus,
.pagination.ct-green > .active > a, .pagination.ct-green > .active > span, .pagination.ct-green > .active > a:hover,
.pagination.ct-green > .active > span:hover, .pagination.ct-green > .active > a:focus, .pagination.ct-green > .active > span:focus{
    background-color: #05AE0E;
}
.nav-pills.ct-orange > li.active > a, .nav-pills.ct-orange > li.active > a:hover, .nav-pills.ct-orange > li.active > a:focus, 
.pagination.ct-orange > .active > a, .pagination.ct-orange > .active > span, .pagination.ct-orange > .active > a:hover,

.pagination.ct-orange > .active > span:hover, .pagination.ct-orange > .active > a:focus, .pagination.ct-orange > .active > span:focus{
    background-color: #CB6C52;
}
.nav-pills.ct-red > li.active > a, .nav-pills.ct-red > li.active > a:hover, .nav-pills.ct-red > li.active > a:focus,
.pagination.ct-red > .active > a, .pagination.ct-red > .active > span, .pagination.ct-red > .active > a:hover,
.pagination.ct-red > .active > span:hover, .pagination.ct-red > .active > a:focus, .pagination.ct-red > .active > span:focus{
    background-color: #FF3B30;
}
.nav-pills.ct-blue > li > a {
    border: 1px solid #3472F7;
    color: #3472F7;
}
.nav-pills.ct-azure > li > a {
    border: 1px solid #2CA8FF;
    color: #2CA8FF;
}
.nav-pills.ct-green > li > a {
    border: 1px solid #05AE0E;
    color: #05AE0E;
}
.nav-pills.ct-orange > li > a {
    border: 1px solid #CB6C52;
    color: #CB6C52;
}
.nav-pills.ct-red > li > a {
    border: 1px solid #FF3B30;
    color: #FF3B30;
}

.nav-pills > li.active > a, 
.nav-pills > li.active > a:hover, 
.nav-pills > li.active > a:focus {
    background-color: #2CA8FF;
    color: #FFFFFF;
}

.nav-pills > li:first-child > a{
    border-radius: 4px 0 0 4px;
    margin: 0;
}
.nav-pills > li:last-child > a{
    border-radius: 0 4px 4px 0;
}

.pagination.no-border > li > a, .pagination.no-border > li > span{
    border: 0;
}
.pagination > li > a, .pagination > li > span, .pagination > li:first-child > a, .pagination > li:first-child > span, .pagination > li:last-child > a, .pagination > li:last-child > span{
    border-radius: 50%;
    margin: 0 2px;
    color: #777777;
}
.pagination > li.active > a, .pagination > li.active > span, .pagination > li.active > a:hover, .pagination > li.active > span:hover, .pagination > li.active > a:focus, .pagination > li.active > span:focus {
    background-color: #2CA8FF;
    border: 0;
    color: #FFFFFF;
    padding: 7px 13px;
}
.text-primary, .text-primary:hover{
    color: #1D62F0;
}
.text-info, .text-info:hover{
    color: #109CFF;
}
.text-success, .text-success:hover{
    color: #0C9C14;
}
.text-warning, .text-warning:hover{
    color: #ED8D00;
}
.text-danger, .text-danger:hover{
    color: #EE2D20;
}
.modal-header {
    border: 0 none;
}


.navbar-default .navbar-nav > li > a{
    color: #929292;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    position: relative;

}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
    color: #929292;
    background-color: transparent;
}
.navbar-nav > li > a {
    padding-right: 20px;
    padding-left: 20px;
}

.navbar-default .navbar-nav > li > a.active:after{

    background-color: #CB6C52;
    bottom: -24px;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    transition: all 0.2s ease 0s;
    width: 100%;
}
.navbar-default .navbar-nav > li > a::after {
    background-color: #CB6C52;
    bottom: -24px;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    transition: all 0.2s ease 0s;
    width: 0%;
}
.navbar-default .navbar-nav > li > a:hover:after {
    width: 100%;
}

.navbar-nav.navbar-right:last-child{
    margin-right: 20px
}
.navbar-brand {

}
.main-nav {
    padding-top: 10px;
}
.button.navbar-right {
    padding-top: 10px;
}
.nav-button {
    background-color: #c2c2c2;
    border: medium none;
    color: #fff;
    font-size: 16px;
    padding: 8px 20px;
    border-radius: 2px;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    transition: all 0.4s ease;
}
.nav-button.login{
    background-color: <?php echo $colors->EVENT_PAGE_USER_DETAILS_BUTTON_COLOR; ?>;
    margin-right: 5px;
}
.nav-button:hover{
    background-color: #CB6C52;

}
.navbar{
    margin-bottom: 0px;
    min-height: 100px;
}
.navbar-default {
    background-image: none;
    background-color: #fff;
    background-repeat: repeat-x;
    border-radius: 4px;
    box-shadow: none;
}
.navbar .container{
    padding-top: 15px
}
.navbar-default {
    background-image: none;
    background-color: #FFF;
    background-repeat: repeat-x;
    border-radius: 0px;
    box-shadow: none;
    border-left: none;
    border-right: none;
}
.nav-tabs > li > a{
    color: <?php echo $colors->PROFILE_PAGE_TABS_INACTIVE_COLOR; ?>;
    font-weight: 300;
    border-width: 4px;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    border-color: transparent transparent <?php echo $colors->PROFILE_PAGE_BUTTON_FONT_COLOR; ?>;
    border-style: solid;
    border-width: 4px;
    color: #666666;
    cursor: default;
    font-weight: 700;
    outline: none;
}
/*!
 * Yamm!3
 * Yet another megamenu for Bootstrap 3
 * 
 * http://geedmo.github.com/yamm3
 */
.yamm .nav,
.yamm .collapse,
.yamm .dropup,
.yamm .dropdown {
    position: static;
}
.yamm .container {
    position: relative;
}
.yamm .dropdown-menu {
    left: auto;
} 
.yamm .yamm-content {
    padding: 20px 30px;
}
@media (max-width: 767px) {
    .yamm .yamm-content {
        padding: 10px 20px;
    }
}
.yamm .dropdown.yamm-fw .dropdown-menu {
    left: 0;
    right: 0;
}
.yamm .dropdown-menu {   
    background-color: #FFF; 
    border: 0.3px solid rgba(227, 227, 227, 0.22);
    border-radius: 0px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.176);
}
.ymm-sw .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0px;
    z-index: 1000;
    float: left;
    min-width: 160px;
    padding: inherit;
    margin: inherit;
    list-style: outside none none;
    font-size: inherit;
    background-color: #FFF;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: 0px;
    box-shadow: 0px 0.5px 1px #CECECE;
    background-clip: padding-box;
}
.ymm-sw .dropdown-menu li{
    clear: both;
    height: 50px;
}
.navbar-default .ymm-sw .navbar-nav a::after {
    bottom: 5px;
    background-color: #FFF;
}
.yamm .ymm-sw  .dropdown-menu {
    left: auto;
    right: auto;
}
.navbar .yamm-content h5 {
    font-size: 18px;
    font-weight: 400;
    text-transform: uppercase;
    padding-bottom: 10px;
    border-bottom: dotted 1px #555555;
}
@media (max-width: 767px) {
    .navbar .yamm-content h5 {
        font-size: 14px;
    }
}
.navbar .yamm-content ul {
    margin: 0;
    padding: 0;
}
.navbar .yamm-content ul li {
    list-style-type: none;
    border-bottom: solid 1px #eeeeee;
    text-transform: uppercase;
    padding: 4px 0;
}
.navbar .yamm-content ul li a {
    color: #777;
    font-size: 14px;
    display: block;
    font-weight: 300;
}
.navbar .yamm-content ul li a:hover {
    color: #CB6C52;
    text-decoration: none;
}
.navbar .yamm-content .banner {
    margin-bottom: 10px;
}

.tooltip {
    font-size: 14px;
    font-weight: bold;
}
.tooltip-arrow{
    display: none;
    opacity: 0;
}
.tooltip-inner {
    background-color: #FAE6A4;
    border-radius: 4px;
    box-shadow: 0 1px 13px rgba(0, 0, 0, 0.14), 0 0 0 1px rgba(115, 71, 38, 0.23);
    color: #734726;
    max-width: 200px;
    padding: 6px 10px;
    text-align: center;
    text-decoration: none;
}
.tooltip-inner:after {
    content: "";
    display: inline-block;
    left: 100%;
    margin-left: -56%;
    position: absolute;
}
.tooltip-inner:before {
    content: "";
    display: inline-block;
    left: 100%;
    margin-left: -56%;
    position: absolute;
}
.tooltip.top {
    margin-top: -11px;
    padding: 0;
}
.tooltip.top .tooltip-inner:after {
    border-top: 11px solid #FAE6A4;
    border-left: 11px solid rgba(0, 0, 0, 0);
    border-right: 11px solid rgba(0, 0, 0, 0);
    bottom: -10px;
}
.tooltip.top .tooltip-inner:before {
    border-top: 11px solid rgba(0, 0, 0, 0.2);
    border-left: 11px solid rgba(0, 0, 0, 0);
    border-right: 11px solid rgba(0, 0, 0, 0);
    bottom: -11px;
}
.tooltip.bottom {
    margin-top: 11px;
    padding: 0;
}
.tooltip.bottom .tooltip-inner:after {
    border-bottom: 11px solid #FAE6A4;
    border-left: 11px solid rgba(0, 0, 0, 0);
    border-right: 11px solid rgba(0, 0, 0, 0);
    top: -10px;
}
.tooltip.bottom .tooltip-inner:before {
    border-bottom: 11px solid rgba(0, 0, 0, 0.2);
    border-left: 11px solid rgba(0, 0, 0, 0);
    border-right: 11px solid rgba(0, 0, 0, 0);
    top: -11px;
}
.tooltip.left{
    margin-left: -11px;
    padding: 0;
}
.tooltip.left .tooltip-inner:after {
    border-left: 11px solid #FAE6A4;
    border-top: 11px solid rgba(0, 0, 0, 0);
    border-bottom: 11px solid rgba(0, 0, 0, 0);
    right: -10px;
    left: auto;
    margin-left: 0;
}
.tooltip.left .tooltip-inner:before {
    border-left: 11px solid rgba(0, 0, 0, 0.2);
    border-top: 11px solid rgba(0, 0, 0, 0);
    border-bottom: 11px solid rgba(0, 0, 0, 0);
    right: -11px;
    left: auto;
    margin-left: 0;
}
.tooltip.right{
    margin-left: 11px;
    padding: 0;
}
.tooltip.right .tooltip-inner:after {
    border-right: 11px solid #FAE6A4;
    border-top: 11px solid rgba(0, 0, 0, 0);
    border-bottom: 11px solid rgba(0, 0, 0, 0);
    left: -10px;
    top: 0;
    margin-left: 0;
}
.tooltip.right .tooltip-inner:before {
    border-right: 11px solid rgba(0, 0, 0, 0.2);
    border-top: 11px solid rgba(0, 0, 0, 0);
    border-bottom: 11px solid rgba(0, 0, 0, 0);
    left: -11px;
    top: 0;
    margin-left: 0;
}

.slider-area{
    position: relative;
    height: 630px
}
#bg-slider .item img{
    width: 100%;
    height: 630px
}

.slider-content{
    position: absolute;
    top: 20%;
    text-align: center;
    color: #FFF;
    width: 100%;
}
.slider-content h2 {
    font-size: 40px; 
    margin-bottom: 20px;
    text-transform: uppercase;color: #CB6C52;
font-weight: 500;
}
.slider-content p {
    font-size: 14px;
    margin-bottom: 60px;
    color: rgb(110, 110, 110);
}

.slider .owl-theme .owl-controls {
    margin-top: 0px;
    position: relative;
    text-align: center;
}
.slider .owl-pagination {
    bottom: 280px;
    position: absolute;
    right: 10px;
    width: 40px;
    z-index: 9999;
}
.slider .owl-theme .owl-controls .owl-page span{
    background: #FFC600
}

/* Top Header */
.progress-thin{
    height: 2px;
}

.header-connect{
    padding-top: 10px;
}
.header-call p{
    color: #666666;
}
.header-call p span{
    margin-right: 15px;
    font-weight: 300;
}
.header-call p span i{
    margin-right: 4px;
    font-size: 20px;
    position: relative;
    bottom: -3px;
}
.header-social ul{
    padding-top: 5px
}
.header-social ul li a{
    color: #666666;
    font-size: 14px

}
.header-social ul li a:hover{
    color: #CB6C52
}


/*====================================================
page-header
======================================================*/
.page-head{
    background: <?php echo $colors->EVENT_PAGE_HEADER_COLOR; ?> url("../../assets/img/page-header.jpg") 
        no-repeat scroll center top / cover;
    color: <?php echo $colors->EVENT_PAGE_HEADER_FONT_COLOR; ?>;
    position: relative;
    min-height: 140px;
}
.page-head-content {
    padding-top: 52px;
    padding-bottom: 52px;
}
.page-head-content .page-title {
    margin: 0px;
    padding: 10px 16px;
    font-size: 30px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.content-area{
    background-color: #FCFCFC; padding-bottom: 55px;
}
.layout-switcher a{
    font-size: 25px;
    color: <?php echo $colors->USER_PAGE_EVENT_VIEW_INACTIVE_COLOR; ?>;
}
.layout-switcher a:hover{     
    color: <?php echo $colors->PROFILE_PAGE_VIEW_HOVER_COLOR; ?>;
}
.layout-switcher .active{
    color: <?php echo $colors->USER_PAGE_EVENT_VIEW_ACTIVE_COLOR; ?>;
}
.layout-switcher {
    padding: 0px 10px;
    text-align: right;
}
.search-widget fieldset .largesearch-btn{
    background-color: <?php echo $colors->PROFILE_PAGE_BUTTON_COLOR; ?>;
    font-size: 16px;
    border: 1px solid #EAE9E9;
    width: 100%;
    height: 40px;
    color: <?php echo $colors->PROFILE_PAGE_BUTTON_FONT_COLOR; ?>;
    transition: all 0.3s ease 0s;
    margin-top: 15px;
}
.form-inline input[type="submit"]:hover {
    background: rgb(126, 126, 126) none repeat scroll 0% 0%;
}
fieldset { 
    padding-bottom: 10px;
}

.search-widget fieldset .bootstrap-select button.dropdown-toggle ,.search-widget fieldset .bootstrap-select { 
    width: 100% !important;
}
.search-widget .form-inline .form-control,.search-widget  .form-inline .form-control { 
    width: 100%;
    background: #FFF;
}
.properties-page .box-two { 
    box-shadow: 0px 1px 1px rgba(236, 236, 236, 0.1);
}

/*
Asside widgets CSS
*/
.panel.sidebar-menu h3 {
    padding: 5px 0;
    margin: 0;
}
.panel.sidebar-menu {
    background: transparent;
    margin: 0 0 25px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.panel.sidebar-menu .panel-heading {
    text-transform: uppercase;
    margin-bottom: 10px;
    background: none;
    padding: 0;
    letter-spacing: 0.198em;
    border-bottom: none;
}
.panel.sidebar-menu .panel-heading h1,
.panel.sidebar-menu .panel-heading h2,
.panel.sidebar-menu .panel-heading h3,
.panel.sidebar-menu .panel-heading h4,
.panel.sidebar-menu .panel-heading h5 {
    display: inline-block;
    border-bottom: solid 3px #CB6C52;
    line-height: 1.1;
    margin-bottom: 0;
    padding-bottom: 10px;
}
.panel.sidebar-menu .panel-heading .btn.btn-danger {
    color: #fff;
    margin-top: 5px;
}
.panel.sidebar-menu .panel-body {
    padding: 0;
    margin-top: 25px;
}
.panel.sidebar-menu .panel-body span.colour {
    display: inline-block;
    width: 15px;
    height: 15px;
    border: solid 1px #555555;
    vertical-align: top;
    margin-top: 2px;
    margin-left: 5px;
}
.panel.sidebar-menu .panel-body span.colour.white {
    background: #fff;
}
.panel.sidebar-menu .panel-body span.colour.red {
    background: red;
}
.panel.sidebar-menu .panel-body span.colour.green {
    background: green;
}
.panel.sidebar-menu .panel-body span.colour.blue {
    background: blue;
}
.panel.sidebar-menu .panel-body span.colour.yellow {
    background: yellow;
}
.panel.sidebar-menu .panel-body label {
    color: #777;
    font-size: 13px;
    font-weight: 300;
    margin-bottom: 0px;
}
.panel.sidebar-menu .panel-body label:hover {
    color: #555555;
}
.panel.sidebar-menu ul.nav.category-menu {
    margin-bottom: 20px;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 0.08em;
} 
.panel-default {
    border-color: transparent;
}
.panel {
    margin-bottom: 20px;
    background-color: #FFF;
    border: transparent;
    border-radius: 0px;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0);
}
.panel.sidebar-menu ul.nav ul {
    list-style: none;
    padding-left: 0;
}
.panel.sidebar-menu ul.nav ul li {
    display: block;
}
.panel.sidebar-menu ul.nav ul li a {
    position: relative; 
    font-weight: normal;
    text-transform: none !important;
    display: block;
    padding: 10px 15px;
    padding-left: 30px;
    font-size: 13px;
    color: #999999;
}
.panel.sidebar-menu ul.nav ul li a:hover,
.panel.sidebar-menu ul.nav ul li a:focus {
    text-decoration: none;
    background-color: #eeeeee;
}
.panel.sidebar-menu ul.tag-cloud {
    list-style: none;
    padding-left: 0;
}
.panel.sidebar-menu ul.tag-cloud li {
    display: inline-block;
}
.panel.sidebar-menu ul.tag-cloud li a {
    display: inline-block;
    padding: 5px;
    border: solid 1px #eeeeee;
    border-radius: 0;
    color: #CB6C52;
    margin: 5px 5px 5px 0;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 700;
    font-size: 13px;
}
.panel.sidebar-menu ul.tag-cloud li a:hover {
    color: #CB6C52;
    text-decoration: none;
    border-color: #CB6C52;
}
.panel.sidebar-menu ul.popular,
.panel.sidebar-menu ul.recent {
    list-style: none;
    padding-left: 0;
    padding: 20px 0;
}
.panel.sidebar-menu ul.popular li,
.panel.sidebar-menu ul.recent li {
    margin-bottom: 10px;
    padding: 5px 0;
    border-bottom: dotted 1px #eeeeee;
}
.panel.sidebar-menu ul.popular li:before,
.panel.sidebar-menu ul.recent li:before,
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
    content: " ";
    display: table;
}
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
    clear: both;
}
.panel.sidebar-menu ul.popular li:before,
.panel.sidebar-menu ul.recent li:before,
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
    content: " ";
    display: table;
}
.panel.sidebar-menu ul.popular li:after,
.panel.sidebar-menu ul.recent li:after {
    clear: both;
}
.panel.sidebar-menu ul.popular li img,
.panel.sidebar-menu ul.recent li img {
    width: 50px;
    margin-right: 10px;
}
.panel.sidebar-menu ul.popular li h5,
.panel.sidebar-menu ul.recent li h5 {
    margin: 0 0 10px;
}
.panel.sidebar-menu ul.popular li h5 a,
.panel.sidebar-menu ul.recent li h5 a {
    font-weight: normal;
}
.panel.sidebar-menu ul.popular li p.date,
.panel.sidebar-menu ul.recent li p.date {
    float: right;
    font-size: 13px;
    color: #999999;
}
.panel.sidebar-menu ul.popular li:last-child,
.panel.sidebar-menu ul.recent li:last-child {
    border-bottom: none;
}
.panel.sidebar-menu .text-widget {
    font-size: 13px;
}
.panel.sidebar-menu.with-icons ul.nav li a:after {
    font-family: 'FontAwesome';
    content: "\f105";
    position: relative;
    top: 0;
    float: right;
}
.similar-property-wdg {

}

.page-title {
    padding-top: 55px;
}
.page-title h5{
    font-weight: 300;
    text-transform: uppercase;
    margin-bottom: 0
}
.page-title h2 {
    margin: 10px 0px;
    font-size: 30px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 4px;
}
.page-title h2 span{
    color: #00ADEF
}
.page-title p {
    font-size: 18px;
    padding: 10px 20% 25px;
    line-height: 27px;
}

.pagination {
    height: 40px;
    margin: 20px 10px;
}

.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    padding: 0px;
}

.pagination li {
    display: inline;
}

.pagination a,
.pagination span {
    float: left;
    padding: 0 14px;
    line-height: 38px;
    text-decoration: none;
    background-color: <?php echo $colors->USER_PAGE_EVENT_PAGINATION_COLOR; ?>;
    border: 1px solid #dddddd;
    border-left-width: 0;
}

.pagination a:hover,
.pagination .active a,
.pagination .active span {
    background-color: <?php echo $colors->USER_PAGE_EVENT_PAGINATION_ACTIVE_COLOR; ?>;
}

.pagination .active a,
.pagination .active span {
    color: #999999;
    cursor: default;
}

.pagination .disabled span,
.pagination .disabled a,
.pagination .disabled a:hover {
    color: #999999;
    cursor: default;
    background-color: <?php echo $colors->USER_PAGE_EVENT_PAGINATION_HOVER_COLOR; ?>;
}

.pagination li:first-child a,
.pagination li:first-child span {
    border-left-width: 1px;
    -webkit-border-radius: 3px 0 0 3px;
    -moz-border-radius: 3px 0 0 3px;
    border-radius: 3px 0 0 3px;
}

.pagination li:last-child a,
.pagination li:last-child span {
    -webkit-border-radius: 0 3px 3px 0;
    -moz-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
}

.pagination-centered {
    text-align: center;
}

.pagination-right {
    text-align: right;
}

.how-it-work {
    margin: 40px 0px 20px;
    background-color: rgb(255, 255, 255);
}
.how-it-work i {
    color:#939191;
    border: 3px solid #939191;
    padding: 19px;
    border-radius: 50%;
    height: 110px;
    width: 110px;
}
.single-work{
    transition: all 0.2s ease-in-out 0s;
    padding: 10px;
    overflow: hidden;
}
.single-work h3{
    color: #202020;
    font-size: 20px;
    font-weight: 500;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.single-work p {
    color: #666666;
    font-weight: 300;
    line-height: 26px;
    margin-top: 25px;
    padding: 0 37px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
} 
.single-work {
    text-align: left;
}

/*testimonial*/

.testimonial{
    position: relative;
    margin-top: 50px; 
}
.testimonial .item {
    padding-bottom: 67px;
    position: relative;
}
.testimonial .item .client-face {
    position: absolute;
    top: 112px;
    right: 146px;
    text-align: center;
}
.client-face > img {
    border: 5px solid #fff;
    border-radius: 50%;
}
.testimonial .owl-theme .owl-controls .owl-page span{
    background: #CB6C52
}
.client-text {
    border-radius: 2px;
    padding: 20px 30px;
    margin: 15px;
    border: 1px solid #ECE9E9;
    background-color: #F5F5F5;
}
.client-text p {
    line-height: 25px;
padding: 0 0 0.5em;
}
.client-text h4 {
    font-size: 15px
}
.client-text h4 i{
    font-size: 13px
}
/*Tools CSS*/
.p0{
    padding: 0px;
}
.overflow{
    overflow: hidden;
}
.mar-l-20{
    margin-left: 20px;
}
.mar-r-20{
    margin-right: 20px;
}
.box {
    background: #FFF none repeat scroll 0% 0%;
    margin: 0px 0px 30px;
    border: 1px solid #E6E6E6;
    box-sizing: border-box;
    padding: 20px;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
}
.box-two {
    background: #FFF none repeat scroll 0% 0%;

    border: 1px solid #E6E6E6;
    box-sizing: border-box;

    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
}
.dot-hr{
    border-bottom: 1px dotted #CECBC7;
    margin-bottom: 10px;
}
.slim-hr{

}
.color{
    color:#9B9B9B;
}
.orange{
    color:orange;
}
.strong{
    font-weight: 500;
}
.padding-top-25{
    padding-top: 25px;
}
.padding-top-40{
    padding-top: 40px;
}
.padding-bottom-40{
    padding-bottom: 40px;
}
.pr0 {
    padding-right: 0px !important;
}
.pl0 {
    padding-left:0px !important;
}
.pl-10 {
    padding-left: 10px !important;
}
.pr-10 {
    padding-right: 10px !important;
}

.padding-top-15{
    padding-top:15px;
}
.padding-bottom-15{
    padding-bottom:15px;
}
.pr-30 {
    padding-right: 30px !important;
}
.p-b-15{
    padding-bottom: 15px;
}
.padding-5{
    padding: 5px
}
.center{
    text-align: center;
}

.right {
    text-align: right;
}
.left {
    text-align: left;
}
.garo-icon-dog-gry{
    
}
.garo-icon-dog-gry::after{
    
}
.garo-icon-car-gry{
    
}
.garo-icon-car-gry::after{
    
}
.garo-icon-area-gry{
    
}
.garo-icon-area-gry::after{
    
}
.garo-icon-sw-gry{
    
}
.garo-icon-sw-gry::after{
    
}
.garo-icon-shw-gry{
    
}
.garo-icon-shw-gry::after{
    
}

.garo-icon-wf-gry{
    
}
.garo-icon-wf-gry::after{
    
}

.garo-icon-bed-gry{
    
}
.garo-icon-bed-gry::after{
    
}

.garo-icon-zzz-gry{
    
}
.garo-icon-zzz-gry::after{
    
}

/*=====================================
proerty-th 
======================================*/

.proerty-th {
    margin-left: -9px;
}
.proerty-th .proerty-item{
    background-color: #FFF; 
    margin: 10px;
}
.proerty-th .proerty-item .item-thumb{
    position: relative;
}
.proerty-th .proerty-item:hover  .item-thumb img{
    opacity: 1;
}
.proerty-th .proerty-item .item-thumb:hover .tm_mask {
    opacity: 1;
}
.proerty-th .proerty-item  .item-thumb img{
    transition: all 0.2s linear 0s;
    display: block;
    position: relative;
    width:100%;
    opacity: 0.7;
    min-height: 225px;
    max-height: 265px;
}
.proerty-th .proerty-item  .item-entry{
    padding: 8px;

}
.properties-page .proerty-th .proerty-price{
    font-weight: 600;
    color: <?php echo $colors->PROFILE_PAGE_EVENT_STATUS; ?>;
}
.proerty-th .proerty-item  .item-entry h5{
    text-transform: uppercase;
    font-weight: 600;
    color: #9B9B9B;
    letter-spacing: 2px;
    position: relative;
}
.proerty-th .proerty-item  .item-entry h5::after {
    background: transparent url("../../assets/img/chevron-down.png") no-repeat scroll center center;
    width: 15px;
    left: 20px;
    height: 7px;
    content: "";
    position: absolute;
    bottom: -16px;
    display: block;
}

.proerty-status{
    font-weight: 600;
}
.tm_mask {
    opacity: 0;
    background-color: transparent;
    transition: all 0.4s ease-in-out 0s;
    width: 100%;
    overflow: hidden;
    height: 45px;
    position: absolute;
    padding: 5px;
    bottom: 0px;
    color: #FFF;

}

/*=====================================
proerty-th-list
======================================*/
.proerty-th-list{
    margin-left: -9px;
}
.proerty-th-list .col-md-4{
    width: 100%;
    padding: 15px 10px;
}
.proerty-th-list .col-md-4 .item-thumb{
    width:40%;
    float: left;
} 
.proerty-th-list .col-md-4 .item-thumb img {
    opacity: 0.7;
    height: 230px;
    vertical-align: middle;
    border: 0px none;
    width: 100%;
    padding-right: 25px;
}

.properties-page .box-two:hover .item-thumb img {
    opacity:1; 
}

.proerty-th-list .col-md-4 .item-entry{
    width:60%;
    float: left;
    padding-right: 15px;
}


.proerty-th-list .col-md-3 .item-entry{
    width:60%;
    float: left;
    padding-right: 15px;
}
.proerty-th-list .col-md-3{
    width: 100%;
    padding: 15px 10px;
}
.proerty-th-list .col-md-3 .item-thumb{
    width:40%;
    float: left;
} 
.proerty-th-list .col-md-3 .item-thumb img {
    opacity: 0.7;
    height: 230px;
    vertical-align: middle;
    border: 0px none;
    width: 100%;
    padding-right: 25px;
}

.proerty-th-list .proerty-item-ads{
    text-align: center;
    border: none;
}
.properties-page .box-two { 
    overflow: hidden !important; 
} 
.proerty-th-list  .proerty-item .item-entry h5 {
    text-transform: uppercase;
    font-weight: 600;
    color: #9B9B9B;
    letter-spacing: 2px;
    position: relative;
}

.proerty-th-list .proerty-price{
    font-weight: 600;
    color: #CB6C52;
    font-size: 25px;
}
.property-icon {
    clear: both;
    padding: 5px 0px; 
}
.proerty-th-list .property-icon {
    clear: both;
    padding: 5px 0px;
    margin-top: 15px;
    background-color: #EDEDED;
    color: #555;
}
.property-icon img{

}
.proerty-th-list p {
    clear: both;
    padding-top: 25px;
    padding-right: 20px;
    display: block !important;
}

.page-subheader .sort-by-list {
    display: inline-block; 
    padding: 0px;
}
.page-subheader .sort-by-list li {
    display: inline-block;
    margin-right: 5px;
    margin-bottom: 5px;
}
.page-subheader .sort-by-list li.active a {
    padding-right: 20px;
    border-color: #3F3F3F;
    background-color: <?php echo $colors->USER_PAGE_EVENT_SORT_BUTTON_ACTIVE_COLOR; ?>;
    color: #FFF;
}
.page-subheader .sort-by-list li a {
    position: relative;
    display: block;
    padding: 2px 7px;
    background-color: <?php echo $colors->USER_PAGE_EVENT_SORT_BUTTON_INACTIVE_COLOR; ?>;
    border-width: 1px;
    border-style: solid;
    border-color: #DDDCDC;
    color: #414040;
}
.page-subheader .items-per-page {
    display: inline-block; 
    vertical-align: top;
    text-align: right;
}
.page-subheader .items-per-page label {
    display: inline-block;
    margin-right: 10px;
}
.page-subheader .items-per-page b {
    font-weight: 400;
}
.page-subheader .items-per-page .sel {
    display: inline-block;
    width: 60px;
    position: relative;
}


/*==================================
recent-property-widget
==============================*/
.recent-property-widget ul{
    padding: 0px;
    margin: 0px;    
    list-style: outside none none;
}
.recent-property-widget ul li{
    clear: both;
    position: relative;
    padding: 5px;
}
.recent-property-widget ul li .property-seeker {    
    position: absolute;
    top: 42px;
    width: 100%;
    right: 0px;
    color: #FFF;
}
.recent-property-widget ul li .property-seeker .b-1 {
    background-color: #D5F500;
    padding: 0px 6px;
}
.recent-property-widget ul li .property-seeker .b-2 {
    background-color: #CB6C52;
    padding: 0px 6px;
}


/*=========================================
single property page
===========================================*/
.single-property-content {
    background-color: #FFF;
    padding: 0px 15px 20px;
} 

.lSGallery {
    position: relative;
    bottom: 90px;
}  
.lSSlideOuter { 
    text-align: center;
}
.single-property-content .lSSlideOuter .lSPager {
    display: inline-block;
}
.single-property-content .lSSlideOuter .lSPager li.active, .single-property-content .lSSlideOuter .lSPager li:hover {
    border-radius: 0px;
}
.single-property-content .lSSlideOuter .lSPager li.active, .single-property-content .lSSlideOuter .lSPager li:hover {
    border: 2px solid #FFF;
}
.single-property-content .light-slide-item {
    position: relative; 
    overflow: hidden;
}
.single-property-content .lSAction > .lSNext {
    background-image: url("../../assets/img/arrow-right.svg");
    background-position: center center;
}
.single-property-content .lSAction > .lSPrev {
    background-image: url("../../assets/img/arrow-left.svg");
    background-position: center center;
}

.favorite-and-print {
    position: absolute;
    z-index: 9;
    right: 0px;
    padding: 15px;
}
.favorite-and-print .add-to-fav {
    color: #FFF;
    border: 2px solid #FFF;
    border-radius: 50%;
    height: 35px;
    margin-right: 10px;
    width: 35px;
    padding: 10px 3px 4px 6px;
}
.favorite-and-print  .printer-icon {
    color: #FFF;
    border: 2px solid #FFF;
    border-radius: 50%;
    padding: 10px 7px 4px 7px;
}
.favorite-and-print .add-to-fav:hover  ,.favorite-and-print  .printer-icon:hover  {
    color:#CB6C52;
    border-color: #CB6C52;
}
.favorite-and-print .add-to-fav i ,.favorite-and-print  .printer-icon i  { 
    font-size: 25px;
}
.prp-style-2 .single-property-wrapper{
    margin-top: -35px;
}
.prp-style-1 .single-property-wrapper{
    margin-top: -35px;
}
.single-property-header {
    padding-bottom: 25px;
    position: relative;
    clear: both;
    overflow: hidden;
}
.single-property-header .property-title {
    margin: 10px 0px;
    font-size: 28px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 3px;
}
.single-property-header .property-price{
    color: #ffcec0;
    font-size: 30px;
    letter-spacing: 1.5px;
    right: 0px;
    border-bottom: 2px solid;
    line-height: 42px;
} 
.clearfix {
    clear: both;
}
.s-property-title {
    margin-bottom: 15px;
    color: #ffcec0;
    font-size: 18px;
}

.s-property-title::after {
    background-color: #E5E6E7;
    content: "";
    display: block;
    width: 30px;
    height: 3px;
    margin: 3px 0px 0px 2px;
}
.property-single-content p {
    margin-bottom: 20px;
}
.space1{
    height: 20px;
}
.property-meta{
    padding: 20px 0px;
}
.property-info-entry .property-info-label {
    font-size: 13px;
    display: block;
    line-height: 15px;
    text-transform: uppercase;
}
.property-info-entry .property-info-value {
    font-size: 18px;    
    line-height: 24px;
    white-space: nowrap;
} 
.property-info-unit{
    font-size: 12px;    
    line-height: 12px;
    white-space: nowrap;
}
.additional-details-list{
    list-style: outside none none;
    margin: 0px;
    padding: 0px;
}
.additional-details-list li{
    overflow: hidden;
    margin: 2px;
    border: 1px solid #F3F3F3;
}
.add-d-title {
    font-weight: 600;
    text-transform: uppercase;
    background-color: <?php echo $colors->EVENT_PAGE_ADDTIONAL_DETAILS_BACKGROUND_COLOR; ?>;
    margin: 0px;
    color: <?php echo $colors->EVENT_PAGE_ADDITIONAL_DETAILS_FONT_COLOR; ?>;
}
.add-d-title:hover {
    background-color: #727272;
}

.sidebar-property{
    background-color: <?php echo $colors->EVENT_PAGE_TICKET_DETAILS_BACKGROUND_COLOR; ?>;
    padding: 15px 25px 25px;
}
.dealer-widget {
    background-color: <?php echo $colors->EVENT_PAGE_USER_DETAILS_BACKGROUND_COLOR; ?>;
    padding: 15px;
    color: <?php echo $colors->EVENT_PAGE_USER_DETAILS_FONT_COLOR; ?>;
    padding-bottom: 20px;
    margin: -15px -15px 25px;
}
.dealer-name{
    margin-top: 6px;
    margin-bottom: 5px;
}
.dealer-name a {
    color: <?php echo $colors->EVENT_PAGE_USER_DETAILS_FONT_HEADER_COLOR; ?>;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.dealer-name span {
    font-size: 17px;
    clear: both;
}
.dealer-face img{
    opacity: 0.7
}
.dealer-face img:hover{
    opacity: 0.9;
    border: 2px solid #FFF;
}
.dealer-social-media a{
    color: #969696;
    margin: 5px;
}
.dealer-contacts{
    list-style: outside none none;
    padding: 30px 0px 0px 10px;
}
.dealer-contacts li i{
    color: black;
    padding-right: 8px;
}
.clear{ 
    clear: both;
    overflow: hidden;
}
.dealer-content p{
    padding-left: 10px;
}
.section {
    padding-top: 15px;
    padding-bottom: 15px;
}
.property-features ul {
    padding: 0px ;
    list-style: outside none none;
}
.property-features ul li{
    margin: 0px 15px 15px 0px;
    display: inline-table;
}
.property-features ul li a::after{
    content: "/";
    color: #CB6C52;
    font-weight: bold;
    padding-left: 5px;
    font-size: 14px;
}
.property-features ul li a{
    text-transform: uppercase;
    color: #9C9C9C;
    font-weight: 500;
}
.property-features ul li a:hover{    
    color: black;
}
.roperty-social ul{
    padding: 0px;
    margin: 0px;
    list-style: outside none none ;
}
.roperty-social ul li{
    display: inline-block;
    margin: 5px;
}
.property-style2 .dealer-widget {
    background-color: #838383; 
}
.dealer-section-space{
    margin: -5px -14px 25px;
    background-color: #9B9B9B;
    padding: 10px 25px;
    font-size: 18px;
    text-transform: uppercase;
}
#prop-smlr-slide_0 .owl-item{
    padding: 5px;
}
#prop-smlr-slide_0 .owl-item .item-entry{
    padding: 10px
} 
#prop-smlr-slide_0 .owl-item .item-entry h5 {
    text-transform: uppercase;
    font-weight: 600;
    color: #9B9B9B;
    letter-spacing: 2px;
    position: relative;
}
/*full width property */
.full-width-sld .lSGallery { 
    bottom: 36px;
}

.dealer-action a{
    color: #7E7E7E;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 300;
}
.dealer-action a:hover{
    color: black;
}
.dealer-action a::after{
    content: "/";
    color: #CB6C52;
    font-weight: 700;
    font-size: 20px;
    margin: 4px;
}
.register-area{
    padding: 40px;
}

/*=====================================
Welcom 
======================================*/
.Welcome-area{
    background: #F3F3F3 url("../../assets/img/welcome-bg.png") no-repeat scroll left top;
    position: relative;


}
.Welcome-area .container .Welcome-entry{    
    overflow: hidden;
    padding: 50px 10px 45px; 
}
.welcome-icon {
    height: 90px;
    width: 90px;
    border: 2px solid #777;
    border-radius: 100%;
    display: inline-block;
    position: relative;
    padding: 15px;
    cursor: pointer;
}
.welcome-estate:hover .welcome-icon{
    color:#FFF;
    border: 2px solid transparent;
    background-color: #CB6C52;
}

.welcome_text{
    color:#FFF;
}
.welcome-estate{
    background-color: #FFF;
    padding: 35px 0px;
    text-align: center;
    fill: #FFF;
}
.welcome-estate h3 {
    font: 600 14px "Open Sans",sans-serif;
    text-transform: uppercase;
    margin: 20px 0px 0px;
}
.welcome_text ul {
    padding-left: 0px;
    list-style: outside none none;
    margin-top: 45px;
}
.welcome_text ul li {
    margin-bottom: 10px;
}
.welcome_text ul li span {
    font-size: 18px;
    margin-right: 15px;
}
.welcome-circle{
    background-color: #FFF;
    display: inline-block;
    height: 50px;
    width: 50px;
    border-radius: 100%;
    margin: -18px 0px;
    border: 10px solid #F3F3F3;
    position: relative;
    z-index: 1000;
}
.welcome_text .page-title h2 {
    color: #9B9B9B;
    text-transform: uppercase;
    background-color: #FFF;
    position: absolute;
    top: 126px;
    right: 26px;
    font-weight: 500;
    font-size: 35px;
    border-radius: 50%;
    padding: 35px 10px;
    width: 170px;
    height: 160px;
}
/*===================================================
count-area
===================================================*/
.count-area {
    position: relative; 
    background-color: #FCFCFC; 
}
.count-area .count-item {
    text-align: center;
}
.count-area .count-item-circle {
    height: 100px;
    width: 100px;
    border: 1px solid #777;
    border-radius: 100%;
    margin: 0px auto;
    position: relative;
}
.count-item-circle span {
    font-size: 40px;
    height: 40px;
    position: absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    margin: auto;
    right: 0px;
}
.count-area .chart {
    position: relative;
}
.percent-blocks{
    padding-top:45px;
    padding-bottom: 70px
}
.count-item h2 {
    font: 700 30px "Open Sans",sans-serif;
    text-align: center;
    margin: 30px 0px 5px;
}
.chart canvas {
    position: absolute;
}
.count-item h5 {
    font: 500 15px "Open Sans",sans-serif;
    padding: 2px 15px;
    text-transform: uppercase;
    margin: 0px;
    border-left: 2px solid #CB6C52;
    border-right: 2px solid #CB6C52;
    display: inline-block;
}
.boy-sale-area {
    position: relative;
    padding: 70px 0px;
    background-color: #F3F3F3;
    color: #FFF;
}

.asks-first{
    background-color: rgb(225, 225, 225);
    padding: 35px 0px 35px 30px;
    position: relative;
    cursor: pointer;
}
.asks-first:hover{
    background-color: #8C8C8C; 
}
.asks-first:hover .asks-first-circle{
    background-color: #8C8C8C; 
}
.asks-first-circle {
    float: left;
    width: 70px;
    height: 70px;
    border: 2px solid #9C9C9C;
    border-radius: 100%;
    text-align: center;
    margin-right: 15px;
}
.asks-first-circle span {
    vertical-align: middle;
    font-size: 32px;
    margin-top: 15px;
    line-height: 1;
}
.asks-first-info{
    color: #FFF;
    margin: 0px 65px 0px 85px;
}
.asks-first-info h2 {
    font: 500 20px "Open Sans",sans-serif;
    margin: 0px 0px 4px;
    text-transform: uppercase;
}
.asks-first-info p {
    font: 400 13px "Open Sans",sans-serif;
    margin: 0px;
}
.asks-first-arrow{
    top: 0px;
    position: absolute;
    right: 0px;
    width: 60px;
    height: 100%;
    float: right;
    background: rgba(0, 0, 0, 0.07) none repeat scroll 0% 0%;
    text-align: center;
}
.asks-first-arrow span {
    background: rgba(255, 255, 255, 0.19) none repeat scroll 0% 0%;
    color: rgb(255, 255, 255);
    border-radius: 100%;
    display: inline-block;
    padding: 4px;
    font-size: 20px;
    width: 30px;
    height: 30px;
    font-weight: normal;
    position: absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    margin: auto;
}
.asks-call {
    color: #525252; 
    text-align: center;
    margin-top: 45px;
    font-size: 1.35em;
}
.box-tree .item-tree-icon i{
    font-size: 3em;
    cursor:     pointer;    
}
.box-tree .item-tree-icon{
    padding-top:35%; 
}
.box-tree .item-tree-icon i:hover{
    color: #D27E04;  
}
.box-for{
    padding: 10px 0px;
    border: 1px solid #EEE;
    transition: all 0.2s ease 0s;
    box-shadow: none;
    background-color: #FFF;
}
.more-entry a{
    color: #000;
    font-size: 19px;
    letter-spacing: 2px;
    font-weight: 500;
    text-transform: uppercase;
}
.tree-sub-ttl {
    font-size: 12px;
}
.border-btn{
    border: 1.5px solid;
    background: transparent none repeat scroll 0% 0%;
    border-radius: 0px;
    padding: 9px 25px;
    margin-top: 10px;

}
.border-btn:hover,.border-btn:focus{

}
.item-entry a {
    color: #000;
}
.item-entry a:hover ,.item-entry a:focus {
    color: #999696;
}
.search-form .search-toggle {
    margin-top: 20px;
    overflow: hidden;
    color: #777;
    border-top: 1px solid #EAEAEA;
    padding: 15px;
}
.search-form .form-inline .form-group { 
    width: 235px;
    text-align: left;
    letter-spacing: 0.5px;
}
.slider-selection { 
    background: #CB6C52;
}
.search-form .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
    color: #FFF;
    text-decoration: none;
    background-color: #CB6C52;
    outline: 0px none;
}
.search-form .dropdown-menu > li > a {
    display: block;
    padding: 9px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857;
    color: #333;
    white-space: nowrap;
}
.search-form .dropdown-menu {
    padding: 5px 0px 0px 0px;
}

/*
blog
*/ 
.blog-asside-right{
    padding-right: 15px;
padding-left: 15px;
padding-top: 15px;
padding-bottom: 15px;
}
#blog-listing-big {
    padding: 100px 0px 70px;
}
.blog-lst img{
  width:100%;
  padding-bottom: 15px;
}
.blog-lst .comment  img {
    width: auto;
    padding-bottom: 0px;
}
.blog-page .post, #blog-homepage .post {
    margin-bottom: 40px;
    padding: 1px 15px;
}
.blog-page  .post h2, #blog-homepage .post h2, .blog-page  .post h4, #blog-homepage .post h4 {
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.blog-page  .post .author-category, #blog-homepage .post .author-category {
    color: #999;
    text-transform: uppercase;
    font-weight: 300;
    letter-spacing: 0.08em;
}
.blog-page  .post .author-category a, #blog-homepage .post .author-category a {
    font-weight: 500;
}

.blog-page  .post .image, #blog-homepage .post .image {
    margin-bottom: 10px;
    overflow: hidden;
}
.blog-page  .post .intro, #blog-homepage .post .intro {
    text-align: left;
}
.blog-page  .post .read-more, #blog-homepage .post .read-more {
    text-align: right;
}
.blog-page  .post .date-comments a, #blog-homepage .post .date-comments a {
    color: #999;
    margin-right: 20px;
    font-weight: 300;
}
/*Home page style 2 Edite */
.home-lager-shearch .large-search {
    padding: 25px 25px 10px;
}

.home-lager-shearch .large-search .btn-lg-sheach {
    bottom: -46px;
    border-radius: 50%;
    width: 60px;
    border: 2px solid #FFF;
    background-image: url("../../assets/img/icon-shearch.png");
    position: relative;
    background-position: 2px -1px;
    height: 60px;
}
.home-lager-shearch .large-search .btn-lg-sheach:hover ,.home-lager-shearch .large-search .btn-lg-sheach:focus{
    background-image: url("../../assets/img/icon-shearch.png");
    background-position: 2px -1px;
    background-color: #655D5D;
} 
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color: #FFF;
    background-color: #FFC500;
}
.nav-pills > li > a {
    border-radius: 0px;
}
.large-search{
    padding: 25px 25px 40px;
}
.large-search .search-form {
    background-color: #FFF;
    border-radius: 1px;
    padding: 20px 0px;
    box-sizing: border-box;
    position: relative;
    z-index: 9;
    border: 1px solid #E6E6E6;
    box-shadow: 0px 0px 1px rgba(0, 0, 0, 0);
    display: inline-block;
    width: 100%;
}
.large-search .search-form .form-inline .form-control, .form-inline .form-control,
.large-search .search-form .bootstrap-select button.dropdown-toggle ,
.large-search .search-form .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn){
    width:100%;
}
.large-search .search-row{
    overflow: hidden;
}


.login-blocks h2 ,.register-blocks h2  {
    display: inline-block;
    text-transform: uppercase;
    margin-bottom: 15px;
    background: transparent none repeat scroll 0% 0%;
    border-bottom: 2px solid #CB6C52;
    font-size: 20px;
    line-height: 30px;
}
.login-social{
    display: inline-table;
    margin-bottom: 15px;
    padding: 10px 15px;
    background-color: #7A7878;
    color: rgb(255, 255, 255);
}
.login-social i{
    font-size: 23px;
}
.login-social:hover, .login-social:focus{
    background-color: #CB6C52;
}


.profiel-container{
    padding: 10px 0px;
    border: 1px solid #EEE;
    transition: all 0.2s ease 0s;
}
.profiel-container .profiel-header h3 {
    font-weight: 200;
    text-align: center;
} 

.profiel-container .picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.profiel-container .picture{
    width: 220px;
    height: 230px;
    background-color: #808080;
    border: 4px solid #CCC;
    color: #FFF;
    border-radius: 4px;
    margin: 35px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.profiel-container .picture:hover{
    border-color: #2ca8ff;
}
.profiel-container .ct-wizard-azzure .picture:hover{
    border-color: #2CA8FF;
}
.profiel-container  .picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0px;
    opacity: 0 !important;
    position: absolute;
    top: 0px;
    width: 100%;
}

.profiel-container  .btn-finish{
    width: auto;
}
.error-page .error-title{
    font-size: 11em;
    color: #CB6C52;
}

.fqa-title::before {

    float: left;
    width: 24px;
    height: 24px;
    content: "";
    color: #CB6C52;
    font-size: 16px;
    line-height: 24px;
    text-align: center;
    font-family: "FontAwesome";
    margin-right: 16px;
    cursor: pointer;

}


.property-posting{
    padding: 60px 0
} 
.overlay {
    background: -webkit-linear-gradient(transparent 57%, rgba(0,0,0,1) 100%); /* Chrome 10+, Saf5.1+ */
    background:    -moz-linear-gradient(transparent 57%, rgba(0,0,0,1) 100%); /* FF1.6+ */
    background:     -ms-linear-gradient(transparent 57%, rgba(0,0,0,1) 100%); /* IE10 */
    background:      -o-linear-gradient(transparent 57%, rgba(0,0,0,1) 100%); /* Opera 11.10+ */
    background:         linear-gradient(transparent 57%, rgba(0,0,0,1) 100%); /* W3C */
    border-radius: 2px;
    height: 189px;
    left: 0;
    position: absolute;
    top: -82px;
    width: 98%;
    opacity: 0;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.overlay > h3 {
    bottom: -50px;
    margin: 0;
    position: absolute;
    left: 15px;
    color: #fff;
    font-weight: 700;
    font-size: 17px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.property-posting .tab-content{
    margin-top: 30px
}
.tab-content ul li {
    margin-right: 14px;
    overflow: hidden;
}
.tab-content ul li:last-child{
    margin-right: 0;
}

.tab-content ul li a{
    position: relative;
}

.tab-content ul li a:hover .overlay {
    opacity: 1
}
.tab-content ul li a:hover .overlay h3{
    bottom: 20px
}

.tab-content ul.property-seeker li a .overlay{

}
.tab-content ul.property-seeker li a .overlay h3 {
    bottom: -100px;
}
.tab-content ul.property-seeker li a:hover .overlay h3 {
    bottom: 35px;
}
.tab-content ul.property-seeker li a .overlay p {
    bottom: 3px;
    color: #fff;
    font-weight: 400;
    left: -100px;
    position: absolute;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-transition-delay:0.2s;
    -moz-transition-delay:0.2s;
    -ms-transition-delay:0.2s;
    -o-transition-delay:0.2s;
    transition-delay:0.2s;

}
.tab-content ul.property-seeker li a:hover .overlay p{
    left: 18px
}

/*FOOOTER*/
.footer-area{
border-top: 1px solid #D1D1D1;
background: #555 url("../../assets/img/bg-footer.jpg") repeat scroll 0% 0%;
color: #535353;
}
.footer{
padding: 0px 0px 60px;
background: rgba(255, 255, 255, 0.89) none repeat scroll 0% 0%;
}
.footer ul li i { 
    padding-right: 10px;
    color: #000;
} 
.footer-copy{
    background: rgba(213, 213, 213, 0.9) none repeat scroll 0% 0%;
    border-top: 0.051px solid rgba(162, 162, 162, 0.46);
    padding-bottom: 0px;
    padding-bottom: 7px;
padding-top: 7px;
}
.single-footer{
    margin-top: 35px
}
.footer img{
    margin-bottom: 20px;
}
.footer p{  
    line-height: 25px;
    font-size: 13px;
    padding-bottom: 20px;
}
.footer h4{
    color: #717171;
    font-weight: 400;
    margin-top: 0px;
    font-size: 20px;
    text-transform: uppercase;
    border-bottom: 2px solid #878787;
    line-height: 35px;
    margin-bottom: 0px;
    letter-spacing: 2px;
}
.footer h4 span{
    border-bottom: 3px solid #CB6C52;
}
.footer-title-line {
    width: 100px;
    height: 2px;
    background: #CB6C52;
    margin: 0px 0px 33px;
    position: relative;
    top: -2px;
}
.footer h5{
    color: #fff;
    margin-top: 20px;
    font-weight: 700;
}
.footer a{
    color: #fff;
}
.footer ul{
    padding: 0px;
    margin: 0px;
}
.footer  ol, .footer ul {
    list-style: outside none none;
}

.footer ul li{
    margin-bottom: 5px
}
ul.footer-adress li {
    margin-bottom: -4px;
}
.footer ul li a{
color: #535353;
font-weight: 500;
text-transform: uppercase;
font-size: 13px;
}
.footer ul li a:hover{
    color: #CB6C52;
    text-decoration: none;
}
.footer-menu li{
  border-bottom: 1px solid rgba(255, 171, 0, 0.31);
}

.footer-copy span{
    margin-right: 20px; 
    font-size: 13px;
}
.footer-copy span a{
    color: #000;
    font-weight: 500;
} 
.footer img{
    height: 32px;
}
ul.footer-blog li {
    width: 100%;
    display: table;
    margin-bottom: -20px;
}
.footer-blog img {
    width: 100%; 
    height: 60px;
    margin-bottom: 0px;
}
.footer-blog .blg-entry h6 a{   
    font-size: 13px;
    text-transform: capitalize;
    font-weight: 600; 
    color: #FFA600;
}
.footer-blog .blg-entry h6 {
    padding: 2px 0px;
    margin: 0px;
}
.footer-blog .blg-date {
    color: #FFF;
    background-color: #AD7206;
    padding: 2px 3px;
    font-size: 11px;
    position: relative;
    top: -22px;
    width: 100%;
}
.footer-blog .blg-thumb img{
    
}

.footer-blog p {
    line-height: 17px;
    padding: 8px 2px;
}
.news-letter .form-control {
    display: block;
    width: 100%;
    height: 44px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857;
    color: #E1E1E1;
    background-color: rgba(255, 255, 255, 0.52);
    background-image: none;
    border: 1px solid rgba(231, 157, 45, 0.3);
    border-radius: 0px;
    box-shadow: 0px 1px 1px rgba(179, 179, 179, 0.1) inset; 
}
.news-letter .form-control:hover ,.news-letter .form-control:focus{
    background-color: rgba(0, 0, 0, 0.1);
}
.footer .subscribe{ 
    display: inline-block;
    padding: 5px 10px;
    margin-bottom: 22px;
    font-size: 14px;
    margin-left: -17px;
    z-index: 99;
    background-color: #FFA600;
    border-color: #FFA600;
}
.footer .subscribe:hover{
    background-color: #2D2D2D;
    border-color: #2D2D2D;
}

.social ul {
    padding: 0px;
    list-style: outside none none;
}
.social li {
    display: inline-block;
    padding-right: 0.3em;
    padding-bottom: 0.3em;
}
.social  ul li a:hover {
    color: #CB6C52;
order-color: #868686;
background-color: #868686;
}
.social  ul li a:hover i{
   color: #CB6C52;  
}
.social ul li a{
display: block;
width: 40px;
height: 40px;
line-height: 40px;
border-radius: 50%;
border: 1px solid rgb(146, 146, 146);
transition: all 0.8s ease 0s;
color: rgb(146, 146, 146);
}
.social ul li a i{
color: rgb(146, 146, 146);
font-size: 20px;
padding: 10px;
}
.bottom-menu ul{
    list-style: outside none none;
}
.bottom-menu ul li{
    float: left;
    display: inline-block;
}
.bottom-menu ul li a { 
    font-size: 13px;
    color: #2A2A2A;
    padding: 10px;
    font-weight: 500;
}
.bottom-menu ul li a:hover{
    color: #FFC600;
}
/* Preloader */

#preloader {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:#fff; /* change if the mask should have another color then white */
    z-index:99; /* makes sure it stays on top */
}

#status {
    width:200px;
    height:200px;
    position:absolute;
    left:50%;  
    top:50%;  
    background-image:url(../../assets/img/preloader.gif);  
    background-repeat:no-repeat;
    background-position:center;
    margin:-100px 0 0 -100px; 
}
.prop-btm-sheaerch {
    display: none
}
#map {
    height: 300px;
}