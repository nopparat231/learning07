

<?php 

if (isset($_GET['id'])) {
//include '../conn.php';

  $id = $_GET['id'];
  $choice_id = $_GET['choice_id'];

  $query_editc = "SELECT * FROM testing where id = $id";
  $editc = mysqli_query($con,$query_editc) or die(mysqli_error());
  $row_editc = mysqli_fetch_assoc($editc);
  $totalRows_editc = mysqli_num_rows($editc);

  $query_cc = "SELECT * FROM choice WHERE choice_status <> 1 AND choice_id =" .$choice_id;
  $cc = mysqli_query($con,$query_cc) or die(mysqli_error());
  $row_cc = mysqli_fetch_assoc($cc);
  $totalRows_cc = mysqli_num_rows($cc);


  ?>



<?php } ?>

<body>
<script src="./tinymce/tinymce.min.js"></script>

      <div class="modal fade bd-example-modal-lg" id="edcModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Lesson</h5>
          <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">

          <form action="edit_choice_sub_db.php" method="post">

            <div class="form-group row"> 
              <label for="inputmailh" class="col-1 col-form-label">Group</label>
              <div class="col-11">
               <div class="form-group">

                <select class="form-control" id="exampleFormControlSelect1" name="choice_id" required="required">


                  <?php do { ?>
                    <?php if ($row_cc['choice_id'] == $row_editc['choice_id']) { ?>
                      <option selected="selected" value="<?php echo $row_cc['choice_id']; ?>">
                        <?php echo $row_cc['choice_name']; ?></option>
                      <?php }else{ ?>
                       <option  value="<?php echo $row_cc['choice_id']; ?>">
                        <?php echo $row_cc['choice_name']; ?></option>
                      <?php } ?>

                    <?php } while ($row_cc = mysqli_fetch_assoc($cc)); ?>


                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>" />





            <div class="form-group row"> 
              <label for="inputmailh" class="col-1 col-form-label">Question</label>
              <div class="col-11">

               <!--  <input type="text" class="form-control" id="question" name="question" required="required" placeholder="Question" value="<?php //echo $row_editc['question'] ?>">
 -->
  <textarea class="form-control" id="question" name="question" placeholder="Question" >
    <?php echo $row_editc['question'] ?>
  </textarea>

                 </div>
              </div>

              <div class="form-group row"> 
                <label for="inputmailh" class="col-1 col-form-label">1 ).</label>
                <div class="col-5">
                  <input type="text" class="form-control" id="c1" name="c1"  required="required" placeholder="Question 1" value="<?php echo $row_editc['c1'] ?>"> </div>

                  <label for="inputmailh" class="col-1 col-form-label">2 ).</label>
                  <div class="col-5">
                    <input type="text" class="form-control" id="c2" name="c2"  required="required" placeholder="Question 2"  value="<?php echo $row_editc['c2'] ?>"> </div>

                  </div>

                  <div class="form-group row"> 

                    <label for="inputmailh" class="col-1 col-form-label">3 ).</label>
                    <div class="col-5">
                      <input type="text" class="form-control" id="c3" name="c3"  required="required" placeholder="Question 3" value="<?php echo $row_editc['c3'] ?>"> </div>

                      <label for="inputmailh" class="col-1 col-form-label">4 ).</label>
                      <div class="col-5">
                        <input type="text" class="form-control" id="c4" name="c4"  required="required" placeholder="Question 4" value="<?php echo $row_editc['c4'] ?>"> </div>

                      </div>


                      <div class="form-group row"> 
                        <label for="inputmailh" class="col-1 col-form-label">Answer</label>
                        <div class="col-5">
                          <input type="number" class="form-control" id="input-num" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "1" minlength="1" onkeyup="num();" name="answer"  required="required" placeholder="Answer Ex. 1 , 2 , 3 , 4" value="<?php echo $row_editc['answer'] ?>"  /> </div>
                        </div>



                      </div>


                      <div class="modal-footer"> 
                        <button type="submit" class="btn btn-outline-success">Confirm</button> 
                        <a href="#" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close" >Cancel</a>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </body>


            <script type="text/javascript">
              function num() {
                var element = document.getElementById('input-num');
                element.value = element.value.replace(/[^1-4]+/, '');
              };

tinymce.init({
    selector: "textarea",theme: "modern",width: 680,height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"./filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
   ,relative_urls:false,
   remove_script_host:false,
   document_base_url:"http://localhost/tiny"
 });

              
            </script>
