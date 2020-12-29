<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            
            <!-- start: metrics table -->
            <div id="metrics-tables">
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th>Category Id</th>
                                <th>Category Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category['category'] as $newdata)
		            		<tr>
		            			<td> {{ $newdata->category_id }} </td>
		            			<td> {{ $newdata->category_name }} </td>
		            		</tr>
		            	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end: metrics table -->
        </div>
    </div>
</div>