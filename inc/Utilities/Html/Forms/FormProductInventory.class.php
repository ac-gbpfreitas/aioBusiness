<?php

    class FormProductInventory {

        public static function addProductInventory(){
            $modalForm = '
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalProductIn">
                    Add New Entry
                </button>
                <div class="modal priori-editForm" id="myModalProductIn">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Edit Form</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">
                                ×
                            </button>
                            </div>

                    <!-- Modal body -->
                    <div class="modal-body">';
                    $modalForm .= self::addFormProductInventory();
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }

        private static function addFormProductInventory(){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables" method="POST" enctype="multipart/form-data" id="productIn">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Order ID#: 
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Order #Number" value="" name="orderId">
                            </td>
                            <td>
                                Supplier ID#: 
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Supplier #Number" value="" name="supplierId">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Product Descr.:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Product Name" value="" name="productName">
                            </td>
                            <td>
                                Measurement Unit:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Measurement Unit" value="" name="unit">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Quantity:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="Quantity" value="" name="qty">
                            </td>
                            <td>
                                Price per Unity:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="Price per Unity" value="" name="price">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Product Category:
                            </td>
                            <td>
                                <select name="category" class="form-control mb-2 mr-sm-2">
                                    <option value="Beverages">Beverages</option>
                                    <option value="Condiments">Condiments </option>
                                    <option value="Confections">Confections</option>
                                    <option value="Dairy Products">Dairy Products</option>
                                    <option value="Grains/Cereals">Grains/Cereals</option>
                                    <option value="Meat/Poultry">Meat/Poultry</option>
                                    <option value="Produce">Produce</option>
                                    <option value="Seafood">Seafood</option>
                                </select>
                            </td>
                            <td>
                                Entry Date:
                            </td>
                            <td>
                                <input type="date" class="form-control mb-2 mr-sm-2" value="" name="entryDate">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        Close
                    </button>
                    <input type="reset" class="btn btn-warning" value="Clear">
                    <input type="submit" class="btn btn-success" value="Submit" id="add">
                    <input type="hidden" name="form" value="addProductInventory">
                    
                </div>
            </form>
            ';
            return $form;
        }

        public static function editProductInventory(ProductInventory $product){
            $modalForm = '
            <div>
                <button type="button" class="priori-edit-btn" data-bs-toggle="modal" data-bs-target="#myModal'.$product->getProductId().'">
                    Edit
                </button>
                <div class="modal priori-editForm" id="myModal'.$product->getProductId().'">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Edit Form</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">
                                ×
                            </button>
                            </div>

                    <!-- Modal body -->
                    <div class="modal-body">';
                    $modalForm .= self::editFormProductInventory($product);
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }

        private static function editFormProductInventory(ProductInventory $product){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables" method="POST" enctype="multipart/form-data" id="product'.$product->getProductId().'">
                <input type="hidden" name="_id" value='.$product->getId().'>
                <input type="hidden" name="productId" value='.$product->getProductId().'>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Product:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Product" value="'.$product->getProductName().'" name="productName">
                            </td>
                            <td>
                                Unit:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Unit" value="'.$product->getUnit().'" name="unit">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Price:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="$Price" value="'.$product->getPrice().'" name="price">
                            </td>
                            <td>
                                Product Category:
                            </td>
                            <td>
                                <select name="category">
                                    <option value="Beverages">Beverages</option>
                                    <option value="Condiments">Condiments </option>
                                    <option value="Confections">Confections</option>
                                    <option value="Dairy Products">Dairy Products</option>
                                    <option value="Grains/Cereals">Grains/Cereals</option>
                                    <option value="Meat/Poultry">Meat/Poultry</option>
                                    <option value="Produce">Produce</option>
                                    <option value="Seafood">Seafood</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Entry Date:
                            </td>
                            <td>
                                <input type="date" class="form-control mb-2 mr-sm-2"  placeholder="Entry Date" value="'.$product->getEntryDate().'" name="entryDate">
                            </td>
                            <td>
                                Withdrawal Date:
                            </td>
                            <td>
                                <input type="date" class="form-control mb-2 mr-sm-2"  placeholder="Out Date" value="'.$product->getOutDate().'" name="outDate">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        Close
                    </button>
                    <input type="reset" class="btn btn-warning" value="Clear">
                    <input type="submit" class="btn btn-success" value="Submit" id="edit">
                    <input type="hidden" name="form" value="editProductInventory">
                </div>
            </form>
            ';
            return $form;
        }
    }