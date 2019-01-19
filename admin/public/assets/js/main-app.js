$(document).ready(function() {
	$('.ahrefaskconfirm').click(function(e){
		if(confirm('Esti sigur?')){
				// The user pressed OK
				// Do nothing, the link will continue to be opened normally
		} else {
				// The user pressed Cancel, so prevent the link from opening
				e.preventDefault();
		}
	});
	$('.datepicker').pickadate({
		min: true
	});
});

function showloader() { $(".cssload-container").show(); }
function hideloader() { $(".cssload-container").hide(); }
$(".swloader").click(function(){ showloader(); });
$(document).ready(function() { hideloader(); });
