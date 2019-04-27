<?php
    class Book
    {
        private $id;
        private $title;
        private $description;
        private $price;
        private $quantity;
        private $author;
        private $publisher;
        private $category;
        private $image;
        
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
            return $this->price;
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

        public function getCategory()
        {
            return $this->category;
        }

        public function getImage()
        {
            return $this->image;
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

        public function setCategory($category)
        {
            $this->category = $category;
        }

        public function setImage($img)
        {
            $this->image = $img;
        }
    }