<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">            
            <!-- start: metrics table -->
            <div id="metrics-tables">
                <div class="table-responsive table-wrapper table-mobile">
                    <table class="table table-hover table-bordered fixed-head-table">
                        <thead>
                            <tr>
                                <th>portfolioid</th>
                                <th>title</th>
                                <th>client name</th>
                                <th>content</th>
                                <th>category</th>
                                <th>technology</th>
                                <th>display_index</th>
                                <th>tags</th>
                                <th>site_link</th>
                                <th>image</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>web_server</th>
                                <th>theme</th>
                                <th>js_css_packages</th>
                                <th>payment_methods</th>
                                <th>multi_theme</th>
                                <th>multi_sites</th>
                                <th>duration</th>
                                <th>addons</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($portfolio['portfolio'] as $newdata)
		            		<tr>
		            			<td>{{ $newdata->portfolioid }}</td>
		            			<td>{{ $newdata->title }}</td>
                                <td>{{ $newdata->client_name }}</td>
		            			<td>{{ $newdata->content }}</td>
		            			<td>{{ $newdata->category_names }}</td>
		            			<td>{{ $newdata->technology_name }}</td>
		            			<td>{{ $newdata->display_index }}</td>
		            			<td>{{ $newdata->tag_names }}</td>
		            			<td>{{ $newdata->site_link }}</td>
		            			{{-- <td><img src="{{ (($newdata->image and file_exists('template/frontend/images/'.$newdata->image)) ? public_path('../template/frontend/images/'.$newdata->image) : public_path('../template/frontend/images/no-image-icon-15.png')) }}" alt="" height="100px" width="100px" /></td> --}}
                                <td><a href="{{ (($newdata->image and file_exists('template/frontend/images/'.$newdata->image)) ? URL::asset('template/frontend/images/'.$newdata->image) : URL::asset('template/frontend/images/no-image-icon-15.png')) }}">{{ (($newdata->image and file_exists('template/frontend/images/'.$newdata->image)) ? URL::asset('template/frontend/images/'.$newdata->image) : URL::asset('template/frontend/images/no-image-icon-15.png')) }}</a></td>
		            			<td>{{ $newdata->created_at }}</td>
		            			<td>{{ $newdata->updated_at }}</td>
		            			<td>{{ $newdata->server_name }}</td>
		            			<td>{{ $newdata->theme_name }}</td>
		            			<td>{{ $newdata->package_names }}</td>
		            			<td>{{ $newdata->payment_names }}</td>
		            			<td>{{ $newdata->multi_theme }}</td>
		            			<td>{{ $newdata->multi_sites }}</td>
		            			<td>{{ $newdata->duration }}</td>
		            			<td>{{ $newdata->addons }}</td>
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