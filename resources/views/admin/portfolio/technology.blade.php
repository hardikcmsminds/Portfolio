<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            
            <!-- start: metrics table -->
            <div id="metrics-tables">
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th>Technology Id</th>
                                <th>Technology Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($technology['technology'] as $newdata)
		            		<tr>
		            			<td> {{ $newdata->technology_id }} </td>
		            			<td> {{ $newdata->technology_name }} </td>
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