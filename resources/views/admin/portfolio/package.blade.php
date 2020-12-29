<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            
            <!-- start: metrics table -->
            <div id="metrics-tables">
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th>Package Id</th>
                                <th>Package Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($package['package'] as $newdata)
		            		<tr>
		            			<td> {{ $newdata->package_id }} </td>
		            			<td> {{ $newdata->package_name }} </td>
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