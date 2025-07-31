<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>



            <div class="col-md-12">


                <?php

                include "config.php";

                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql) or die("Query Failed");


                if (mysqli_num_rows($result) > 0) {






                ?>


                    <table class="content-table">
                        <thead>
                            <th>S.No.</th>
                            <th>Category Name</th>
                            <th>No. of Posts</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>



                        <tbody>

                            <?php



                            $index = 1;

                            while ($row = mysqli_fetch_assoc($result)) {


                            ?>

                                <tr>
                                    <td class='id'><?php echo $index; ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['post'] ?></td>
                                    <td class='edit'><a href='update-category.php?id=<?php echo $row["category_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-category.php?id=<?php echo $row["category_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>

                            <?php

                                $index++;
                            }
                            ?>

                        </tbody>
                    </table>

                <?php } else {
                }

                ?>



            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>