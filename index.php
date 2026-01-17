<?php
include "conn.php";

$fullname = "";
$age = "";
$update = false;
$id = 0;

// EDIT
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $query = "SELECT * FROM exams WHERE id=$id";
    $result = mysqli_query($rel, $query);
    $row = mysqli_fetch_assoc($result);

    $fullname = $row['fname'];
    $age = $row['age']; 
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

<div class="container mt-4 p-4 bg-secondary bg-opacity-25">

<!-- FORM -->
<form action="insert.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="row">
    <div class="col-md-5">
        <input type="text" name="fname" class="form-control" placeholder="enter your name"
               value="<?php echo $fullname; ?>">
    </div>

    <div class="col-md-5">
        <input type="number" name="age" class="form-control" placeholder="enter your age"
               value="<?php echo $age; ?>">
    </div>

    <div class="col-md-2">
        <?php if ($update): ?>
            <button type="submit" name="update" class="btn btn-success w-100 bg-secondary">Update</button>
        <?php else: ?>
            <button type="submit" name="submit" class="btn btn-warning w-100 bg-primary text-light">Done</button>
        <?php endif; ?>
    </div>
</div>
</form>
        </div>


<!-- TABLE -->
 <div class="container mt-4 p-4 bg-secondary bg-opacity-25">
<div class="card mt-4">
<div class="card-body">
<table class="table table-bordered text-center">
<thead>
<tr>
<th>ID</th>
<th>Fullname</th>
<th>Age</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM exams";
$result = mysqli_query($rel, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fname']; ?></td>
<td><?php echo $row['age']; ?></td>
<td>
<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
<a href="insert.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>

</div>
</body>
</html>