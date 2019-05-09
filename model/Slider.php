<?php
    class Slider
    {
        private $id;
        private $image;
        private $description;
        
        public function getId()
        {
            return $this->id;
        }

        public function getImage()
        {
            return $this->image;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setImage($img)
        {
            $this->image = $img;
        }

        public function setDescription($desc)
        {
            $this->description = $desc;
        }
    }
