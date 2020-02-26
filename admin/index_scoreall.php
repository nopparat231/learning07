
<?php 

$query_learning = "SELECT * FROM choice as c , user as u, user_learning as l where l.choice_id = c.choice_id and l.user_id = u.id order by convert(l.user_learning_af, UNSIGNED INTEGER) DESC" ;
$learning = mysqli_query($con,$query_learning) or die(mysqli_error());
$row_learning = mysqli_fetch_assoc($learning);
$totalRows_learning = mysqli_num_rows($learning);


?>
<div class="col-md-12">
 <div class="py-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Score All</h1>
        <hr>
      </div>
    </div>
  </div>
</div>

<div class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if ($totalRows_learning > 0) {?>
         <div class="table-responsive text-center">
          <table class="table table-hover" id="example" bgcolor="white">
            <thead class="thead-dark">
              <tr class="text-center">
                <th scope="col">No.</th>
                <th scope="col">Studen Code</th>
                <th scope="col">Name</th>
                <th scope="col">Lesson</th>
                <th scope="col">Pre Test</th>
                <th scope="col">Studying Test</th>
                <th scope="col">Post Test</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $i = 1 ;
              do { ?>


                <tr class="text-center">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row_learning['Username']; ?></td>
                  <td><?php echo $row_learning['Firstname']. "  " .$row_learning['Lastname']; ?></td>
                  <td><?php echo $row_learning['choice_name']; ?>
                  <td><?php echo $row_learning['user_learning_bf']; ?></td>
                  <td><?php echo $row_learning['user_learning_wa']; ?></td>
                  <td><?php echo $row_learning['user_learning_af']; ?></td>
                </tr>

                <?php 
                $i += 1;
              } while ($row_learning = mysqli_fetch_assoc($learning)); ?>

            </tbody>
          </table>

      </div>
    <?php }else {
      echo "<h3> No Score </h3>";
    }

    mysqli_free_result($learning);?>


  </div>
</div>
</div>
</div>

</div>