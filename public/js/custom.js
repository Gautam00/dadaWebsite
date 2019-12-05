
$(document).ready( function () {

	$('#dataTable').DataTable();

	// available checking
	$('#available').change(function () {
	    
	    if( $('#available').is(":checked") ) {

	    	$('.stock-div').show();

	    } else {

			$('.stock-div').hide();	    	

	    }

	 });

});



function confirmMsg( type, id ) {

	Swal.fire({

	  title: 'Are you sure?',
	  text: "Do you want to delete this "+ type,
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'

	}).then((result) => {

	  if (result.value) {
	    
	    $.ajax({
	        type: 'POST',
	        url: "/admin/delete"+type+"/"+id,
	        data: {
	            '_token': $('meta[name=csrf-token]').attr("content"), 'id': id
	        },
	        success: function (data) {
	            
	        	if( data == '200' ) {

	        		Swal.fire(
				      'Deleted!',
				      type + ' has been deleted.',
				      'success'
				    );

	        	} else {

					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!'
					});     		

	        	}

	        	setTimeout(function(){ location.reload(); }, 2000);
	        	
	        }
	    });


	  }

	});

}

