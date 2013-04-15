<?php
class Deck
{
	protected $cards = array(), $index;
	protected $available_suits = array(
		'hearts',
		'spades',
		'clubs',	
		'diamonds'
	);

	public function __construct() 
	{
		foreach ($this->available_suits as $suit) {
			for ($i = 1; $i <= 13; $i++) {
				$this->cards[] = new Card($i, $suit);
			}	
		}
		$this->index = 0;
	}

	public function shuffle()
	{
		shuffle($this->cards);
		$this->index = 0;
	}

	public function deal() {
		return $this->cards[$this->index++];
	}

}

