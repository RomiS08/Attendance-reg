<head>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<?php 

// Correctly call the Swal.fire() function
echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href=\"#\">Why do I have this issue?</a>'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'viewrecords.php'; //  redirect to the viewrecords.php page when Clicked okay after the error message 
        }
    });
</script>";



include 'includes/footer.php';

?>