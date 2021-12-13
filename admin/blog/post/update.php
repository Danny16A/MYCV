<?php
// Include config file
include_once(__DIR__ . '../../../../config/db.php');

$id = $_GET['id'];

$sql = "SELECT * FROM blog_categories";
$result = $conn->query($sql);

$categories = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    // $thumbnail = $_POST['thumbnail'];
    $thumbnail = "https://lmpixels.com/demo/breezycv/darkfw/1/img/blog/blog_post_2.jpg";
    $category_id = $_POST['category_id'];
    $author_id = $_SESSION['user']['id'];

    
    $sql = "UPDATE mycv.posts
            SET title='$title', description='$description', content='$content', thumbnail='$thumbnail', category_id='$category_id', author_id='$author_id'
            WHERE id=$id;
            ";

    if (mysqli_query($conn, $sql)) {
        
        header('location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM posts WHERE id = $id LIMIT 1";
$result = $conn->query($sql);

$post = null;

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
    $_SESSION['message'] = "post updated";
}

mysqli_close($conn);

?>

<?php include_once(__DIR__ . '../../../layouts/header/header.php') ?>
<?php include_once(__DIR__ . '../../../layouts/navtop/navtop.php') ?>
<?php include_once(__DIR__ . '../../../layouts/sidebar/sidebar.php') ?>


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Blog post create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Blog post create</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                DataTables
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="update.php?id=<?= $post['id'] ?>">
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"  name="title">
                    </div>

                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2">Category</label>
                        <select class="form-control" name=category_id>
                        <?php foreach($categories as $category) : ?>
                          <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach ?>
                        </select>
                    </div>
        
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea class="form-control" id="formGroupExampleInput2"  name="description" ></textarea>
                    </div>
              
                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2">Content</label>
                        <textarea id='editor' name="content"></textarea>
                    </div>
              

                    <div class="form-group mb-2">
                        <label for="formGroupExampleInput2">Image</label>
                        <input type="file" name="thumbnail">
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="/admin/assets/libs/ckeditor/ckeditor.js" ></script>
<script type="text/javascript">
     CKEDITOR.replace( 'editor', {
        height: 300,
        filebrowserUploadUrl: "/ckeditor_fileupload/ajaxfile.php?type=file",
        filebrowserImageUploadUrl: "/ckeditor_fileupload/ajaxfile.php?type=image",

     } );
</script>
<?php include_once(__DIR__ . '../../../layouts/footer/footer.php') ?>