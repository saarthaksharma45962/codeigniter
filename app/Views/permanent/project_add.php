<?php $validator =  \Config\Services::validation();?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
   <?= $this->include("component/navbar") ?>
   <?= $this->include("component/sidebar") ?>
<div>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="post" action=""   enctype = "multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>             
                <input type="text" id="inputName" name="inputName" class="form-control">
                <?php if($validator->hasError('inputName')): ?>
                  <?=  $validator->showError('inputName','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" name="inputDescription" class="form-control" rows="4"></textarea>
                <?php if($validator->hasError('inputDescription')): ?>
                  <?=  $validator->showError('inputDescription','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" name= "inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
                <?php if($validator->hasError('inputStatus')): ?>
                  <?=  $validator->showError('inputStatus','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" id="inputClientCompany" name = "inputClientCompany" class="form-control">
                <?php if($validator->hasError('inputClientCompany')): ?>
                  <?=  $validator->showError('inputClientCompany','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" id="inputProjectLeader" name = "inputProjectLeader" class="form-control">
                <?php if($validator->hasError('inputProjectLeader')): ?>
                  <?=  $validator->showError('inputProjectLeader','my_single')?>
                  <?php endif; ?>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" name="inputEstimatedBudget" class="form-control">
                <?php if($validator->hasError('inputEstimatedBudget')): ?>
                  <?=  $validator->showError('inputEstimatedBudget','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" name = "inputSpentBudget" class="form-control">
                <?php if($validator->hasError('inputSpentBudget')): ?>
                  <?=  $validator->showError('inputSpentBudget','my_single')?>
                  <?php endif; ?>              
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" name ="inputEstimatedDuration" class="form-control">
                <?php if($validator->hasError('inputEstimatedDuration')): ?>
                  <?=  $validator->showError('inputEstimatedDuration','my_single')?>
                  <?php endif; ?>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!--/.card for file upload-->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Files</h3>

              <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="uploaded_files">UPLOAD </label>
                <input type="file"  name="uploaded_files[]"    class="form-control"  multiple />
              </div>
             
            </div>
        </div>
          
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
    
</div>
<?= $this->endSection() ?>