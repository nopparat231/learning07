            <?php 
            $ss = '';
            if (isset($_SESSION["Userlevel"])) {
             $ss = $_SESSION["Userlevel"];
           } ?>

           <div class="col-md-3" >
             <ul class="list-group" >
              <a href="index1.php" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action" > Home <i class="fa fa-home text-muted fa-lg"></i></a>
              <?php if($ss == "M"){ ?>

               <a href="index1.php?learning" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Lesson <i class="fa fa-list text-muted fa-lg"></i></a>

               <a class="dropdown-toggle border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action" href="#" data-toggle="dropdown"> DATA </a>


               <ul class="dropdown-menu">
                <li>
                 <a href="editprofile.php?user_id=<?php echo $_SESSION["UserID"]; ?>" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Edit User </a>
               </li>
               <li>
                 <a href="edit_password.php?user_id=<?php echo $_SESSION["UserID"]; ?>" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Edit Password </a>
               </li>


             </ul>

             <a href="score.php?user_id=<?php echo $_SESSION["UserID"]; ?>" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Score  <i class="fa fa-check text-muted fa-lg"></i></a>

             <a href="score_all.php" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Score All <i class="fa fa-list-ol text-muted fa-lg"></i></a>


             <a href="logout.php" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> LogOut <i class="fa fa-sign-out text-muted fa-lg"></i></a>

           <?php }elseif($ss == "A"){ ?>

             <a href="admin/index.php?su" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Admin <i class="fa fa-users text-muted fa-lg"></i></a>

             <a href="admin/index.php?sc" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action">Edit Lesson <i class="fa fa-pencil-square-o text-muted fa-lg"></i></a>

             <a href="index1.php?learning" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Lesson <i class="fa fa-list text-muted fa-lg"></i></a>

             <a href="admin/index.php?anw" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action">Edit User </a>

             <a class="dropdown-toggle border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action" href="#" data-toggle="dropdown"> DATA </a>
             <ul class="dropdown-menu">

              <li>
                <a href="editprofile.php?user_id=<?php echo $_SESSION["UserID"]; ?>" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Edit User </a>
              </li>
              <li>
                <a href="edit_password.php?user_id=<?php echo $_SESSION["UserID"]; ?>" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Edit Password </a>
              </li>


            </ul>

            <a href="score.php?user_id=<?php echo $_SESSION["UserID"]; ?>" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Score  <i class="fa fa-check text-muted fa-lg"></i></a>

            <a href="admin/index.php?in" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> Score All <i class="fa fa-list-ol text-muted fa-lg"></i></a>


            <a href="admin/index.php?send" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> SentMail <i class="fa fa-envelope text-muted fa-lg"></i></a>



            <a href="logout.php" class="border-0 list-group-item d-flex justify-content-between align-items-center list-group-item-action"> LogOut <i class="fa fa-sign-out text-muted fa-lg"></i></a>
          <?php } ?>

        </ul>
      </div>

    </li>