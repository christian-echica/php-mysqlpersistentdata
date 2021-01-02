<!DOCTYPE html>
<html>
  <head>
    <title>MySQL container with Persistent Data</title>
    <style>
        body{
          background-color: none;
        }
        table,th,td{
          border: 2px solid black;
          width: 1100px;
        }
        .btn {
          width: 10%;
          height: 5%;
          font-size: 22px;
          padding: 0px;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid">
          <h1>Demo for Mysql with Persistent Data</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h2>Conainer Information</h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Env Var</th>
                <th>Value</th>
              <tr>
            </thead>
            <tbody>
              <tr>
                <td>Container IP</td>
                <td><?php echo $_SERVER['SERVER_ADDR'] ?></td>
              </tr>
              <tr>
                <td>Container Port</td>
                <td><?php echo $_SERVER['SERVER_PORT'] ?></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
        </div><!-- /col -->
      </div><!-- /row -->
    </div><!-- /container -->

        <div class="col-md-6 col-md-offset-3">
          <center>
          <h1>Click the button to display data:</h1>
          <form action="" method="post">
            <input type="submit" name="search" value="Display Data">
          </form>
            <table>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
              </tr><br>

              <tr>
              <?php
               $connection = mysqli_connect("mysql-server:3306","root","mypassword");
               $db = mysqli_select_db($connection,'usersdb');
               $query = "SELECT * FROM tblusers";
               $query_run = mysqli_query($connection,$query);
               while($row = mysqli_fetch_array($query_run))
                 {
                   ?>
                     <tr>
                         <td> <?php echo $row['fname']; ?></td>
                         <td> <?php echo $row['lname']; ?></td>
                         <td> <?php echo $row['useremail']; ?></td>
                         <td> <?php echo $row['address']; ?></td>
                         <td> <?php echo $row['phone']; ?></td>
                     </tr>
                     <?php
                  } //to close the while loop
              ?>
             </tr><br>
            </table>
        </center>
      </div>

    <script>
      // Initialize Datatables
      $(document).ready( function() {
        $('.datatable').dataTable();
      });
    </script>
  </body>
</html>
