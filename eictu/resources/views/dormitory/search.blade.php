@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/bootstrap.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/font-awesome.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/main.css')!!}">

@endsection
@section('content')
<div id="updateStudent">
	<div class="container">
		<div class="top">
			<div class="inner-top">
				<p class="caption">eICTuStudentDormitorySearch - Tra cứu chỗ ở trong KTX</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<a href="{!! url('dormitory/update') !!}"><h3 class="redirect"><i class="fa fa-link"></i> Sinh viên cập nhật nơi ở trong KTX</h3></a>
			</div>
		</div>
		<div class="contentUpdate">
			<h3>Tìm kiếm thông tin nơi ở sinh viên trong KTX bằng mã sinh viên</h3>
			<div class="box">
				<form action="{!! url('dormitory/query')!!}" method="get" id="fSearch" class="form-horizontal" accept-charset="utf-8">
					<div class="form-group">
						<label class="col-sm-3 control-label"><i class="fa fa-circle-o"></i> Mã số sinh viên:</label>
						<div class="col-sm-4">
							<input type="text" name="student_id" value="" class="form-control" placeholder="DTC...">
						</div>
						<div class="col-sm-2">
							<button type="sumit" class="btn btn">Tìm kiếm</button>
						</div>
					</div>
				</form>

				<div id="result">
					<h3>Kết quả tìm kiếm:</h3>
					@if(isset($dormitory))
					<div class="list">
						<h3><i class="fa fa-caret-right"></i> <span class="date_on">{!! $dormitory->srart_on!!}</span> </h3>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{!! url('public/dormitory/js/jquery-1.12.4.min.js')!!}"></script>
	<script type="text/javascript" src="{!! url('public/dormitory/js/bootstrap.min.js')!!}"></script>
</div>
@endsection