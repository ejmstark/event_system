<?php
   header('Content-type: text/css');
   require("../../CustomizationManager.php");
   CustomizationManager::SetTheme("configurations 0");
   $colors = CustomizationManager::$colors;
?>

body {
    overflow-y: scroll;
    overflow-x: hidden;
}

/*overlay add button*/
.fixedbutton {
  content: url('../img/btnAdd_Black.png');
    position: fixed;
    bottom: 0px;
    right: 0px;
    width: 80px;
    margin: 10px 10px 10px 10px;
    cursor: pointer;
}

.fixedbutton:hover {
  content: url('../img/btnAdd_Orange.png');
  position: fixed;
    bottom: 0px;
    right: 0px;
    width: 80px;
    margin: 10px 10px 10px 10px;
    cursor: pointer;
}

/*end of overlay button*/

/*header background images*/
.top {
    //background-image: url('../img/toptop.png');
    background-image: <?php
      echo "url(" . CustomizationManager::$images->WELCOME_PAGE_BACKGROUND . ");";
    ?>
    width: 100%;
    height: 100%;
    visibility: visible;
    position: absolute;
    top: 0px;
    left: 0px;
}

.inner-header {
    content: url('../img/dailyEvents.png');
    width: 55%;
    height: 70%;
    top: 0px;
    left: 0px;
    opacity:0.9;
    margin: auto;
    position: relative;
}
/*end of header background-images*/

/*navbar styling*/
.div-content {
    color: white;
    font-family: Oswald Regular Regular;
    font-size: 20px;
    margin-top: 70px;
    margin-left: 200px;
    margin-bottom: 20px;
    padding-right: -1000px;
    text-align: center;
}

a {
    color: white;
}

a:hover {
    color: #ca694f;
    text-decoration: none;
}
/*end of navbar styling*/

/*search bar styling*/
.search-container {
    margin-top: -20px;
    width: 45%;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.searchTerm {
  float: left;
  width: 100%;
  border: 5px solid #3c3c3c;
  background-color: #464646;
  padding: 5px;
  height: 70%;
  border-radius: 5px;
  outline: none;
  color: <?php echo $colors->INDEX_PAGE_SEARCH_CONTAINER; ?>;
}

.searchTerm:focus{
  color: #cb6c52;
}

.searchButton {
  position: absolute;
  right: 0px;
  width: 40px;
  height: 36px;
  border: 1px solid #3c3c3c;
  background: #3c3c3c;
  text-align: center;
  color: #cb6c52;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;
}

.searchButton:hover {
    color: #fff;
}

input::placeholder {
    color: #fff;
    font-family: Oswald Regular Regular;
}
/*end of search bar styling*/


/*footer styling*/
footer {
    background-color: <?php echo $colors->INDEX_PAGE_EVENT_NAME_COLOR?>;
    height: 400px;
    position: absolute;
    margin-top: 1000px;

   /* position: relative;
   bottom: 0px;
   width: 100%;
       background-color: #1e1e1e;*/


}

.footer-content {
    color: white;
    font-family: Oswald Regular Regular;
    margin-left: 10px;
    margin-bottom: 20px;
    padding-right: -1000px;
}

.footer-left {
    content: url('../img/dailyEvents.png');
    width: 35%;
    height: 70%;
    top: 0px;
    left: 0px;
    opacity:0.9;
    margin-top: 35px;
}

.footer-right {
    margin-left: 450px;
    margin-top: 70px;
    text-align: right;
    padding: 0px 0px 0px 0px;
}

.footer-right1 {
    font-size: 40px;
}

.footer-right2 {
    font-size: 20px;
}

.footer-bottom {
    color: white;
    font-size: 20px;
    margin-left: 40px;
}

/*end of footer styling*/

/*module content*/
.container-content {
    background: linear-gradient(#cb6c52,#363636);
    /*height: 2500px;
    width: 102.5%;
    visibility: visible;
    position: absolute;
    top: 0px;
    left: 0px;
    margin-left: -15px;
    margin-top: 660px;
    display: inline-block;
    overflow: hidden;*/

    background-size: contain;
    background-repeat: no-repeat;
    width: 100%;
    height: 0;
    padding-top: 66.64%;


}

.content {

}

.container {
    margin-bottom: -1000px;
    top: 0px;
    left: 0px;
    opacity:0.9;
    /*margin-top: 170px;*/
}
/*end of module content*/


/*responsive events layout*/
.list-of-events {
    -webkit-column-count: 3; /* Chrome, Safari, Opera */
    -moz-column-count: 3; /* Firefox */
    column-count: 3;
}

.list-of-events  img{ width: 100%; padding: 7px 0;}
@media (max-width: 500px) {
    .list-of-events  {
        -webkit-column-count: 1; /* Chrome, Safari, Opera */
        -moz-column-count: 1; /* Firefox */
        column-count: 1;
    }
}
/* end of responsive events layout*/

/*event's description*/
.event {
   width: 100%; /* for IE 6 */
}

.event-description {
   position: absolute;
   color: white;
   letter-spacing: 1px;
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
   padding: 5px;
   margin-top: -107px;
   width: 100%;
   height: 100px;
}

.event-date-category {
    margin-top: -3px;
   color: white;
   font-size: 15px;
   letter-spacing: 0.5px;
   padding: 10px;
   width: 100%;
}

.event-name {
   color: <?php echo $colors->INDEX_PAGE_EVENT_NAME_COLOR; ?>;
   font: bold 20px Oswald Regular Regular;
   letter-spacing: 1px;
   padding: 10px;
   width: 100%;
   margin-top: -20px;
}

.event-location {
    color: white;
    font-size: 13px;
    letter-spacing: 0.5px;
    padding: 10px;
    width: 100%;
    margin-top: -10px;
}

.event-category {
    padding-left: 60px;
}

.location-icon {
    content: url('../img/location.png');
    width :20px;
    position: absolute;
}

.event-location span {
    margin-left: 25px;
}
/*end of event's description*/


/*event:hover*/
.event-box {
    display: inline-block;
    position: relative;
    overflow: hidden;
}

.event-box-overlay {
  visibility: hidden;
  opacity: 0.5;
  transition: visibility 0s linear 0.5s,opacity 0.5s linear;
}

.event-box a{
    color: transparent;
}

.event-box a:hover .event-box-overlay {
    visibility: visible;
    opacity: 1;
    transition-delay: 0s;
    text-align: center;
    position: absolute;
    background: rgba(0, 0, 0, 0.7);
    margin-top: 7px;
    color: #fff;
    width: 100%;
    height: 95%;
    text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
}

.event-box-overlay span {
    margin: auto;
    position: absolute;
    top: 0; left: 0; bottom: 0; right: 0;
}

.glyphicon.glyphicon-eye-open{
    font-size: 30px;
}

/*end of event:hover*/


/* start of header*/

.navbar .navbar-toggle .icon-bar {
    background-color: white;
}

.navbar .navbar-nav {
  display: inline-block;
  float: none;
  vertical-align: top;
  margin-top: 20px;
}

.navbar .navbar-collapse {
  text-align: center;
  margin-left: 20px;
}

.nav a{
  font-size: 20px;
}

.nav li{
  padding-right: 50px;
  font-family: Oswald Regular Regular;

 }

.nav li a:hover {
    color: #ca694f;
    text-decoration: none;
}

a:visited {
    color:white;
}

/*end of header*/