<?php

  /**
   *
   */
  class Artist
  {
    private $con;
    private $id;

    public function __construct($con, $id)
    {
      $this->con = $con;
      $this->id = $id;
    }

    public function getName()
    {
      $artistQuery = mysqli_query($this->con, "SELECT name FROM artist WHERE id = $this->id");
      #printf("Error: %s\n", mysqli_error($this->con)); //For checking mysql error.
      $artist = mysqli_fetch_array($artistQuery);
      return $artist['name'];
    }
  }

 ?>
