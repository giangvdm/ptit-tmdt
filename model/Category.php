<?php
    class Category
    {
        private $id;
        private $name;

        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setIName($name)
        {
            $this->name = $name;
        }
    }