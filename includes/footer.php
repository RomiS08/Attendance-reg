<style>
#footer-copyright {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}

#main-content {
    flex-grow: 1;
}
</style>

<body class="footer-body">



    <!------------  Below DIV Section Displayed Copyright Phrase for website and it's a part of footer ------->

    <div id="footer-copyright" class="text-center py-3 bg-dark text-white">
        <?php 
    echo "<h5 class='fw-bold'>All rights Reserved Copyright &copy; 2021-" . date('Y') . " | Developed By Sathsara Karunarathne</h5>"; 
    ?>
    </div>



    <!------------- End of Copyright Phrase Footer DIV Section --------------->


    </div> <!-- End of DIV Section of DIV Class "Container (Opened in header section)" -->


    <!-------- Bootstrap JS Link ---------->
    <!-------- jQuery First , then Popper.js then Bootstrap JS ---------->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- SweetAlert Notification Library -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- SweetAlert2  Notification Library -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
    $(function() {
        $("#dob").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            dateFormat: "yy-mm-dd"
        });
    });
    </script>

</body>

</html>