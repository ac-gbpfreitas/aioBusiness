<?php

    require_once("inc/Utilities/Html/Forms/FormEmployee.class.php");
    require_once("inc/Utilities/Html/Forms/FormOrder.class.php");
    require_once("inc/Utilities/Html/Forms/FormShipper.class.php");
    require_once("inc/Utilities/Html/Forms/FormSupplier.class.php");
    require_once("inc/Utilities/Html/Forms/FormProductInventory.class.php");
    
    class FormHtml{

        /**
         * Form HTML put all forms together in one variable
        */
        public static $formEmployee;
        public static $formOrder;
        public static $formShipper;
        public static $formSupplier;
        public static $formProductInventory;

        public static function formEmployee(){
            self::$formEmployee = new FormEmployee();
        }

        public static function formOrder(){
            self::$formOrder = new FormOrder();
        }

        public static function formShipper(){
            self::$formShipper = new FormShipper();
        }

        public static function formProductInventory(){
            self::$formProductInventory = new FormProductInventory();
        }       
        
        public static function formSupplier(){
            self::$formSupplier = new FormSupplier();
        }

    }