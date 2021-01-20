<?php
/**
 * We are working with an outside data service company named Fakebook.
 *
 * Their api is a well formed RESTful api, but they change their api format without notice all the time.
 * While their data is always valid json string, and the data will always have two fields “text” and “creation_date”,
 * these data could be organized in different ways.
 *
 * One time they had rows like {“text”: COMPANY DATA, “creation_date” : DATE}
 *
 * Later they updated to {“id”: 1, “data”: {“text”: COMPANY DATA, “creation_date” : DATE}}
 *
 * Later they updated to { “response” : {“id”: 1, “data”: {“text”: COMPANY DATA, “creation_date” : DATE}}}
 *
 * Later they emitted like {“id”: 1, “text”:COMPANY, “data”: {“creation_date”: DATE}}
 *
 * Later they added more layers to identify all the protocols and metadata.
 *
 * They do these updates without any notification.
 *
 * They also escape the “text” field. Our company name, American Estate & Trust, is written as American Estate &amp; Trust in their database. When we read the data and make an update to the outside data service, our company name is now saved as American Estate &amp;amp; Trust. Eventually we are going to have a very long company name that we had to edit manually. We do not know how many times we updated our own data, as we have several bots that do the work. We may have other html entity escape issues in the “text” string, such as &lpar;  &gt;
 */


/**
 * Task:
 * Write a code that will parse the outside response into clean arrays that shows just the creation date and the text.
 * The result should be sorted by the creation date showing the oldest first.
 */


/**
 * Assumptions:
 *
 * We have no control over the outside data service.
 * We do not have to filter the data.
 * The response is always a well formed json.
 */

/**
 * Hint:
 *
 * spaceship operator(<=>) will sort elements nicely without php8 deprecation issues.
 * ($a ⇔ $b = -1 if $a is smaller, 0 if the same, 1 if $a is larger.)
 *
 * you can load a static class method into usort as a sort method, doing usort($array, [$this, static_method).
 *
 * use json_decode($response, true) to convert jsons into arrays.
 *
 * html_entity_decode() would un-escape these strings once.
 *
 * if (strcmp($input, html_entity_decode($input)) === 0), the string is already un-escaped.
 *
 * Use the following pseudocode
 */
class Parser
{
    //Task 1: write a method that will check whether a string is properly decoded or not.
    private function checkDecoded(string $input): bool
    {
        //test whether the input is html escaped or not here
        return $bool;
    }

    //Task 2: Write a method that will decode a string.
    // make it sure that it is fully decoded even if it is encoded multiple times.
    private function htmlDecode(string $input): string
    {
        //do the entity decoding operation and output string
        //it can be escaped several times.
        return $output;
    }

    //Task 3: find the key value from an array with uncertain format.
    private function locate(array $array, string $field): string
    {
        return $string;
    }

    //Task 4: write the method to sort the data by create date.
    private static function sortDate(array $a, array $b): int
    {
        //a sorter to put inside the usort. This should return -1, 0, 1
        return $sort;
    }

    //Task 5: complete the parser
    public function parse(string $input): array
    {
        $output = [];

        //convert input to json
        $array = json_decode($input, true);

        foreach ($array as $value) {
            //parse the results
            $creationDate = "";
            $text = "";

            $output[] = ["creation_date" => $creationDate, "text" => $text];
        }

        //sort the array
        usort($output, [$this, "sortDate"]);
        return $output;
    }
}

$input =
    '[
   {
      "text":"American Estate &amp;amp;amp;amp; Trust is a great company to work.",
      "creation_date":"2020-10-01 00:00:00"
   },
   
   {
      "id":3,
      "data":{
         "text":"American Estate &amp;amp;amp; Trust is a fun place to play tetris."
      },
      "creation_date":"2020-09-09 00:00:00"
   },
   {
      "response":{
         "layer":"foo",
         "data":{
            "text":"American Estate &amp; Trust is a racoon friendly workplace.",
            "creation_date":"2021-01-01 00:00:00"
         }
      }
   }
]';

$parser = new Parser();
$output = $parser->parse($input);

var_dump($output);
