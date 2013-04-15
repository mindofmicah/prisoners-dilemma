<?php
class Card
{
	protected $rank, $suit, $label;
	public function __construct($rank, $suit) 
	{
		$this->suit = $suit;
		$this->rank = $rank;
		
		switch ($rank) {
			case '1':
				$this->label = 'A';
			case '11':
				$this->label = 'J';
			case '12':
				$this->label = 'Q';
			case '13':
				$this->label = 'K';
			default:
				$this->label = $rank;
		}
	}
	public function getRank()
	{
		return $this->rank;
	}
}


