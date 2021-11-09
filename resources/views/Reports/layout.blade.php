<!DOCTYPE html>

<html>
<head>
<title>GO-BLOG DEVELOPER | LAPORAN KERJA</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
@yield('content')
</div>
</body>
<script>
$(document).ready(function () {

/* When click New customer button */
$('#new-report').click(function () {
$('#btn-save').val("create-report");
$('#report').trigger("reset");
$('#reportCrudModal').html("Add New Report");
$('#crud-modal').modal('show');
});

/* Edit customer */
$('body').on('click', '#edit-report', function () {
var report_id = $(this).data('id');
$.get('reports/'+report_id+'/edit', function (data) {
$('#reportCrudModal').html("Edit report");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#report_id').val(data.id);
$('#subject').val(data.subject);
$('#report').val(data.report);
})
});
/* Show customer */
$('body').on('click', '#show-report', function () {
$('#reportCrudModal-show').html("Report Details");
$('#crud-modal-show').modal('show');
});

/* Delete customer */
$('body').on('click', '#delete-report', function () {
var report_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "https://e-presensi.wellsa.id/home/"+report_id,
data: {
"id": report_id,
"_token": token,
},
success: function (data) {
$('#msg').html('Report entry deleted successfully');
$("#report_id_" + report_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
});
});

</script>
</html>
