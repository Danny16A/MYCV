<?php
// Include config file
include_once(__DIR__ . '../../../../config/db.php');

$id = $_GET['id'];


if (isset($_POST['submit'])) {
    $name = $_POST['category-name'];
    $description = $_POST['category-des'];

    $sql = "UPDATE mycv.blog_categories
    SET name='$name', description='$description', updatetime='$time'
    WHERE id=$id;
    ";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Category updated";
        header('location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



$sql = "SELECT * FROM blog_categories WHERE id = $id LIMIT 1";
$result = $conn->query($sql);


$category = null;

if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
}


mysqli_close($conn);

?>

<?php include_once(__DIR__ . '../../../layouts/header/header.php') ?>
<?php include_once(__DIR__ . '../../../layouts/navtop/navtop.php') ?>
<?php include_once(__DIR__ . '../../../layouts/sidebar/sidebar.php') ?>


<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Blog Categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/blog/category/index.php">Blog categories</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    CREATE FORM
                </div>
                
            </div>
            <div class="card-body">
               
                <form method="POST" action="update.php?id=<?= $category['id'] ?>">
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Name</label>
                        <input type="text" value="<?= $category['name'] ?>" class="form-control" name="category-name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea type="text" class="form-control" name="category-des"><?= $category['description'] ?></textarea>
                    </div>
                    <div class="submit-btn">
                        <button  class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
<?php include_once(__DIR__ . '../../../layouts/footer/footer.php') ?>