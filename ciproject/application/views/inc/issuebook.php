<script type="text/javascript">
  $(document).ready(function(){
    $("#department").change(function(){
      var dep = $("#department").val();
      $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>manage/getBookById/"+dep,
        success:function(data){
          $("#bookname").html(data);
        }
      });
    });
  });
</script>

<h2>Issue Book</h2>
			<hr/>
  <?php
      $msg = $this->session->flashdata('msg');
      if (isset($msg)) {
        echo $msg;
      }
  ?>
	<style media="screen">
	.dept { width: 471px;padding: 7px;margin-left: 10px;border: 1px solid #cccccc;border-radius: 4px;}
	</style>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>manage/addIssueForm" method="post">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Reg. No.</label>
                    <input type="text" name="reg" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="dept" class="dept" id="department">
											<option value="">Select Any Department</option>
											<?php
													foreach ($getdept as $dept) {
											?>
                    	<option value="<?php echo $dept->dId ?>"><?php echo $dept->dept ?></option>
											<?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Book Name</label>
                    <select name="bookname" id="bookname" class="dept">

                    </select>
                </div>
                <div class="form-group">
                    <label>Return Date(Hints: 09/08/2017)</label>
                    <input type="text" name="return" class="form-control span12">
                </div>

                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit">
                </div>

            </form>
        </div>
