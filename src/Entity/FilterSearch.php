<?php

namespace App\Entity;

class FilterSearch
{


  /**
   * @var int|null
   */
  private $maxPrice;

  /**
   * @var int|null
   */
  private $maxYear;


  /**
   * @return int|null
   */

  public function getMaxPrice(): ?int
  {

    return $this->maxPrice;
  }

 /**
   * @param int|null $maxPrice
   * @return FilterSearch
   */
  public function setMaxPrice(int $maxPrice): FilterSearch
  {
    $this->maxPrice = $maxPrice;

    return $this;
  }


  /**
   * @return int|null
   */
  public function getMaxYear(): ?int
  {
    return $this->maxYear;
  }

  /**
   * @param int|null $maxYear
   * @return FilterSearch
   */
  public function setMaxYear(int $maxYear): FilterSearch
  {
    $this->maxYear = $maxYear;

    return $this;
  }
}
