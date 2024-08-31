<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap4.css">

    <!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css
    https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap4.css -->

    <title>Simple Form Submission</title>
</head>

<body>
    <div class="container mt-5">

        <h3>All Data</h3>
        <hr>
        <a href="/create" class="btn btn-info m-4 text-white">Create</a>
        </br>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Receipt Id</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Items</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($orderData) {
                    foreach ($orderData as $value) {
                ?>      
                    <tr>
                        <td><?php echo $value['buyer']; ?></td>
                        <td><?php echo $value['buyer_email']; ?></td>
                        <td><?php echo $value['amount']; ?></td>
                        <td><?php echo $value['receipt_id']; ?></td>
                        <td><?php echo $value['city']; ?></td>
                        <td><?php echo $value['phone']; ?></td>
                        <td><?php echo $value['items']; ?></td>
                        <td><?php echo $value['entry_at']; ?></td>
                        
                    </tr>

                <?php     
                    }
                }
                ?>


            </tbody>
        </table>
</div>

<!-- Optional JavaScript -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Popper.js and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap4.js"></script>



<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


</body>

</html>