<form class="form-inline" id="c_form-h" action="add_session_db.php" method="post" >
  <div class="modal fade bd-example-modal-sm" id="addsessionModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Session</h5>
          <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">

          <div class="container text-center ">
            <div class="row">

              <table border="0">
               <tbody>

                <tr>
                  <td>Session</td>
                  <td style="width: 150px">
                    <input type="text" name="session_name" class="form-control" autocomplete="off"  required="Session Name" placeholder="Session Name"   onkeyup="validate();" minlength="3" maxlength="25">
                  </td>

                </tr>


              </tbody>
              <tfoot>
               <tr> 
                 <td></td>
                 <td></td>
                 <td> 
                   &nbsp; 
                 </td>
                 <td> 
                  &nbsp; 
                </td>
              </tr>

            </tfoot>

          </table>

        </div>

      </div>
    </div>

    <div class="modal-footer"> 
      <button type="submit" class="btn btn-primary">OK</button> 
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>
</div>
</div>
</form>


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

