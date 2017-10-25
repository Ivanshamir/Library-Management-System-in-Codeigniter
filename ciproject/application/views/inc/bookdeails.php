<h2>View Book Details</h2>
			<hr/>

  <div class="panel-body" style="width:600px;">

          <div class="form-group">
              <label>Book Name</label>
              <input type="text" readonly value="<?php echo $bookdtls->bookname; ?>"  class="form-control span12">
          </div>
          <div class="form-group">
              <label>Department</label>
              <?php
                  $dpid = $bookdtls->dept;
                  $deptname = $this->department_model->getDepartment($dpid);
                  if (isset($deptname)) { ?>
                    <input type="text" value="<?php echo $deptname->dept; ?>" readonly class="form-control span12">
              <?php  } ?>

          </div>
          <div class="form-group">
              <label>Author</label>
              <?php
                  $athrid = $bookdtls->author;
                  $athrname = $this->manage_model->getAuthor($athrid);
                  if (isset($athrname)) { ?>
                    <input type="text" value="<?php echo $athrname->author; ?>" readonly class="form-control span12">
              <?php  } ?>

          </div>
          <div class="form-group">
              <label>Total Books </label>
              <input type="text" value="<?php echo $bookdtls->stock; ?>" readonly class="form-control span12">
          </div>

  </div>
