<?php

    class FormOrder {

        //Order
        public static function editOrder(Order $order){
            $modalForm = '
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal'.$order->getOrderId().'">
                    Edit
                </button>
                <div class="modal priori-editForm" id="myModal'.$order->getOrderId().'">
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
                    $modalForm .= self::editFormOrder($order);
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }

        public static function addOrder(){
            $modalForm = '
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalOrder">
                    Add New Entry
                </button>
                <div class="modal priori-editForm" id="myModalOrder">
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
                    $modalForm .= self::addFormOrder();
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }

        private static function addFormOrder(){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables&tab=order" method="POST" enctype="multipart/form-data" id="productIn">
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

        private static function editFormOrder($order){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables" method="POST" enctype="multipart/form-data" id="employee'.$order->getOrderId().'">
                <input type="hidden" name="_id" value='.$order->getId().'>
                <input type="hidden" name="orderId" value='.$order->getOrderId().'>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Supplier Id</td>
                            <td>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Supplier" value="'.$order->getSupplierId().'" name="supplierId">
                            </td>
                            <td>Order Date</td>
                            <td>
                        <input type="date" class="form-control mb-2 mr-sm-2" value="'.$order->getOrderDate().'" name="orderDate">
                            </td>
                        </tr>
                        <tr>
                            <td>Estimate Delivery Date</td>
                            <td>
                        <input type="date" class="form-control mb-2 mr-sm-2" value="'.$order->getEstimateDeliveryDate().'" name="estimateDelivery">
                            </td>
                            <td>Employee Id</td>
                            <td>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Employee" value="'.$order->getEmployeeId().'" name="employeeId">
                            </td>
                        </tr>
                        <tr>
                            <td>Shipper Id</td>
                            <td>
                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Shipper" value="'.$order->getShipperId().'" name="shipperId">
                            </td>
                            <td>Notes:</td>
                            <td>
                                <textarea></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        Close
                    </button>
                    <input type="submit" class="btn btn-success" value="Submit" id="edit">
                    <input type="hidden" name="form" value="editOrder">
                </div>
            </form>';

            return $form;
        }

    }