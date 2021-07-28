<?php $validator = \Config\Services::validation();   ?>
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include("component/navbar") ?>
<?= $this->include("component/sidebar") ?>

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
    <form method="post" action="">
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
                <input type="text" id="inputName" name="inputName" class="form-control" value="<?= $previous_data['Project_Name'] ?>">
                <?php if($validator->hasError('inputName')): ?>
                  <?=  $validator->showError('inputName','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="inputDescription" name="inputDescription" class="form-control" rows="4"><?= $previous_data['Description'] ?></textarea>
                <?php if($validator->hasError('inputDescription')): ?>
                  <?=  $validator->showError('inputDescription','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" name="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option <?php if ($previous_data['Status'] == "On Hold") {
                            echo "SELECTED";
                          } ?>>On Hold</option>
                  <option <?php if ($previous_data['Status'] == "Canceled") {
                            echo "SELECTED";
                          } ?>>Canceled</option>
                  <option <?php if ($previous_data['Status'] == "Success") {
                            echo "SELECTED";
                          } ?>>Success</option>
                </select>
                <?php if($validator->hasError('inputStatus')): ?>
                  <?=  $validator->showError('inputStatus','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Client Company</label>
                <input type="text" id="inputClientCompany" name="inputClientCompany" class="form-control" value="<?= $previous_data['Client_Company'] ?>">
                <?php if($validator->hasError('inputClientCompany')): ?>
                  <?=  $validator->showError('inputClientCompany','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" id="inputProjectLeader" name="inputProjectLeader" class="form-control" value="<?= $previous_data['Project_Leader'] ?>">
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
                <input type="number" id="inputEstimatedBudget" name="inputEstimatedBudget" class="form-control" value="<?= $previous_data['Estimated_Budget'] ?>">
                <?php if($validator->hasError('inputEstimatedBudget')): ?>
                  <?=  $validator->showError('inputEstimatedBudget','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" name="inputSpentBudget" class="form-control" value="<?= $previous_data['Amount_Spent'] ?>">
                <?php if($validator->hasError('inputSpentBudget')): ?>
                  <?=  $validator->showError('inputSpentBudget','my_single')?>
                  <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" name="inputEstimatedDuration" class="form-control" value="<?= $previous_data['Project_Duration'] ?>">
                <?php if($validator->hasError('inputEstimatedDuration')): ?>
                  <?=  $validator->showError('inputEstimatedDuration','my_single')?>
                  <?php endif; ?>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Files</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="form-group">
                <table class="table">
                  <thead>
                    <tr>
                      <th>File Name</th>
                      <th>File Size</th>
                      <th>
                        <a href="upload/<?= $previous_data['ID'] ?>" class="btn btn-sm btn-primary">Add files</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $files_access = $previous_data['File_Names'];
                    $files_sizes = $previous_data["File_Sizes"];
                    $files_access = explode(",", $files_access);
                    $files_sizes = explode(",", $files_sizes);
                    $count = count($files_access) - 1;
                    $i = 0; ?>
                    <?php for ($i = 0; $i < $count; $i++) :?>
                     <?php if ($files_access[$i] && $files_sizes[$i]) : ?>
                        <tr>
                          <td><?= $files_access[$i]; ?></td>
                          <td><?= $files_sizes[$i]; ?></td>
                          <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                              <a href="http://localhost/code-ign/public/assets/uploads/<?= $files_access[$i]; ?>" class="btn btn-info" target="_blank"><i class="fas fa-eye"></i></a>
                              <a href="delete/<?= $previous_data['ID'] ?>/<?=$filename=$files_access[$i] ?>/<?= $files_sizes[$i] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                    <?php endif; ?>
                    <?php endfor; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Update Details" class="btn btn-success float-right">
          </div>
        </div>
    </form>
  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?= $this->endSection() ?>