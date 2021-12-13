<?php include_once(__DIR__ . '../../../layouts/header/header.php') ?>
<?php include_once(__DIR__ . '../../../layouts/navtop/navtop.php') ?>
<?php include_once(__DIR__ . '../../../layouts/sidebar/sidebar.php') ?>

<?php

    // get posts

        $sql = "SELECT p.*, u.username, c.name FROM posts p 
            LEFT JOIN users u ON u.id = p.author_id 
            LEFT JOIN blog_categories c ON c.id = p.category_id 
            ORDER BY p.create_time DESC ";
    $result = $conn->query($sql);

    $posts = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }


?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Blog post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Blog post</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    posts
                </div>
                <?php if($_SESSION['user']['role'] == 'admin'): ?>
                <div><a href="create.php" class="btn btn-sm btn-success">+ Create</a></div>
                <?php endif ?>
            </div>
            <div class="card-body">
            <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif ?>
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-top">
                        <div class="dataTable-dropdown"><label><select class="dataTable-selector">
                                    <option value="5">5</option>
                                    <option value="10" selected="">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select> entries per page</label></div>
                        <div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div>
                    </div>
                    <div class="dataTable-container">
                        <table id="datatablesSimple" class="dataTable-table">
                            <thead>
                                <tr>
                                <th data-sortable="" style="width: 50px"><a href="#" class="dataTable-sorter">#</a></th>
                                    <th data-sortable="" ><a href="#" class="dataTable-sorter">Post Title</a></th>
                                    <th data-sortable="" ><a href="#" class="dataTable-sorter">Author</a></th>
                                    <th data-sortable="" ><a href="#" class="dataTable-sorter">Category</a></th>
                                    <th data-sortable="" ><a href="#" class="dataTable-sorter">Create time</a></th>
                                    <?php if($_SESSION['user']['role'] == 'admin'): ?>
                                    <th colspan="2"  data-sortable="" style="width: 15.6015%;"><a href="#" class="dataTable-sorter text-center">Action</a></th>
                                    <?php endif ?>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $index = 0; ?>
                                <?php foreach($posts as $post) :?>
                                <?php $index ++; ?>
                                <tr>
                                    <td><?= $index ?></td>
                                    <td><?= strlen( $post['title'] ) > 15 ? substr($post['title'],0,10) . '...' : $post['title']  ?></td>
                                    <td><?= strlen( $post['username'] ) > 15 ? substr($post['username'],0,10) . '...' : $post['username']  ?></td>
                                    <td><?= strlen( $post['name'] ) > 15 ? substr($post['name'],0,10) . '...' : $post['name']  ?></td>
                                    <td><?= date("d/m/Y",strtotime($post['create_time'])) ?></td>
                                    <?php if($_SESSION['user']['role'] == 'admin'): ?>
                                    <td class="text-center">
                                        <a href="update.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">Update</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="delete.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                    <?php endif ?>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="dataTable-bottom">
                        <div class="dataTable-info">Showing 1 to 10 of entries</div>
                        <nav class="dataTable-pagination">
                            <ul class="dataTable-pagination-list">
                                <li class="active"><a href="#" data-page="1">1</a></li>
                                <li class=""><a href="#" data-page="2">2</a></li>
                                <li class=""><a href="#" data-page="3">3</a></li>
                                <li class=""><a href="#" data-page="4">4</a></li>
                                <li class=""><a href="#" data-page="5">5</a></li>
                                <li class=""><a href="#" data-page="6">6</a></li>
                                <li class="pager"><a href="#" data-page="2">›</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once(__DIR__ . '../../../layouts/footer/footer.php') ?>