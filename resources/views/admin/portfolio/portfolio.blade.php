@include('admin.includes.header')
<div class="main-container ace-save-state" id="main-container">
	<script type="text/javascript">
		try{ace.settings.loadState('main-container')}catch(e){}
	</script>
@include('admin.includes.sidebar')
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-dashboard home-icon"></i>
						<a href="{{ url('admin/dashboard') }}">Dashboard</a>
					</li>
					<li class="active">Portfolio</li>
				</ul><!-- /.breadcrumb -->
					<!-- /.nav-search -->
			</div>
			<div class="page-content">
				<!-- /.ace-settings-container -->
				<div class="page-header">
					<h1>
						Portfolio
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							overview &amp; stats
						</small>
					</h1>
				</div><!-- /.page-header -->
				@if(Session::has('message'))	
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
					<i class="ace-icon fa fa-check green"></i>
					<strong class="green">{{ Session::get('message') }}</strong>
					</div>
				@endif
				@if(Session::has('error'))	
					<div class="alert alert-block alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>
					<i class="ace-icon fa fa-times red"></i>
					<strong class="red">{{ Session::get('error') }}</strong>
					</div>
				@endif
					<!-- /.row -->
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-8">
						<div class="col-md-3">
							<a href="{{ url('admin/portfolio/export/csv') }}"><button class="btn btn-success">Download CSV</button></a>
						</div>
						<div class="col-md-9">
							<form action="{{ url('admin/portfolio/import') }}"  method="post" enctype="multipart/form-data" >
								{{ csrf_field() }}
								<input type="file" name="file" style="display: inline-block;" />
	                			<button class="btn btn-primary">Import File</button>
	                		</form>
	                	</div>
                	</div>
					<div class="col-md-4 text-right"><a href="{{url('admin/portfolio/add')}}" class="btn btn-lg btn-success">Add Portfolio</a></div>
				</div>
				<div class="row">
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<!-- <th class="center">
									<label class="pos-rel">
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
								</th> -->
								<th>Image</th>
								<th>Title</th>
								<th>Content</th>
								<th>Technology</th>
								<th>Site Link</th>
								<th>Display index</th>
								<th>Project Opened?</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach($portfolios as $portfolio)
							<tr>
								<!-- <td class="center">
									<label class="pos-rel">
										<input type="checkbox" class="ace" />
										<span class="lbl"></span>
									</label>
								</td> -->
								<td>
									<img src="{{ ($portfolio->image and file_exists('template/frontend/images/'.$portfolio->image)) ? URL::asset('template/frontend/images/'.$portfolio->image) : asset('template/frontend/images/no-image-icon-15.png') }}" alt="" height="100px" width="100px">
								</td>
								<td>{{$portfolio->title}}</td>
								<td>{{$portfolio->content}}</td>
								<td>{{$portfolio->technology_name}}</td>
								<td><a href="{{$portfolio->site_link}}" target="_blank">{{$portfolio->site_link}}</a></td>
								<td>{{$portfolio->display_index}}</td>
								<td class="text-center"><i {!! $portfolio->status=='1' ? 'class="fa fa-check" style="color: green;"' : 'class="fa fa-times" style="color: red";' !!}></i></td>
								<td>
									<div class="hidden-sm hidden-xs action-buttons">
										<a class="green" href="{{url('admin/portfolio/edit/'.$portfolio->portfolioid)}}">
											<i class="ace-icon fa fa-pencil bigger-130"></i>
										</a>
										<a class="red" href="{{url('admin/portfolio/destroy/'.$portfolio->portfolioid)}}" onclick="return confirm('Do you want to delete this record?');">
											<i class="ace-icon fa fa-trash-o bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table> 
				</div>
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
@include('admin.includes.footer')