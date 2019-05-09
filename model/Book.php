<?php
    class Book
    {
        private $id;
        private $title;
        private $description;
        private $price;
        private $oldPrice;
        private $quantity;
        private $author;
        private $publisher;
        private $isBestSeller;
        private $image;
        private $createdAt;
        private $categories;
        
        public function getId()
        {
            return $this->id;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getPrice()
        {
            return number_format($this->price);
        }
        
        public function getPriceValue()
        {
            return $this->price;
        }
        public function getOldPrice()
        {
            return number_format($this->oldPrice);
        }
 
        public function getQuantity()
        {
            return $this->quantity;
        }

        public function getAuthor()
        {
            return $this->author;
        }

        public function getPublisher()
        {
            return $this->publisher;
        }

        public function getIsBestSeller()
        {
            return $this->isBestSeller;
        }

        public function getImage()
        {
            return $this->image;
        }

        public function getCreatedAt()
        {
            return $this->createdAt;
        }

        public function getCategories()
        {
            return $this->categories;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function setDescription($desc)
        {
            $this->description = $desc;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function setOldPrice($price)
        {
            $this->oldPrice = $price;
        }

        public function setQuantity($quantity)
        {
            $this->quantity = $quantity;
        }

        public function setAuthor($author)
        {
            $this->author = $author;
        }

        public function setPublisher($publisher)
        {
            $this->publisher = $publisher;
        }

        public function setIsBestSeller($bool)
        {
            $this->isBestSeller = $bool;
        }

        public function setImage($img)
        {
            $this->image = $img;
        }

        public function setCreatedAt($time) 
        {
            $this->createdAt = $time;
        }

        public function setCategories($arr) 
        {
            $this->categories = $arr;
        }
    }
