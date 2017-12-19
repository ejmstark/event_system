
    
<!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->
    
<!-- Jquery Library -->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/js/jquery.ui.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/bootstrap/bootstrap.min.js')?>"></script>
<!-- Modernizr Library For HTML5 And CSS3 -->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/js/modernizr/modernizr.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/mmenu/jquery.mmenu.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/js/styleswitch.js')?>"></script>
<!-- Library 10+ Form plugins-->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/form/form.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/ckeditor/ckeditor.js')?>"></script>
<!-- Datetime plugins -->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/datetime/datetime.js')?>"></script>
<!-- Library Chart-->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/chart/chart.js')?>"></script>
<!-- Library  5+ plugins for bootstrap -->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/pluginsForBS/pluginsForBS.js')?>"></script>
<!-- Library 10+ miscellaneous plugins -->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/plugins/miscellaneous/miscellaneous.js')?>"></script>
<!-- Library Themes Customize-->
<script type="text/javascript" src="<?php echo base_url('assets/adminAssets/js/caplet.custom.js')?>"></script>
<script type="text/javascript">

  function fnShowHide( iCol , table){
      var oTable = $(table).dataTable(); 
      var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
      oTable.fnSetColumnVis( iCol, bVis ? false : true );
  }

  $(function() {
    
    //////////     DATA TABLE  COLUMN TOGGLE    //////////
    $('[data-table="table-toggle-column"]').each(function(i) {
        var data=$(this).data(), 
        table=$(this).data("table-target"), 
        dropdown=$(this).parent().find(".dropdown-menu"),
        col=new Array;
        $(table).find("thead th").each(function(i) {
            $("<li><a  class='toggle-column' href='javascript:void(0)' onclick=fnShowHide("+i+",'"+table+"') ><i class='fa fa-check'></i> "+$(this).text()+"</a></li>").appendTo(dropdown);
        });
    });

    //////////     COLUMN  TOGGLE     //////////
     $("a.toggle-column").on('click',function(){
        $(this).toggleClass( "toggle-column-hide" );          
        $(this).find('.fa').toggleClass( "fa-times" );        
    });

    // Call dataTable in this page only
    $('#table-example').dataTable();
    $('table[data-provide="data-table"]').dataTable();
  });
</script>


<script>
  $(document).ready(function() {  

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $("#addEvent").submit(function(event){
      event.preventDefault();
      if($("#event_title").val()){
        var events=$('<span class="external-event  label" data-color="'+$("#color_select").val()+'">'+$("#event_title").val() +'</span>');
        events.css({'background-color': $("#color_select").val() || "#CCC" , 'margin-right': "3px"});
        $("#external-events").append(events);
        $("#external-events span.external-event").draggable({
          zIndex: 999,
          revert: true,     
          revertDuration: 0 ,
          drag: function() { $("#slide-trash").addClass("active") },
          stop: function() { $("#slide-trash").removeClass("active") }
        });
        $(this)[0].reset();
        $('#md-add-event').modal('hide');
      }else{
        $.notific8('Please enter <strong>event  title</strong> ',{ life:5000, theme:"danger" ,heading:"ERROR :);" });
        $("#event_title").focus();
      }
    });
    $('#external-events span.external-event').draggable({
        zIndex: 999,
        revert: true,     
        revertDuration: 0 ,
        drag: function() { $("#slide-trash").addClass("active") },
        stop: function() { $("#slide-trash").removeClass("active") }
    });
    
      $( "#slide-trash" ).droppable({
     accept: "#external-events span.external-event , .fc-event",
     hoverClass: "active-hover",
     drop: function( event, ui ) {
       ui.draggable.remove();
       $(this).removeClass( "active" );
     }
      });
    var isElemOverDiv = function(draggedItem, dropArea) {
      // Prep coords for our two elements
      var a = $(draggedItem).offset;  
      a.right = $(draggedItem).outerWidth + a.left;
      a.bottom = $(draggedItem).outerHeight + a.top;
      
      var b = $(dropArea).offset;
      a.right = $(dropArea).outerWidth + b.left;
      a.bottom = $(dropArea).outerHeight + b.top;
    
      // Compare
      if (a.left >= b.left
        && a.top >= b.top
        && a.right <= b.right
        && a.bottom <= b.bottom) { return true; }
      return false;
    }
    $('#calendar').fullCalendar({
/*          eventClick: function(calEvent, jsEvent, view) {
      
          alert('Event: ' + calEvent._id);
          alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
          alert('View: ' + view.name);
        $(this).fullCalendar('removeEvents',calEvent._id);
          // change the border color just for fun
        //  $(this).css('border-color', 'red');
      
          },*/
      eventDragStop: function(event, jsEvent, ui, view) {     
        var x = isElemOverDiv(ui, $('#slide-trash'));
        alert(x);     
        if (x) {
          alert("delete");
          $('#calendar').fullCalendar('removeEvents', event.id);
        }     
      },
      header: {
        left: 'title',
        center: '',
        right: ''
      },
      editable: true,
      droppable: true, 
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1),
          end: new Date(y, m, 2),
          color:"#f37864"
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d-10),
          end: new Date(y, m, d-7),
          color:"#1bc6b0"
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          color:"#7ace30"
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d-5, 19, 0),
          end: new Date(y, m, d-4, 22, 30),
          allDay: false,
          color:"#ffcc33"
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 15),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          color:"#62707d"
        }
      ],
      drop: function(date, allDay) { 
                        var  copiedEventObject = {
                                title: $(this).text(),
                                start: date,
                                allDay: allDay,
                                color: $(this).css('background-color')
                            };
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
        $(this).remove();
      }
    });
    $(".change-view").click(function(){
       var data=$(this).data();
      $('#calendar').fullCalendar( 'changeView', data.view ); 
    });
    $(".change-today").click(function(){
      $('#calendar').fullCalendar( 'today' );
    });
    $(".change").click(function(){
        var data=$(this).data();
      $('#calendar').fullCalendar( data.change );
    });
    
  });

</script>

<script type="text/javascript">
  $(function() {
         
      $("#sitemap").treeview({
        control: "#sitemapcontrol",
        persist: "cookie",
        cookieId: "treeview-black"
      });
      
      $("#browser").treeview();
  });
</script>



</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#vmap').vectorMap({
      map: 'world_en',
      backgroundColor: '#736086',
      color: '#ffffff',
      hoverOpacity: 0.7,
      selectedColor: '#666666',
      enableZoom: true,
      showTooltip: true,
      values: sample_data,
      scaleColors: ["#0aa699", "#0bbeaf"],
      normalizeFunction: 'polynomial'
    });
    $("#owl-demo").owlCarousel({
      autoPlay : 5000,
      stopOnHover : true,
      paginationSpeed : 5000,
      goToFirstSpeed : 3000,
      singleItem : true,
      autoHeight : true,
      transitionStyle:"fade"
    });
    $('table[data-provide="data-table"]').dataTable({
      "iDisplayLength": 5
    });
  });
</script>
<script type="text/javascript">
  $(function() {
         
      $("#sitemap").treeview({
        control: "#sitemapcontrol",
        persist: "cookie",
        cookieId: "treeview-black"
      });
      
      $("#browser").treeview();
  });
</script>
<script type="text/javascript">
  $(function() {
         
      $("#sitemap").treeview({
        control: "#sitemapcontrol",
        persist: "cookie",
        cookieId: "treeview-black"
      });
      
      $("#browser").treeview();
  });
</script>


<script>
$(function() {
  $('#datetimepicker1').datetimepicker({
    language: 'pt-BR'
  });
});

</script>


</body>
</html>