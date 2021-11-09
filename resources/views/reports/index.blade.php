@extends('reports.layout')
@section('content')
<div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Laravel 7 CRUD using Bootstrap Modal</h2>
</div>
<br/>
</div>
</div>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a href="javascript:void(0)" class="btn btn-success mb-2" id="new-report" data-toggle="modal">New report</a>
</div>
</div>
</div>
<br/>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p id="msg">{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Subject</th>
<th>Report</th>
<th width="280px">Action</th>
</tr>

@foreach ($reports as $report)
<tr id="report_id_{{ $report->id }}">
<td>{{ $report->id }}</td>
<td>{{ $report->subject }}</td>
<td>{{ $report->report }}</td>
<td>
<form action="{{ route('reports.destroy',$report->id) }}" method="POST">
<a class="btn btn-info" id="show-report" data-toggle="modal" data-id="{{ $report->id }}" >Show</a>
<a href="javascript:void(0)" class="btn btn-success" id="edit-report" data-toggle="modal" data-id="{{ $report->id }}">Edit </a>
<meta name="csrf-token" content="{{ csrf_token() }}">
<a id="delete-report" data-id="{{ $report->id }}" class="btn btn-danger delete-user">Delete</a></td>
</form>
</td>
</tr>
@endforeach

</table>
{!! $reports->links() !!}
<!-- Add and Edit report modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="reportCrudModal"></h4>
</div>
<div class="modal-body">
<form name="reportForm" action="{{ route('reports.store') }}" method="POST">
<input type="hidden" name="report_id" id="report_id" >
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Subject:</strong>
<input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" onchange="validate()" >
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Report:</strong>
<input type="text" name="report" id="report" class="form-control" placeholder="Report" onchange="validate()">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
<a href="{{ route('reports.index') }}" class="btn btn-danger">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- Show report modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="reportCrudModal-show"></h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-2 col-sm-2 col-md-2"></div>
<div class="col-xs-10 col-sm-10 col-md-10 ">
@if(isset($report->subject))

<table>
<tr><td><strong>Subject:</strong></td><td>{{$report->subject}}</td></tr>
<tr><td><strong>Report:</strong></td><td>{{$report->report}}</td></tr>
<tr><td colspan="2" style="text-align: right "><a href="{{ route('reports.index') }}" class="btn btn-danger">OK</a> </td></tr>
</table>
@endif
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
<script>
error=false

function validate()
{
	if(document.reportForm.name.value !='' && document.reportForm.email.value !='' && document.reportForm.address.value !='')
	    document.reportForm.btnsave.disabled=false
	else
		document.reportForm.btnsave.disabled=true
}
</script>
