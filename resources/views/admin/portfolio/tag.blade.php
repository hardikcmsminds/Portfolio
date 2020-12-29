<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            
            <!-- start: metrics table -->
            <div id="metrics-tables">
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th>Tag Id</th>
                                <th>Tag Name</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tag['tag'] as $newdata)
		            		<tr>
		            			<td> {{ $newdata->tag_id }} </td>
		            			<td> {{ $newdata->tag_name }} </td>
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