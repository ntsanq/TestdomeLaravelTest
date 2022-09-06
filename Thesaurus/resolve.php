<?php

class Thesaurus
{
    private $thesaurus;

    function __construct(array $thesaurus)
    {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms(string $word)
    {
        if (array_key_exists($word, $this->thesaurus)) {
            return json_encode([
                "word" => $word,
                "synonyms" => $this->thesaurus[$word]
            ]);
        }
        return json_encode([
            "word" => $word,
            "synonyms" => []
        ]);
    }
}

$thesaurus = new Thesaurus(
    [
        "buy" => array("purchase"),
        "big" => array("great", "large")
    ]
);

echo $thesaurus->getSynonyms("big");
echo "\n";
echo $thesaurus->getSynonyms("agelast");
