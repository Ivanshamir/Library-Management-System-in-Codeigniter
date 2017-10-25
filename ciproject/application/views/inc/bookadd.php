<h2>Add Book</h2>
			<hr/>
  <?php
      $msg = $this->session->flashdata('msg');
      if (isset($msg)) {
        echo $msg;
      }
  ?>
	<style media="screen">
	.dept { border: 1px solid #cccccc;border-radius: 4px;margin-left: 18px;padding: 7px;width: 458px;}
	</style>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url(); ?>book/addBookForm" method="post">
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="dept" class="dept">
											<option value="">Select Any Department</option>
											<?php
													foreach ($getdept as $dept) {
											?>
                    	<option value="<?php echo $dept->dId ?>"><?php echo $dept->dept ?></option>
											<?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Author Name</label>
                    <select name="author" class="dept">
											<option value="">Select Any Author</option>
											<?php
													foreach ($getauthr as $athr) {
											?>
                    	<option value="<?php echo $athr->aId ?>"><?php echo $athr->author ?></option>
											<?php } ?>
                    </select>
                </div>
								<div class="form-group">
										<label>Book Stock</label>
										<input type="text" name="stock" class="form-control span12">
								</div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit">
                </div>

            </form>
        </div>
