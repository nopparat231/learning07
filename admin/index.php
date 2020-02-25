<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
  session_start();
}


?>
 <script src="./js/jquery.fileupload-image.js"></script>
 <script src="./tinymce/tinymce.min.js"></script>
<?php include '../check.php'; ?>
<!DOCTYPE html>
<html>
<?php include '../conn.php'; ?>
<?php include 'header.php'; ?>

<link rel=stylesheet href="../st.css">

<div class="py-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

       <?php include 'carousel.php'; ?>
       <?php include 'navbar.php'; ?>

       <?php include 'datatables.php'; ?>

       <body>

        <?php 

        $in = isset($_REQUEST['in']);
        $sh = isset($_REQUEST['showchoice']);
        $shs = isset($_REQUEST['showchoice_s']);
        $sp = isset($_REQUEST['sp']);
        $eus = isset($_REQUEST['eus']);
        $editc = isset($_REQUEST['editc']);
        $su = isset($_REQUEST['su']);
        $anw = isset($_REQUEST['anw']);
        $anws = isset($_REQUEST['anws']);
        $eu = isset($_REQUEST['eu']);
        $ec = isset($_REQUEST['ec']);
        $sc = isset($_REQUEST['sc']);
        $sco = isset($_REQUEST['sco']);
        $send = isset($_REQUEST['send']);
        $sio = isset($_REQUEST['sio']);

        if ($in <> '') {
          include 'index_scoreall.php';
        }elseif ($sh <> '') {
          include 'showchoice.php';
        }elseif ($shs <> '') {
          include 'showchoice_sub.php'; ?>

        <?php  }elseif ($sp <> '') {
          include 'editprofile_show.php';
        }elseif ($editc <> '') {
         include 'show_choice_all.php';
       }elseif ($su <> '') { 
        include 'show_user.php';
      }elseif ($anw <> '') {
        include 'show_user_anw.php';
      }elseif ($anws <> '') {
        include 'show_user_anwshow.php';
      }elseif ($eu <> '') {
        include 'edit_user.php';
      }elseif ($sio <> '') {
        include 'show_session.php';
      }elseif ($ec <> '') {
        include 'edit_choice.php';
        echo "<br><br><br><br><br><br><br><br>";
      }elseif ($sc <> '' or $sco <> '') { ?>


        <?php //include 'edit_choice.php'; ?>
        <?php include 'add_choice.php'; ?>
        <div id="shoeeditchaioce">          
        </div>
        <div class="row" align="center">
          <div class="col-md-12">
            <!-- <button id="editch">test</button> -->
            <div class="py-2">
              <a href="index.php.php" class="myButton" data-toggle='modal' data-target='#addchoiceModal'>+</a>
            </div><br>
            <!-- Card Deck -->
            <div class="card-columns">

              <?php include 'show_choice_card.php'; ?>



            </div> <!-- End card -->


            <br>
            <br>
          </div>
        </div>

        <!-- include 'show_choice_all.php'; -->
      <?php   }elseif ($send <> '') {
        include 'send_mail.php';
      }else{ ?>


        <div class="row">

          <div class="col-md-12" align="center">
            <?php include 'index_scoreall.php'; ?>
            <br>
            <br>
          </div>


        </div>



        <?php
      }

      ?>

    </div>
  </div>
</div>
</div>

<br><br><br>
<?php include 'footer_admin.php'; 

//เช็คแก้ไขคำถาม
$id = '';
if (isset($_GET['id'])){
  $id = $_GET['id'];



}

if ($id <> '') {

 ?>

 <script type="text/javascript">

    //onload show modal script ชุดนี้โหลดมาตรงๆ ไม่มีหน่วงเวลานะ
    $(document).ready(function(){
      $("#edcModal").modal('show');
    });
    

  </script>

<?php } ?>

<?php if (isset($_GET['session_id'])) {
include 'edit_session.php';

?>

 <script type="text/javascript">

    //onload show modal script ชุดนี้โหลดมาตรงๆ ไม่มีหน่วงเวลานะ
    $(document).ready(function(){
      $("#editsessionModal").modal('show');
    });
    

  </script>
<?php } ?>


<?php if ($eus <> ''): ?>

  <?php if (isset($_GET['user_id'])){ 
    include 'editprofile.php';
    ?>

    <script type="text/javascript">

    //onload show modal script ชุดนี้โหลดมาตรงๆ ไม่มีหน่วงเวลานะ
    $(document).ready(function(){
      $("#EditUseModal").modal('show');
    });

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
      document_base_url:"http://localhost/learning07"
    });
    

  </script>

<?php } ?>

<?php endif ?>

</body>

</html>