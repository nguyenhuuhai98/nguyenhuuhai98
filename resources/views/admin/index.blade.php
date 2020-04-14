@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">overview</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div>
                <span class="title-1 m-b-25">user statistics</span>
		        <div class="input-group mb-3">
		          	<div class="input-group-prepend">
		            	<label class="input-group-text" for="userYear">Year</label>
		          	</div>
		          	<select class="custom-select" id="userYear">
			            <option value="2019" selected>2019</option>
			            <option value="2018">2018</option>
			            <option value="2017">2017</option>
		          	</select>
		        </div>

            </div>
            <div id="userChart" ></div>
        </div>
        <div class="col-lg-6">
            <div>
                <span class="title-1 m-b-25">Test statistics</span>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="testYear">Year</label>
                    </div>
                    <select class="custom-select" id="testYear">
                        <option value="2019" selected>2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                    </select>
                </div>

            </div>
            <div id="testChart" ></div>
        </div>
    </div>
</div>
@endsection
