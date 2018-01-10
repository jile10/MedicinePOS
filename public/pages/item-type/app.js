$('.butt').on('click', function(e) {
   e.stopPropagation();
});	

function updateClicked(id)
{
	$.ajax({
	    type:'get',
	    url:'/ajax/get-item-type',
	    data:{'id':id},
	    success:function(data){
	    	$('#id').val(data.id);
	    	$('#name').val(data.name);
	    	$('#description').val(data.description);
			$('#updateModal').modal('show');
	    },
	    error:function(){
	    },
	});
}
function removeClicked(id)
{
	$.ajax({
	    type:'get',
	    url:'/ajax/get-item-type',
	    data:{'id':id},
	    success:function(data){
	    	$('#delete_id').val(data.id);
	    	$('#text').text(data.name);
			$('#removeModal').modal('show');
	    },
	    error:function(){
	    },
	});
}