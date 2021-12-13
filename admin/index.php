

<?php include_once(__DIR__ . '/layouts/header/header.php') ?>
<?php include_once(__DIR__ . '/layouts/navtop/navtop.php') ?>
<?php include_once(__DIR__ . '/layouts/sidebar/sidebar.php') ?>
<?php

    $sql = "SELECT count(*) as totalPost FROM posts ";
    $result = $conn->query($sql);
    $totalPost = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalPost = $row['totalPost'];
    }

    $sql = "SELECT count(*) as totalUser FROM users ";
    $result = $conn->query($sql);
    $totalUser = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalUser = $row['totalUser'];
    }


    $sql = "SELECT count(*) as totalContact FROM contacts ";
    $result = $conn->query($sql);
    $totalContact = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalContact = $row['totalContact'];
    }


    $sql = "SELECT count as totalView FROM views LIMIT 1";
    $result = $conn->query($sql);
    $totalView = null;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalView = $row['totalView'];
    }


?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">View times</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"></a>
                        <?= $totalView ?>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Users number</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"></a>
                          <?= $totalUser ?>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Posts number</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"></a>
                          <?= $totalPost ?>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Message number</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"></a>
                          <?= $totalContact ?>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once(__DIR__ . '/layouts/footer/footer.php') ?>