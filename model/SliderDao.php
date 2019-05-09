<?php
   
    require 'Slider.php';
    
    class SliderDao extends Database
    {
        public function getSliderById($id)
        {
            $this->conn = $this->connect();
            $query = "SELECT * FROM sliders WHERE id = ?";
            $param = $id;
            $slider = null;

            if ($stmt=$this->conn->prepare($query)) {
                $stmt->bind_param("i",$param);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $slider = new Slider() ;
                        $slider->setId($row['id']);
                        $slider->setImage($row['image']);
                        $slider->setDescription($row['description']);
                    }
                }
                
                $stmt->close();
            }
           
            $this->conn->close();
            return $slider;
        }

        public function getAllSliders()
        {
            $this->conn = $this->connect();
            $query = "SELECT * FROM sliders";
            if ($stmt=$this->conn->prepare($query)) {
                $stmt->execute();
                $result = $stmt->get_result();
                $allSliders = array();

                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        $slider = new Slider() ;
                        $slider->setId($row['id']);
                        $slider->setImage($row['image']);
                        $slider->setDescription($row['description']);

                        $allSliders[] = $slider;
                    }
                } 
                $stmt->close();
            }
           
            $this->conn->close();
            return $allSliders;
        }

        public function addSlider($img, $desc)
        {
            $this->conn = $this->connect();
            $query = "INSERT INTO sliders(image, description) VALUES(?, ?)";
            if ($stmt=$this->conn->prepare($query)) {
                $stmt->bind_param("ss", $img, $desc);
                $stmt->execute();
                $stmt->close();
            }

            $this->conn->close();
        }

        public function updateSlider($id, $img, $desc)
        {
            $this->conn = $this->connect();
            $query = "UPDATE sliders SET image = ?, description = ? WHERE id = ?";
            if ($stmt=$this->conn->prepare($query)) {
                $stmt->bind_param("ssi", $img, $desc, $id);
                $stmt->execute();
                $stmt->close();
            }

            $this->conn->close();
        }

        public function deleteSlider($id)
        {
            $this->conn = $this->connect();
            $query = "DELETE FROM sliders WHERE id = ?";
            if ($stmt=$this->conn->prepare($query)) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
            }

            $this->conn->close();
        }
    }