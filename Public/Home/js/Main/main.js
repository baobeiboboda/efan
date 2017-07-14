jQuery(document).ready(function($)
	{
		$("#user").dataTable().yadcf([
			{column_number : 0},
			{column_number : 1, filter_type: 'text'},
			{column_number : 2, filter_type: 'text'},
			{column_number : 3, filter_type: 'range_number'},
			{column_number : 4},
			{column_number : 5},
			{column_number : 6},
		]);
	});