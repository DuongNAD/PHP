<?php
                    
                    class Product_list{
                        private $productId;
                        private $productName;
                        private $brandName;
                        private $productPrice;
                        private $stockQuantity;
                        private $status;

                    

                    public function __construct($productId, $productName, $brandName, $productPrice, $stockQuantity, $status){
                        $this->productId = $productId;
                        $this->productName = $productName;   
                        $this->brandName = $brandName; 
                        $this->productPrice = $productPrice;
                        $this->stockQuantity = $stockQuantity;
                        $this->status = $status;
                    
                    }

                    public function getProductId(){
                        return $this->productId;
                        }

                    public function getProductName(){
                        return $this->productName;
                        }

                    public function getBrandName(){
                        return $this->brandName;
                    }
                    public function getProductPrice(){
                        return $this->productPrice;
                    }
                    public function getStockQuantity(){
                        return $this->stockQuantity;
                        }
                    public function getStatus(){
                        return $this->status;
                    }
                
                }
                ?>