function itemchange(val){
	var id = val.value;
	console.log(id);
	$.ajax({
	    type:'get',
	    url:'/ajax/get-item-gettype',
	    data:{'id':id},
	    success:function(data){
	    	if(data.length>0)
	    	{
	    		$('.select').attr('disabled',false)
		    	for(var i=0; i<data.length;i++){
		    		$('.select').append('<option value="'+data[i].id+'">'+data[i].name+'</option>')
		    	}
	    	}
	    	else{
	    		$('.select').empty();
	    		$('.select').attr('disabled',true);
	    	}
	   	},
	    error:function(){
	    },
	});
	console.log(id);
}

$('.butt').on('click', function(e) {
   e.stopPropagation();
});	

function updateClicked(id)
{

	$.ajax({
	    type:'get',
	    url:'/ajax/get-item',
	    data:{'id':id},
	    success:function(data){
			$("#avatar-2").fileinput({
			overwriteInitial: true,
			showClose: false,
			showCaption: false,
			browseLabel: '',
			removeLabel: '',
			browseIcon: '<i class="fa fa-folder-open"></i>',
			removeIcon: '<i class="fa fa-remove"></i>',
			removeTitle: 'Cancel or reset changes',
			elErrorContainer: '#kv-avatar-errors-1',
			msgErrorClass: 'alert alert-block alert-danger',
			defaultPreviewContent: '<img src="/images/'+data.image+'" alt="Your Avatar" width="200px" height="200px">',
			layoutTemplates: {main2: '{preview} {remove} {browse}'},
			allowedFileExtensions: ["jpg", "png",]
			});
	    	$('#id').val(data.id);
	    	$('#name').val(data.name);
	    	$('#description').val(data.description);
	    	$('#price').val(data.new_price);
	    	$('#type'+data.itemtype_id).attr('selected',true);
			$('#updateModal').modal('show');
			if(data.itemcategory_id)
			{
				populateCategory();
	    		$('#category'+data.itemcategory_id).attr('selected',true);
			}
			else
			{
				$('.select2').attr('disabled',true);
			}

	    },
	    error:function(){
	    },
	});
}
function removeClicked(id)
{
	$.ajax({
	    type:'get',
	    url:'/ajax/get-item',
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
function addStock(id)
{
	$('#stock_id').val(id);
}

$("#avatar-1").fileinput({
overwriteInitial: true,
showClose: false,
showCaption: false,
browseLabel: '',
removeLabel: '',
browseIcon: '<i class="fa fa-folder-open"></i>',
removeIcon: '<i class="fa fa-remove"></i>',
removeTitle: 'Cancel or reset changes',
elErrorContainer: '#kv-avatar-errors-1',
msgErrorClass: 'alert alert-block alert-danger',
defaultPreviewContent: '<img src="/images/med.png" alt="Your Avatar" width="200px" height="200px">',
layoutTemplates: {main2: '{preview} {remove} {browse}'},
allowedFileExtensions: ["jpg", "png",]
});
