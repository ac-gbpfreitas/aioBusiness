<?php

    class FormShipper {
        
        public static function addShipper(){
            $modalForm = '
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalShipper">
                    Add New Entry
                </button>
                <div class="modal priori-editForm" id="myModalShipper">
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
                    $modalForm .= self::addFormShipper();
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }

        public static function editShipper(Shipper $shipper){
            $modalForm = '
            <div>
                <button type="button" class="priori-edit-btn" data-bs-toggle="modal" data-bs-target="#myModal'.$shipper->getShipperId().'">
                    Edit
                </button>
                <div class="modal priori-editForm" id="myModal'.$shipper->getShipperId().'">
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
                    $modalForm .= self::editFormShipper($shipper);
                    $modalForm .= '</div>
                </div>
            </div>
            <!-- Form End -->
            ';
            return $modalForm;
        }
        
        private static function addFormShipper(){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables" method="POST" enctype="multipart/form-data" id="shipper">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Shipper:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Shipper Name" value="" name="shipperName">
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
                    <input type="hidden" name="form" value="addShipper">
                </div>
            </form>
            ';
            return $form;
        }

        private static function editFormShipper(Shipper $shipper){
            $form = '
            <form action="'.$_SERVER['PHP_SELF'].'?page=tables" method="POST" enctype="multipart/form-data" id="shipper'.$shipper->getShipperId().'">
                <input type="hidden" name="_id" value='.$shipper->getId().'>
                <input type="hidden" name="shipperId" value='.$shipper->getShipperId().'>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>
                                Shipper:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Shipper Name" value="'.$shipper->getShipperName().'" name="shipperName">
                            </td>
                            <td>
                                Contact Person:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Person Name" value="'.$shipper->getContactName().'" name="contactName">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Address" value="'.$shipper->getAddress().'" name="address">
                            </td>
                            <td>
                                City:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="City" value="'.$shipper->getCity().'" name="city">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Country:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="Country" value="'.$shipper->getCity().'" name="country">
                            </td>
                            <td>
                                Notes:
                            </td>
                            <td>
                                <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="Price" value="'.$shipper->getPrice().'" name="price">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone:
                            </td>
                            <td>
            <input type="text" class="form-control mb-2 mr-sm-2"  placeholder="XXX-XXX-XXXX" value="'.$shipper->getPhone().'" name="phone">
                            </td>
                            <td>
                                Email:
                            </td>
                            <td>
            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Email" value="'.$shipper->getEmail().'" name="email">
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
                    <input type="hidden" name="form" value="editShipper">
                </div>
            </form>
            ';
            return $form;
        }
    }