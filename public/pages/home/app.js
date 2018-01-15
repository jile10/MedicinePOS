var total =0;

function addCart(val,el)
{
	$(el).attr('disabled',true);
	$('#tbody').append('<tr id="row'+val.id+'"><td class="itemname"><span>'+val.name+'</span></td><td><input onchange="quantityChanged(this,'+val.id+','+val.stocks+','+val.new_price+')" id="quantity'+val.id+'" type="number" min="1" max="'+val.stocks+'" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" value="1" name="quantity" class="form-control itemquantity form-control-sm"></td><td class="text-right total" id="price'+val.id+'">'+val.new_price+'</td><td class="text-right"><button class="btn btn-danger btn-sm" onclick="removeItem('+val.id+')"><i class="fa fa-remove"></i></button></td></tr>')
}

function removeItem(val)
{
	$('#but'+val).attr('disabled',false);
	$('#row'+val).remove();
}

function quantityChanged(element,id,stocks,price){
	if(element.value <= stocks){
		$('#price'+id).text(element.value * price);
	}
	else
	{
		$(element).val(1);
	}
}
function checkoutClicked(){
	var tot = 0;
	$('.total').each(function(index,item){
	    
		tot += parseFloat($(item).text());
	 });
	total = tot;
	$('#total').empty();
	$('#total').append(total.toFixed(2));

	$('#tbody tr').each(function(index,item){
		$('#items').append('<div class="col-md-6">'+$(item).find('span').text()+'</div>');
		$('#items').append('<div class="col-md-3 text-center">'+$(item).find('input').val()+'</div>');
		$('#items').append('<div class="col-md-3 text-right">'+$(item).find('.total').text()+'</div>');
	})
}

$('.butt').on('click', function(e) {
	if(total == 0){
	   e.stopPropagation();
	}
});	