<?php

    class FormSupplier {

        public static function addSupplier(){
            $modalForm = '
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalSupplier">
                    Add New Entry
                </button>
                <div class="modal priori-editForm" id="myModalSupplier">
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
                    $modalForm .= self::addFormSupplier();
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }

        public static function editSupplier(Supplier $supplier){
            $modalForm = '
            <div>';
            
            if($_SESSION['usertype'] == 1) {
                $modalForm .= '
                <button type="button" class="priori-edit-btn" data-bs-toggle="modal" data-bs-target="#myModal'.$supplier->getSupplierId().'">
                    Edit
                </button>
                ';
            } else {
                $modalForm .= '<label class="priori-edit-btn">Edit</label>';
            }

            $modalForm .= '<div class="modal priori-editForm" id="myModal'.$supplier->getSupplierId().'">
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
                    $modalForm .= self::editFormSupplier($supplier);
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }
        
        private static function addFormSupplier(){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables&tab=supplier" method="POST" enctype="multipart/form-data" id="supplier">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Supplier:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Supplier Name" value="" name="supplierName">
                            </td>
                            <td>
                                Contact Person:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Person Name" value="" name="contactName">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Address" value="" name="address">
                            </td>
                            <td>
                                City:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="City" value="" name="city">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Country:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="Country" value="" name="country">
                            </td>
                            <td>
                                Price:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="Price" value="" name="price">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone:
                            </td>
                            <td>
            <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="XXX-XXX-XXXX" value="" name="phone">
                            </td>
                            <td>
                                Email:
                            </td>
                            <td>
            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Email" value="" name="email">
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
                    <input type="hidden" name="form" value="addSupplier">
                </div>
            </form>
            ';
            return $form;
        }

        private static function editFormSupplier(Supplier $supplier){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables&tab=supplier" method="POST" enctype="multipart/form-data" id="supplier'.$supplier->getSupplierId().'">
                <input type="hidden" name="_id" value='.$supplier->getId().'>
                <input type="hidden" name="supplier" value='.$supplier->getSupplierId().'>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Supplier:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Supplier Name" value="'.$supplier->getSupplierName().'" name="supplierName">
                            </td>
                            <td>
                                Contact Person:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Person Name" value="'.$supplier->getContactName().'" name="contactName">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Address" value="'.$supplier->getAddress().'" name="address">
                            </td>
                            <td>
                                City:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="City" value="'.$supplier->getCity().'" name="city">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Country:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="Country" value="'.$supplier->getCity().'" name="country">
                            </td>
                            <td>
                                Notes:
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone:
                            </td>
                            <td>
            <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="XXX-XXX-XXXX" value="'.$supplier->getPhone().'" name="phone">
                            </td>
                            <td>
                                Email:
                            </td>
                            <td>
            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Email" value="'.$supplier->getEmail().'" name="email">
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
                    <input type="hidden" name="form" value="editSupplier">
                </div>
            </form>
            ';
            return $form;
        }
    }