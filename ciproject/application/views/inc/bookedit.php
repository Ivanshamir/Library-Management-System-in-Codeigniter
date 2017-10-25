<h2>Update Book Data</h2>
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
            <form action="<?php echo base_url(); ?>book/updateBookById" method="post">
              <input type="hidden" name="bookId" value="<?php echo $bookbyid->bookId ?>">
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" value="<?php echo $bookbyid->bookname ?>" class="form-control span12">
                </div>
                <div class="form-group">
                    <label>Department</label>
										<select name="dept" class="dept">
											<option value="">Select Any Department</option>
											<?php
													foreach ($getdept as $dept) {
														if ($bookbyid->dept == $dept->dId) { ?>
															<option value="<?php echo $dept->dId ?>" selected="selected">
																<?php echo $dept->dept ?>
															</option>
												<?php }else{ ?>
													<option value="<?php echo $dept->dId ?>" >
														<?php echo $dept->dept ?>
													</option>
											<?php	} ?>
											<?php } ?>
										</select>
                </div>
                <div class="form-group">
                    <label>Author</label>
										<select name="author" class="dept">
											<option value="">Select Any Author</option>
											<?php
													foreach ($getathr as $athr) {
														if ($bookbyid->author == $athr->aId) { ?>
															<option value="<?php echo $athr->aId ?>" selected="selected">
																<?php echo $athr->author ?>
															</option>
												<?php }else{ ?>
													<option value="<?php echo $athr->aId ?>" >
														<?php echo $athr->author ?>
													</option>
											<?php	} ?>
											<?php } ?>
										</select>
                </div>
								<div class="form-group">
										<label>Book Stock</label>
										<input type="text" name="stock" value="<?php echo $bookbyid->stock; ?>" class="form-control span12">
								</div>
                <div class="form-group">
				<input type="submit"class="btn btn-primary" value="Submit">
                </div>

            </form>
        </div>
