<?= $this->extend('layouts/main') ?>


<?= $this->section('content') ?>
<?= $this->include('component/navbar') ?>
<?= $this->include('component/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- print_r($details) -->
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Projects Detail</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
            <div class="row">
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated budget</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= $details['Estimated_Budget'] ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= $details['Amount_Spent'] ?></span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-4">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Estimated project duration</span>
                    <span class="info-box-number text-center text-muted mb-0"><?= $details['Project_Duration'] ?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <h4>Recent Activity</h4>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?= base_url('assets/dist/img/user1-128x128.jpg') ?>" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                    </span>
                    <span class="description">Shared publicly - 7:45 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                  </p>
                </div>

                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<? base_url('assets\dist\img\user7-128x128.jpg') ?>" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                    </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore.
                  </p>
                  <p>
                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                  </p>
                </div>

                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?= base_url('assets/dist/img/user1-128x128.jpg') ?>" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                    </span>
                    <span class="description">Shared publicly - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-paint-brush"></i><?= $details['Project_Name'] ?></h3>
            <p class="text-muted"><?= $details['Description'] ?></p>
            <br>
            <div class="text-muted">
              <p class="text-sm">Client Company
                <b class="d-block"> <?= $details['Client_Company'] ?></b>
              </p>
              <p class="text-sm">Project Leader
                <b class="d-block"><?= $details['Project_Leader'] ?></b>
              </p>
            </div>

            <h5 class="mt-5 text-muted">Project files</h5>
            <ul class="list-unstyled">
              <?php
              $files_access = $details['File_Names'];
              $files_access = explode(",", $files_access);
              $count = count($files_access) - 1;
              $i = 0; ?>
              <?php for ($i = 0; $i < $count; $i++): ?>
                <?php if ($files_access): ?>
                  <li>
                    <a href="http://localhost/code-ign/public/assets/uploads/<?= $files_access[$i]; ?>" class="btn-link text-secondary" target="_blank"><i class="far fa-fw fa-file-word"></i><?= $files_access[$i] ?></a>
                  </li>
                <?php endif; ?>
              <?php endfor; ?>
            </ul>
            <div class="text-center mt-5 mb-3">
              <a href="#" class="btn btn-sm btn-primary">Add files</a>
              <a href="#" class="btn btn-sm btn-warning">Report contact</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<?= $this->endSection() ?>