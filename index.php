<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>


<!-- Button trigger modal -->

<!--Add New Contact-->
<!-- Modal -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <form action="addcontact.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth</label>
                    <input type="text" name="dob" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> 
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!--#########################-->
<!-- Edit contact-->

<!-- Modal -->
<div class="modal fade" id="editcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <form action="update.php" method="POST">
            <div class="modal-body">

                <input type="hidden" name="update_id" id="update_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" id="name" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth</label>
                    <input type="text" name="dob" id="dob" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> 
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!--#############################-->


<!--#########################-->
<!-- Remove contact-->

<!-- Modal -->
<div class="modal fade" id="removecontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <form action="remove.php" method="POST">
            <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">
                <h4>Are you sure you want the delete this contact??</h4>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="submit" name="remove" class="btn btn-success">Yes</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!--#############################-->



    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2>Phone Book</h2>
            </div>
            <div class="card">
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcontact">Add Contact</button>
                </div>
            </div>
            <div class="card">
                <div class="cardbody">
                
                    <?php  
                        $con = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($con,'telephone');
                        $show_query = "SELECT * FROM contact ORDER BY name ASC";
                        $result = mysqli_query($con,$show_query);
                        
                    ?>
                        <table id="table" class="table table-dark">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Name</th>
                                    <th scope="col">Date Of Birth</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                   

                        <tbody>
                            <?php
                                if($result)
                                    {
                                        foreach($result as $row){
                            ?>

                            <tr>
                                
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn">Update </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger rmbtn">Remove </button>
                                </td>
                            </tr>
                           <?php            
                                }
                                }
                                    else{
                                        echo "No Record Found";
                                        }
                            ?>  
                        </tbody>
                   
                    </table>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script>
$(document).ready(function() {
    $('#table').DataTable({
        "pagingType":"full_numbers",
        "lengthMenu":[
            [10,25,50,-1],
            [10,25,50,"All"]
        ],
        responsive:true,
        language:{
            search:"_INPUT_",
            searchPlaceholder:"Search Contacts",
        }
    });
} );
</script>







<script>
$(document).ready(function () {
    $('.rmbtn').on('click',function() {
        $('#removecontact').modal('show');

                $tr = $(this).closest('tr');

               var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
                
    });
});

</script>




<script>
$(document).ready(function () {
    $('.editbtn').on('click',function() {
        $('#editcontact').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#update_id').val(data[0]);
                $('#name').val(data[1]);
                $('#dob').val(data[2]);
                $('#phone').val(data[3]);
                $('#email').val(data[4]);  
    });
});

</script>



</body>
</html>