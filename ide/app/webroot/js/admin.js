$(document).ready(function(){
	$('[rel=tooltip]').tooltip(
			{'placement':'top'}
			);
	$('.checkAll').change(function(){
		 var $value   = $(this).is(':checked');
		 
		$('#adminForm').find('.cb').each(function(){
			this.checked = $value;
		});
	});
	$('.btn-delete').click(function(e){
		var conf  = confirm('Are you sure to delete this item ?');
		if(!conf){
			e.preventDefault();
			return false;
		}
	});
	$('.btn-delete-list').click(function(e){
		
		var count = 0;
			$('#adminForm').find('.cb').each(function(){
				if($(this).is(':checked'))
				{
					count++;
				}
			});
		if(count == 0)
		{
			alert(' Please check any item');
			return false;
		}
		else{
			var conf = confirm('Are you sure to delete item(s)?');
			if(!conf) return false;
		}
		var $action = $(this).attr('rel');

		$('#adminForm').attr('action',$action);
		$('#adminForm').submit();
		
	});
	$('.btn-edit-list').click(
		function(e){
			
			var $action = $(this).attr('rel');
			var count = 0;
			var id =0;
			$('#adminForm').find('.cb').each(function(){
				if($(this).is(':checked'))
				{
					count++;
					id = $(this).val();
					return;

				}
			});
			if(count==0)
			{
				alert('Please Check Any Item!');
				return false;
			}

			$('#adminForm').attr('action',$action+'/'+id);
			$('#adminForm').submit();

		}
	);
	$('#btn-clear-search').click(
		function(){
			$('#filter_search').val('');
			$('#adminForm').submit();
		}
	);
	
});
function validate()
{
	return $('#adminForm').parsley( 'validate');
	
}
