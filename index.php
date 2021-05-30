<!DOCTYPE html>
<html lang="en">

<head>
    <title>ajax crud</title>
    <link rel="stylesheet" href="css/bootstrap.css">


    <script src="js/bootstrap.js"></script>
    <script src="js/jqcdn.js"></script>

    <script src="js/jq_ajax.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">ajax CRUD (jQuery, php, mysqli) </h1>
        <hr>
        <form id="saveFormId">
            <div class="row mt-3">
                <div class="col">
                    <input type="text" id="nameId" placeholder="enter your name" class="form-control" required>
                </div>
                <div class="col">
                    <input type="text" id="emailId" placeholder="enter your email address" class="form-control" required>
                </div>
                <div class="col">
                    <input type="text" id="phoneId" placeholder="enter your phone number" class="form-control" required>
                </div>
                <div class="col">
                    <button class="btn btn-primary" id="saveBtnId" type="submit">Save</button>
                </div>
            </div>
        </form>
        <hr>

        <div class="border border-primary p-2 mb-5">
            <h4 class="text-center mt-2 border border-primary p-2">All Customers from Database Record</h4>

            <table class="table table-light table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>SL NO</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="tbodyId">
                </tbody>
            </table>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateFormId">
                            <div class="m-1 p-1">
                                <input type="text" id="uid" disabled class="form-control">
                                <input type="text" id="unameId" placeholder="enter your name" class="form-control m-1" required>
                                <input type="text" id="uemailId" placeholder="enter your email address" class="form-control m-1" required>
                                <input type="text" id="uphoneId" placeholder="enter your phone number" class="form-control m-1" required>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="updateSaveId" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>