<?php

require_once 'includes/db.php';

if (isset($_POST['submit-product'])) {
    $product_name = $_POST['product-name'];
    $product_category = $_POST['product-category'];
    $product_quantity = $_POST['product-quantity'];
    $product_price = $_POST['product-price'];

    $sql = "INSERT INTO products (name, category, quantity, price) VALUES ('$product_name', '$product_category', '$product_quantity', '$product_price')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Product added successfully!")</script>';
    } else {
        echo '<script>alert("Failed to add product!")</script>';
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inventory Management</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->



</div>

<div class="row">
    <div class="col-md-12 ml-2 mr-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                <button class="btn btn-primary btn-sm" id="add-product" data-target="#add-productModal" data-toggle="modal">Add Product</button>
            </div>
            <div class="card-body">
                <table class="table" id="product-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM products";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['category'].'</td>';
                                echo '<td>'.$row['quantity'].'</td>';
                                echo '<td>'.$row['price'].'</td>';
                                echo '<td>';
                                echo '<button class="btn btn-primary btn-sm" id="edit-product" data-target="#edit-productModal" data-toggle="modal">Edit</button>';
                                echo '<button class="btn btn-danger btn-sm" id="delete-product" data-target="#delete-productModal" data-toggle="modal">Delete</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Submit product</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add new form -->
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product-name" id="product-name" placeholder="Add product name here" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-category" class="form-label">Category</label>
                        <select class="form-control" id="product-category" name="product-category">
                            <option value="drinks">Drinks</option>
                            <option value="dairy">Dairy</option>
                            <option value="meat">Meat</option>
                            <option value="fav">Fruits and Vegetables</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product-quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="product-quantity" id="product-quantity" placeholder="Add quantity here" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="product-price" id="product-price" placeholder="Add price here" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="submit-product" name="submit-product" type="submit">Submit product</button>
                </form>
            </div>
        </div>
    </div>

</div>