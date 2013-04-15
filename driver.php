<?php
require 'classes/Card.php';
require 'classes/Deck.php';


$deck = new Deck();
$deck->shuffle();

$cards_to_deal = 7;
while ($cards_to_deal-- > 0) {
	$player_one_cards[] = $deck->deal();
	$player_two_cards[] = $deck->deal();
}
unset($cards_to_deal);

$game_is_playing = true;
$player_one_score = 0;
$player_two_score = 0;
while (count($player_one_cards) > 0) {
	echo "Which card would you like to play?\n";
	foreach ($player_one_cards as $index=>$card) {
		echo "{$index})". $card->getRank()."\n";
	}
	$input = readline("\n");

	if (!array_key_exists($input, $player_one_cards)) {
		echo "You did not enter a valid index\n";
		die();
	}

	echo "You selected {$player_one_cards[$input]->getRank()}\n";
	$player_two = array_shift($player_two_cards);
	echo "The computer played {$player_two->getRank()}\n";
	echo "\n";
	if ($player_one_cards[$input]->getRank() % 2 == 0) {
		// player one is even
		if ($player_two->getRank() % 2 == 0) {
			// Player two is even
			echo "You both get 2 points for each being even\n";
			$player_one_score+=2;
			$player_two_score+=2;
		} else {
			// Player two is odd
			echo "Computer played odd to your even. Computer gets 3 points\n";
			$player_two_score+=3;
		}
	} else {
		// player one is odd
		if ($player_two->getRank() % 2 == 0) {
			// Player two is even
			echo "You played odd to Computer's even. You get 3 points\n";
			$player_one_score+=3;
		} else {
			// Player two is odd
			echo "You both get 1 point for each being odd\n";
			$player_one_score+=1;
			$player_two_score+=1;
	}
}
	unset($player_one_cards[$input]);
	$player_one_cards = array_values($player_one_cards);

	echo "\n";
	$game_is_playing = false;
}

echo "\n".'Results:' . "\n";
echo "You {$player_one_score}\n";
echo "Computer:{$player_two_score}\n";
echo "\n";
if ($player_one_score == $player_two_score) {
	echo "TIE\n";
} elseif($player_one_score > $player_two_score) {
	echo "You Win!\n";
} else {
	echo "You Lose!\n";

}

echo "\n";
