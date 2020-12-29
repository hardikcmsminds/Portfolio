<div class="footer">
</div>
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->
	<!-- basic scripts -->
	<!--[if !IE]> -->
	<script src="{{ URL::asset('public/assets/js/jquery-2.1.4.min.js') }}"></script>
	<!-- <![endif]-->
	<!--[if IE]>
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="{{ URL::asset('public/assets/js/bootstrap.min.js') }}"></script>
	<!-- page specific plugin scripts -->
	<script src="{{ URL::asset('public/assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.flash.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.html5.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.print.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/buttons.colVis.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/dataTables.select.min.js') }}"></script>
	<!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ URL::asset('public/assets/js/jquery-ui.custom.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.sparkline.index.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.flot.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.flot.pie.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.flot.resize.min.js') }}"></script>
	<!-- ace scripts -->
	<script src="{{ URL::asset('public/assets/js/ace-elements.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/ace.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/toastr.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/sweetalert.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/select2.min.js') }}"></script>
	<script src="{{ URL::asset('public/assets/js/jquery.maskedinput.min.js') }}"></script>
	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		/* datatable config start */
		jQuery(function($) {
			/*if($('#duration').length){
				$('#duration').mask('999:99');
			}*/
			if($('.select2').length>0){
				$('.select2').select2();
			}
			//initiate dataTables plugin
			if($('#dynamic-table').length > 0){
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					stateSave: true,
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null,null, null, null,null, { "bSortable": false },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } ).on('page.dt', function() {
			    	$('html, body').animate({
			    		scrollTop: $(".dataTables_wrapper").offset().top
			    	}, 'slow');
			    });
			}
			if($('#dynamic-table-accesstoken').length > 0){
				var myAccessTokenTable = 
				$('#dynamic-table-accesstoken')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } );
			}
			if($('#dynamic-table-category').length > 0){
			    $('#dynamic-table-category')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } );
			}
			if($('#dynamic-table-technology').length > 0){
			    $('#dynamic-table-technology')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } );
			}
			if($('#dynamic-table-tag').length > 0){
			    $('#dynamic-table-tag')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } );
			}
			if($('#dynamic-table-server').length > 0){
			    $('#dynamic-table-server')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    });
			}
			if($('#dynamic-table-theme').length > 0){
			    $('#dynamic-table-theme')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } );
			}
			if($('#dynamic-table-packages').length > 0){
			    $('#dynamic-table-packages')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } );
			}
			if($('#dynamic-table-payment-method').length > 0){
			    $('#dynamic-table-payment-method')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    } );
			}
			if($('#dynamic-table-client').length > 0){
			    $('#dynamic-table-client').DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },
					  null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					//"iDisplayLength": 50
					select: {
						style: 'multi'
					}
			    });
			}			    
		});
		$(document).on('click','#removeImage',function(){
			var id = $(this).data('id');
			$('.portfolio_image_'+id).slideUp();
			$('.portfolio_image_'+id+' input[name="old_image"]').val('');
			/*swal({
				title: "Are you sure you want to remove this image?",
				//text: "Once deleted, you will not be able to recover this imaginary file!",
				icon: "warning",
				type: "warning",
				buttons: true,
				dangerMode: true,
				closeOnConfirm: false,
      			showLoaderOnConfirm: true,
			}).then((willDelete) => {
				if (willDelete) {
					var id = $(this).data('id');
					$.ajax({
						url:"{{ route('admin.portfolio.removeImage') }}",
						data:{id:id,_token:"{{ csrf_token()}}"},
						dataType:'json',
						method:"POST",
						success:function(response){
							if(response.status==200){
								swal("Poof! Your image file has been deleted!", {
									icon: "success",
								});
								$('.portfolio_image_'+id).slideUp();
							}else{
								swal(response.message,"","error");
							}
						},
						error:function(jqXHR, exception){
							var msg = '';
					        if (jqXHR.status === 0) {
					            msg = 'Not connect.\n Verify Network.';
					        } else if (jqXHR.status == 404) {
					            msg = 'Requested page not found. [404]';
					        } else if (jqXHR.status == 500) {
					            msg = 'Internal Server Error [500].';
					        } else if (exception === 'parsererror') {
					            msg = 'Requested JSON parse failed.';
					        } else if (exception === 'timeout') {
					            msg = 'Time out error.';
					        } else if (exception === 'abort') {
					            msg = 'Ajax request aborted.';
					        } else {
					            msg = 'Uncaught Error.\n' + jqXHR.responseText;
					        }
					        swal(msg,"","error");
						}
					});
				} else {
					swal("Your image file is safe!");
				}
			});*/
		});
	</script>
	</body>
</html>