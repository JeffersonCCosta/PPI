$(document).ready(function () {
    $('#userTable').DataTable();
});

$('#clearTableBtn').click(function () {
// Clear DataTable
    $('#userTable').DataTable().clear().draw();
});
