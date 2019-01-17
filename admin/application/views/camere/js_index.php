<script src="<?=SITE_URL;?>public/scripts/summernote/summernote.min.js" type="text/javascript"></script>

<script src="<?=base_url();?>public/assets/scripts/fancybox3/jquery.fancybox.min.js"></script>

<?php if(!is_null($items)): ?>
<script type="text/javascript">

$(document).ready(function() {
	<?php foreach($items as $item): ?>
    $("a[rel=<?=getSomeStringByInt("camcoll", $item->id_item);?>]").fancybox({

    });
	<?php endforeach; ?>
});
<!--fancybox-->
</script>
<?php endif; ?>

<!-- Page-Level Scripts -->
<script>
var items = null;
var plan_id = null;
var plan_act = null;

function setPlanValues(plan_id_val, plan_act_val)
{
	plan_id = plan_id_val;
	plan_act = plan_act_val;	
}

function setPlan(plan_id_val, plan_act_val)
{
	setPlanValues(plan_id_val, plan_act_val);
	
	$("#mpcmt").text(items[plan_id].item_name);
}

function planIntervaleAjax() {
	checkModalInputs();
	
  var mpc_data = new FormData($("#form_mpc")[0]);
  mpc_data.append("plan_id", plan_id);
  mpc_data.append("plan_act", plan_act);	
	
  var url = "<?=base_url().$controller_ajax;?>plan_intervale/id/" +plan_id;
  $.ajax({
    url: url,
    dataType: "JSON",
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
		data: mpc_data,
    // beforeSend: function() {
			// showloader();
    // },
    success: function( data ) {
      if(data.status == 1) {
				
				$('#myModalPlanifcamera').modal('hide');
				loadIntervaleAjax([ plan_id ]);
				
				hideloader();

      } else if(data.status == 0) {
        //
      }
    }
  });
}

/**
 * deleteIntervalAjax
 *
 * params Array with ID Items
 */
function deleteIntervalAjax(plan_id_interval) {
	
  var url = "<?=base_url().$controller_ajax;?>delete_interval/id/" +plan_id_interval;
  $.ajax({
    url: url,
    dataType: "JSON",
    type: 'GET',
    beforeSend: function() {
			showloader();
    },
    success: function( data ) {
      if(data.status == 1) {
				
				loadIntervaleAjax([ plan_id ]);
				hideloader();

      } else if(data.status == 0) {
        //
      }

    }
  });	
}

/**
 * deleteInterval
 *
 */
function deleteInterval(plan_id_val, plan_act_val, plan_id_interval) {
	setPlanValues(plan_id_val, plan_act_val);
	
	deleteIntervalAjax(plan_id_interval);
}

/**
 * loadIntervaleAjax
 *
 * params Array with ID Items
 */
function loadIntervaleAjax(data) {
	
  var url = "<?=base_url().$controller_ajax;?>load_intervale/id/intervale";
  $.ajax({
    url: url,
    dataType: "JSON",
    type: 'POST',
		data: { postdata : data },
    beforeSend: function() {
			showloader();
    },
    success: function( datajx ) {
      if(datajx.status == 1) {
				
				// console.log(datajx);
				appendIntervale(datajx.items);
				hideloader();

      } else if(datajx.status == 0) {
        //
      }
      // $.map(data, function(item) {
      //  // var = item.item;
      // })

    }
  });	
}

/**
 * appendIntervale
 *
 */
function appendIntervale(data) {
	
	$.map(data, function(item, index) {
		
		// console.log(index, item);
		$('#tbplanlist-' +index).html(item.html);//html
		$('#litabpc-' +index).find('a').html(item.title)//title
	});
	dispofftoggle();
}

// Toggle
function dispofftoggle() {
	
	$( ".dispofftog" ).change(function() {
		
		var thisid = $(this).attr('id');

		ajxtoggle(thisid);
		// console.log("thisid", thisid);
	});
}

/**
 * ajxtoggle
 */
function ajxtoggle(id = null) {
	
  var url = "<?=base_url().$controller_ajax;?>offers_toggle/id/" +id;

  $.ajax({
    url: url,
    dataType: "JSON",
    type: 'GET',
    beforeSend: function() {
     showloader();
    },
    success: function( data ) {
			
      if(data.status == 1) {
				hideloader();
				
        $(".cssload-container").hide();
      } else if(data.status == 0) {
        //
      }
      // $.map(data, function(item) {
      //  // var = item.item;
      // })

    }
  });
}

function offerUpdate(id) {
	
	console.log("id", id);
	
  var form_up = new FormData($("#form_camoff-" +id)[0]);
	// console.log(form_up);return;
	
  var url = "<?=base_url().$controller_ajax;?>update_offer/id/" +id;
  $.ajax({
    url: url,
    dataType: "JSON",
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
		data: form_up,
    beforeSend: function() {
			showloader();
    },
    success: function( data ) {
			
      if(data.status == 1) {

				hideloader();

      } else if(data.status == 0) {
        //
      }
    }
  });	
}

<?php if(!is_null($items_json)): ?>

var itemsjs = JSON.stringify(<?=$items_json?>);
items = JSON.parse(itemsjs);
<?php endif; ?>


$(document).ready(function () {
	
	//datepicker
	$('#data_5 .input-daterange').datepicker({
			keyboardNavigation: false,
			forceParse: false,
			autoclose: true,
			format: "dd-mm-yyyy"
	});
	
	<?php if(!is_null($items)): ?>
	// load Intervale on.ready
	var newarray = [];
	$.map(items, function(item, index) {
		
		newarray.push(index);
	});
	
	loadIntervaleAjax(newarray);
	<?php endif; ?>
	
	
	<?php if(!is_null($items)):?>
	<?php foreach($items as $itemj): ?>
	$('#offcontentro-' +"<?=$itemj->id_item?>").summernote({
		toolbar: [
			['style', ['style']],
			['fontsize', ['fontsize']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['insert', ['picture', 'hr']],
			['table', ['table']]
		],
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
	});
	<?php endforeach; ?>
	<?php endif; ?>
});

function checkModalInputs() {
	
	var d_start = $('input[name="date_start"]').val();
	var d_end = $('input[name="date_end"]').val();
	var pret = $('input[name="pret"]').val();

	
	// if(!Date.parse(d_start) || !Date.parse(d_end)) {
	if(d_start == "" || d_end == "" || pret == "") {
		
		alert("Completeaza datele pentru Check-in Check-out si Pret");
		e.preventDefault();
	} else if(Date.parse(d_end) < Date.parse(d_start)) {
		
		alert("Ai introdus datele gresit.")
		e.preventDefault();
	}
	
};
</script>
