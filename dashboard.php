<?php
include "session.php";
include "connection1.php";
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>


    <script src="https://cdn.tailwindcss.com"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <link href="https://fonts.googleapis.com/css2?family=Comforter&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />


    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.tailwindcss.css" />


    <style>
        .comforter-regular {
            font-family: "Comforter", cursive;
            font-weight: 400;
        }


        .dataTables_wrapper {
            background: white;
            padding: 10px;
            border-radius: 8px;
        }
    </style>


    <script>
        function toggleDropdown() {
            document.getElementById("profileDropdown").classList.toggle("hidden");
        }


        // Add Product Modal
        function openModal() {
            const modal = document.getElementById('userModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }


        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }


        // Edit Modal
        function openModalForEdit(id, name, stock, date, status) {
            const modal = document.getElementById("userEditModal");
            modal.classList.remove('hidden');
            modal.classList.add('flex');




            document.getElementById('edit_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_stock').value = stock;
            document.getElementById('edit_date_delivery').value = date;
            document.getElementById('edit_status').value = status;
        }


        // Delete Modal
        function openModalForDelete(id, name) {
            const modal = document.getElementById("deleteModal");
            modal.classList.remove('hidden');
            modal.classList.add('flex');


            document.getElementById('delete_id').value = id;
            document.getElementById('delete_name').value = name;
        }
    </script>


</head>


<body class="bg-gray-100">


    <div class="flex h-screen">


        <!-- SIDEBAR -->
        <div class="w-64 bg-gray-900 text-white flex flex-col">


            <div class="p-6 text-2xl font-bold border-b border-gray-700 comforter-regular tracking-widest">
                Pinya Hub
            </div>


            <nav class="flex-1 p-4 space-y-2">
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
            </nav>


            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="logout.php">
                    <button class="w-full bg-red-500 hover:bg-red-600 py-2 rounded">
                        Logout
                    </button>
                </form>
            </div>


        </div>


        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col">


            <!-- TOPBAR -->
            <div class="bg-white shadow px-6 py-4 flex justify-between items-center">


                <h1 class="text-xl font-semibold">
                    Welcome
                    <?php
                    if ($current_user_type != "administrator") {
                        ?>
                        User: <?= $current_user; ?>
                        <?php
                    } else {
                        ?>
                        Admin: <?= $current_user; ?>
                        <?php
                    }
                    ?>
                </h1>


                <div class="relative">


                    <button onclick="toggleDropdown()" class="flex items-center space-x-2">


                        <div class="w-10 h-10 bg-gray-400 rounded-full flex items-center justify-center text-white">
                            <?= strtoupper(substr($current_user, 0, 1)); ?>
                        </div>


                        <span class="font-medium"><?= htmlspecialchars($current_user_type); ?></span>


                    </button>


                    <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded shadow-lg">


                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile Settings</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Change Password</a>


                        <form method="POST" action="logout2.php"
                            onclick="return confirm('Are you sure you want to log-out?')">


                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                Logout
                            </button>


                        </form>


                    </div>
                </div>
            </div>




            <!-- PAGE CONTENT -->
            <div class="p-4 overflow-auto">


                <?php
                if ($current_user_type === "administrator") {
                    ?>


                    <div class="flex justify-between bg-gray-200 px-2 py-2 mb-3">


                        <h1 class="font-bold uppercase">Pinya Hub Table</h1>


                        <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            <i class="fa-solid fa-plus"></i> Add Pinya
                        </button>


                    </div>




                    <!-- MODAL -->
                    <div id="userModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">


                        <div class="bg-white rounded-lg shadow-lg w-96 p-6">


                            <div class="flex justify-between mb-4">
                                <h2 class="text-lg font-semibold">Add Pinya Product</h2>
                                <button onclick="closeModal()">&times;</button>
                            </div>


                            <form method="POST" action="add_product.php">


                                <div class="mb-2">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="border w-full p-2 rounded" required>
                                </div>


                                <div class="mb-2">
                                    <label>Stock</label>
                                    <input type="number" name="stock" class="border w-full p-2 rounded" required>
                                </div>


                                <div class="mb-2">
                                    <label>Delivery Date</label>
                                    <input type="date" name="date_delivery" class="border w-full p-2 rounded" required>
                                </div>


                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="border w-full p-2 rounded">
                                        <option value="available">Available</option>
                                        <option value="Not available">Not Available</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
                                </div>


                                <button class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded">
                                    Save Product
                                </button>


                            </form>


                        </div>
                    </div>




                    <!-- PRODUCTS TABLE -->
                    <?php


                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($connection, $sql);


                    if (mysqli_num_rows($result) > 0) {
                        ?>


                        <div class="bg-white p-4 rounded-lg shadow overflow-x-auto text-black">


                            <table id="productsTable" class="min-w-full bg-white border border-gray-200 rounded-lg">


                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-4 py-2">Product Name</th>
                                        <th class="px-4 py-2">Stocks</th>
                                        <th class="px-4 py-2">Delivery Date</th>
                                        <th class="px-4 py-2">Status</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>


                                <tbody class="bg-white">
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-4 py-2"><?= $row['product_name']; ?></td>
                                            <td class="px-4 py-2"><?= $row['product_stocks']; ?></td>
                                            <td class="px-4 py-2"><?= $row['date_of_delivery']; ?></td>
                                            <td class="px-4 py-2"><?= $row['product_status']; ?></td>
                                            <td class="px-4 py-2">
                                                <button onclick="openModalForEdit(
                                       '<?= $row['id']; ?>',
                                       '<?= htmlspecialchars($row['product_name']); ?>',
                                       '<?= $row['product_stocks']; ?>',
                                       '<?= $row['date_of_delivery']; ?>',
                                       '<?= $row['product_status']; ?>'
                                   )" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>


                                                <button
                                                    onclick="openModalForDelete('<?= $row['id']; ?>', '<?= htmlspecialchars($row['product_name']); ?>')"
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-blue-900">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>


                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>


                            </table>


                        </div>






                        <div id="userEditModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">


                            <div class="bg-white rounded-lg shadow-lg w-96 p-6">


                                <div class="flex justify-between mb-4">
                                    <h2 class="text-lg font-semibold">Edit Pinya Product</h2>
                                    <button onclick="closeModal('userEditModal')">&times;</button>
                                </div>


                                <form method="POST" action="edit_product.php">


                                    <input type="hidden" name="id" id="edit_id">


                                    <div class="mb-2">
                                        <label>Product Name</label>
                                        <input type="text" name="name" id="edit_name" class="border w-full p-2 rounded"
                                            required>
                                    </div>


                                    <div class="mb-2">
                                        <label>Stock</label>
                                        <input type="number" name="stock" id="edit_stock" class="border w-full p-2 rounded"
                                            required>
                                    </div>


                                    <div class="mb-2">
                                        <label>Delivery Date</label>
                                        <input type="date" name="date_delivery" id="edit_date_delivery"
                                            class="border w-full p-2 rounded" required>
                                    </div>


                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select name="status" id="edit_status" class="border w-full p-2 rounded">
                                            <option value="available">Available</option>
                                            <option value="Not available">Not Available</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                        </select>
                                    </div>


                                    <button class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded">
                                        Update Product
                                    </button>


                                </form>
                            </div>
                        </div>




                        <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">


                            <div class="bg-white rounded-lg shadow-lg w-96 p-6">


                                <div class="flex justify-between mb-4">
                                    <h2 class="text-lg font-semibold">Delete Pinya Product</h2>
                                    <button onclick="closeModal('deleteModal')">&times;</button>
                                </div>


                                <form method="POST" action="delete_product.php">


                                    <input type="hidden" name="id" id="delete_id">


                                    <h5>Are you sure you want to delete this product?</h5>


                                    <div class="mb-2">
                                        <label>Name: </label>
                                        <input type="text" id="delete_name" readonly class="border w-full p-2 rounded">
                                    </div>
                                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded">
                                        Delete Product
                                    </button>


                                </form>
                            </div>
                        </div>


                        <?php
                    } else {
                        echo "<h1 class='text-red-500'>No Results Found</h1>";
                    }
                    ?>


                    <?php
                } else {
                    ?>


                    <h1 class="text-xl font-bold">THIS IS USER DASHBOARD</h1>


                    <?php
                }
                ?>


            </div>


        </div>
    </div>




    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>


    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>


    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.tailwindcss.js"></script>


    <script>
        $(document).ready(function () {


            $('#productsTable').DataTable();


        });
    </script>


</body>


</html>