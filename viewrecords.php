<?php 
    $title = 'View Records';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php'; // for authentication check and this always should be on the top of the page after the header cause header has session_start 
    require_once 'db/conn.php';
    $results = $crud->getAttendees();

?>
<div id="main-content" style="flex-grow: 1;">
<table class ="table table-bordered ">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>First Name </th>
            <th>Last Name </th>
            <th>Speciality </th>
            <th>Actions </th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($r =$results->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td> <?php echo $r['attendee_id']?> </td>
                <td> <?php echo $r['firstname']?> </td>
                <td> <?php echo $r['lastname']?> </td>
                <td> <?php echo $r['name']?> </td>
                <td> 
                    <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary"> <i class="fa-solid fa-eye"></i> View </a>
                    <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-success"> <i class="fa-solid fa-pen-to-square"></i> Update </a>
                    <button onclick="deleteRecord(<?php echo $r['attendee_id']?>)" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> Delete </button>
                </td>
            </tr>
        <?php 
            }             
        ?>
    </tbody>
</table>

<br> 
<hr/> 
<br>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function deleteRecord(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to delete.php
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: {id: id},
                success: function() {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your record has been deleted.",
                        icon: "success"
                    }).then(function() {
                        location.reload();
                    });
                }
            });
        }
    });
}
</script>
</div>
<?php 
    require_once 'includes/footer.php';
?>
