<h2>View Student Details</h2>
			<hr/>

  <div class="panel-body" style="width:600px;">

          <div class="form-group">
              <label>Student Name</label>
              <input type="text" readonly value="<?php echo $studentdata->name; ?>"  class="form-control span12">
          </div>
          <div class="form-group">
              <label>Department</label>
              <?php
                  $dpid = $studentdata->dept;
                  $deptname = $this->department_model->getDepartment($dpid);
                  if (isset($deptname)) { ?>
                    <input type="text" value="<?php echo $deptname->dept; ?>" readonly class="form-control span12">
              <?php  } ?>

          </div>
          <div class="form-group">
              <label>Roll No.</label>
              <input type="text" value="<?php echo $studentdata->roll; ?>" readonly class="form-control span12">
          </div>
	        <div class="form-group">
              <label>Reg. No.</label>
              <input type="text" value="<?php echo $studentdata->reg; ?>" readonly class="form-control span12">
          </div>
					<div class="form-group">
							<label>Phone. No.</label>
							<input type="text" value="<?php echo $studentdata->phone; ?>" readonly class="form-control span12">
					</div>

  </div>
