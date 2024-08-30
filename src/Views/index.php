<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Simple Form Submission</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="mt-4 mb-4">Simple Form Submission</h1>

                <form method="POST" id="submitForm" action="/orders">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label> <span class="text-danger">*</span>
                                <input type="text" name="amount" min="0" step="1" class="form-control" placeholder="Enter Amount">
                            </div>
                            <div class="form-group">
                                <label>Buyer</label> <span class="text-danger">*</span>
                                <input type="text" name="buyer" class="form-control" placeholder="Enter Buyer Name">
                            </div>
                            <div class="form-group">
                                <label>Buyer Email</label> <span class="text-danger">*</span>
                                <input type="text" name="buyer_email" class="form-control" placeholder="Enter Buyer Email">
                            </div>
                            <div class="form-group">
                                <label>Receipt Id</label> <span class="text-danger">*</span>
                                <input type="text" name="receipt_id" class="form-control" placeholder="Enter Receipt Id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label> <span class="text-danger">*</span>
                                <input type="text" name="city" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="form-group">
                                <label>Phone</label> <span class="text-danger">*</span>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label>Entry By</label> <span class="text-danger">*</span>
                                <input type="number" name="entry_by" class="form-control" placeholder="Enter Entry By">
                            </div>
                            <div class="form-group">
                                <label>Items</label> <span class="text-danger">*</span>
                                <input type="text" name="items" class="form-control" placeholder="Enter Items">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Note</label> <span class="text-danger">*</span>
                        <textarea name="note" class="form-control"></textarea>
                    </div>

                    <button type="submit" id="submitButton" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>


    </div>

    <!-- Optional JavaScript -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="/js/store.js"></script>
    <script src="/js/alertMessages.js"></script> -->
</body>

</html>